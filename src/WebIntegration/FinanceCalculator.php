<?php

namespace billythekid\dekopay\WebIntegration;

use billythekid\dekopay\Core\Sender;

/**
 * Class FinanceCalculator
 *
 * @package billythekid\dekopay\WebIntegration
 */
class FinanceCalculator
{
  /**
   * @var array
   */
  private $productLists;

  /**
   * FinanceCalculator constructor.
   *
   * @param $interface
   * @param $apiKey
   * @throws \Exception
   */
  public function __construct($interface, $apiKey)
  {
    $this->productLists = array();

    $this->loadData($interface, $apiKey);
  }

  /**
   * @param $interface
   * @param $apiKey
   * @throws \Exception
   */
  private function loadData($interface, $apiKey)
  {
    $sender = new Sender("{$interface}js_api/FinanceDetails.js.php?api_key=$apiKey", array());

    if (preg_match_all('/case[ |]"([\w\s\d\-.]*)":([\w\s.=;%\-()\']*)break;/', $sender->request(), $productMatches))
    {

      $this->testProductMatches($productMatches);

      foreach ($productMatches[1] as $productNumber => $productID)
      {

        if (preg_match_all('/this\.+([\w]*)[ ]*= ?\'?([\w\s%().]*)\'?;/', $productMatches[2][$productNumber], $productValuesMatches))
        {

          $this->testProductValuesMatches($productValuesMatches);

          $financeProduct = new FinanceProduct();
          $financeProduct->setId($productID);

          foreach ($productValuesMatches[1] as $productValuesNumber => $productValuesName)
          {
            $financeProduct->setter($productValuesName, $productValuesMatches[2][$productValuesNumber]);
          }

          $this->productLists[$productID] = $financeProduct;

        }

      }
    }
  }

  /**
   * @param $productMatches
   * @return bool
   * @throws \Exception
   */
  private function testProductMatches($productMatches)
  {
    if (is_array($productMatches) && count($productMatches) == 3
        && count($productMatches[0]) == count($productMatches[1])
        && count($productMatches[0]) == count($productMatches[2]))
    {
      return true;
    }

    throw new \Exception('DekoPayApi-FinanceDetails response error.');
  }

  /**
   * @param $productValuesMatches
   * @return bool
   * @throws \Exception
   */
  private function testProductValuesMatches($productValuesMatches)
  {
    if (is_array($productValuesMatches) && count($productValuesMatches) == 3
        && count($productValuesMatches[0]) == count($productValuesMatches[1])
        && count($productValuesMatches[0]) == count($productValuesMatches[2]))
    {
      return true;
    }

    throw new \Exception('DekoPayApi-FinanceDetails response error.');
  }

  /**
   * @param $id
   * @return FinanceProduct
   * @throws \Exception
   */
  private function getFinanceProduct($id)
  {
    if (!isset($this->productLists[$id]))
    {
      throw new \Exception("DekoPayApi-FinanceDetails finance product with id: $id is not exist.");
    }

    return $this->productLists[$id];
  }

  /**
   * @param $productType
   * @param $costOfGoods
   * @param $depositPercentage
   * @param $depositAmount
   * @return FinanceDetails
   * @throws \Exception
   */
  public function calculate($productType, $costOfGoods, $depositPercentage, $depositAmount)
  {
    $financeProduct = $this->getFinanceProduct($productType);

    $financeDetails = new FinanceDetails();

    $financeDetails->setName($financeProduct->getPName());
    $financeDetails->setAPR((float)$financeProduct->getApr());
    $financeDetails->setTermOfAgreement((float)$financeProduct->getTerm());

    $financeDetails->setValueOfGoods($costOfGoods * 100);

    if ($depositPercentage > 0)
    {
      $financeDetails->setPercentageOfDeposit($depositPercentage);
      $financeDetails->setAmountOfDeposit(round($costOfGoods * $depositPercentage));
    } else
    {
      $financeDetails->setPercentageOfDeposit($depositAmount * $costOfGoods * 100);
      $financeDetails->setAmountOfDeposit($depositAmount * 100);
    }

    $financeDetails->setAmountOfLoan(
        ($financeDetails->getValueOfGoods() - $financeDetails->getAmountOfDeposit()) * $financeProduct->getFees()
    );

    $financeDetails->setMonthlyInstalment($financeDetails->getAmountOfLoan() * $financeProduct->getFactor());

    $firstRepayment = $financeDetails->getMonthlyInstalment();
    $lastRepayment  = $financeDetails->getMonthlyInstalment();

    if (substr($productType, 0, 2) == 'BL' || substr($productType, 0, 2) == 'PB')
    {
      $firstRepayment = 0;
      $lastRepayment  = 0;
    } else
    {
      if ($financeDetails->getAPR() > 0)
      {
        $financeDetails->setMonthlyInstalment(round($financeDetails->getMonthlyInstalment()));
      } else
      {
        $financeDetails->setMonthlyInstalment(round($financeDetails->getMonthlyInstalment() + 0.0001));
      }
    }

    $financeDetails->setLoanRepayment(
        $firstRepayment + ($financeDetails->getMonthlyInstalment() * ($financeProduct->getTerm() - 2)) + $lastRepayment
    );

    $financeDetails->setTotalAmountPayable($financeDetails->getLoanRepayment() + $financeDetails->getAmountOfDeposit());

    if ($financeDetails->getAPR() == 0)
    {
      $financeDetails->setTotalAmountPayable($financeDetails->getValueOfGoods());
    }

    $financeDetails->setCostOfLoan($financeDetails->getLoanRepayment() - $financeDetails->getAmountOfLoan());

    $financeDetails->setValueOfGoods(round($financeDetails->getValueOfGoods() / 100, 2));
    $financeDetails->setAmountOfDeposit(round($financeDetails->getAmountOfDeposit() / 100, 2));
    $financeDetails->setAmountOfLoan(round($financeDetails->getAmountOfLoan() / 100, 2));
    $financeDetails->setMonthlyInstalment(round($financeDetails->getMonthlyInstalment() / 100, 2));
    $financeDetails->setLoanRepayment(round($financeDetails->getLoanRepayment() / 100, 2));
    $financeDetails->setTotalAmountPayable(round($financeDetails->getTotalAmountPayable() / 100, 2));
    $financeDetails->setTrueCostOfLoan(round($financeDetails->getCostOfLoan() / 100, 2));
    $financeDetails->setCostOfLoan(max(0, round($financeDetails->getCostOfLoan() / 100, 2)));

    return $financeDetails;
  }
}
