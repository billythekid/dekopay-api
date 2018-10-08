<?php

namespace billythekid\dekopay\WebIntegration;

/**
 * Class FinanceDetails
 *
 * @package billythekid\dekopay\WebIntegration
 */
class FinanceDetails
{
  /**
   * @var
   */
  private $name;
  /**
   * @var
   */
  private $valueOfGoods;
  /**
   * @var
   */
  private $percentageOfDeposit;
  /**
   * @var
   */
  private $amountOfDeposit;
  /**
   * @var
   */
  private $amountOfLoan;
  /**
   * @var
   */
  private $termOfAgreement;
  /**
   * @var
   */
  private $APR;
  /**
   * @var
   */
  private $monthlyInstalment;
  /**
   * @var
   */
  private $loanRepayment;
  /**
   * @var
   */
  private $totalAmountPayable;
  /**
   * @var
   */
  private $costOfLoan;
  /**
   * @var
   */
  private $trueCostOfLoan;

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getValueOfGoods()
  {
    return $this->valueOfGoods;
  }

  /**
   * @param mixed $valueOfGoods
   */
  public function setValueOfGoods($valueOfGoods)
  {
    $this->valueOfGoods = $valueOfGoods;
  }

  /**
   * @return mixed
   */
  public function getPercentageOfDeposit()
  {
    return $this->percentageOfDeposit;
  }

  /**
   * @param mixed $percentageOfDeposit
   */
  public function setPercentageOfDeposit($percentageOfDeposit)
  {
    $this->percentageOfDeposit = $percentageOfDeposit;
  }

  /**
   * @return mixed
   */
  public function getAmountOfDeposit()
  {
    return $this->amountOfDeposit;
  }

  /**
   * @param mixed $amountOfDeposit
   */
  public function setAmountOfDeposit($amountOfDeposit)
  {
    $this->amountOfDeposit = $amountOfDeposit;
  }

  /**
   * @return mixed
   */
  public function getAmountOfLoan()
  {
    return $this->amountOfLoan;
  }

  /**
   * @param mixed $amountOfLoan
   */
  public function setAmountOfLoan($amountOfLoan)
  {
    $this->amountOfLoan = $amountOfLoan;
  }

  /**
   * @return mixed
   */
  public function getTermOfAgreement()
  {
    return $this->termOfAgreement;
  }

  /**
   * @param mixed $termOfAgreement
   */
  public function setTermOfAgreement($termOfAgreement)
  {
    $this->termOfAgreement = $termOfAgreement;
  }

  /**
   * @return mixed
   */
  public function getAPR()
  {
    return $this->APR;
  }

  /**
   * @param mixed $APR
   */
  public function setAPR($APR)
  {
    $this->APR = $APR;
  }

  /**
   * @return mixed
   */
  public function getMonthlyInstalment()
  {
    return $this->monthlyInstalment;
  }

  /**
   * @param mixed $monthlyInstalment
   */
  public function setMonthlyInstalment($monthlyInstalment)
  {
    $this->monthlyInstalment = $monthlyInstalment;
  }

  /**
   * @return mixed
   */
  public function getLoanRepayment()
  {
    return $this->loanRepayment;
  }

  /**
   * @param mixed $loanRepayment
   */
  public function setLoanRepayment($loanRepayment)
  {
    $this->loanRepayment = $loanRepayment;
  }

  /**
   * @return mixed
   */
  public function getTotalAmountPayable()
  {
    return $this->totalAmountPayable;
  }

  /**
   * @param mixed $totalAmountPayable
   */
  public function setTotalAmountPayable($totalAmountPayable)
  {
    $this->totalAmountPayable = $totalAmountPayable;
  }

  /**
   * @return mixed
   */
  public function getCostOfLoan()
  {
    return $this->costOfLoan;
  }

  /**
   * @param mixed $costOfLoan
   */
  public function setCostOfLoan($costOfLoan)
  {
    $this->costOfLoan = $costOfLoan;
  }

  /**
   * @return mixed
   */
  public function getTrueCostOfLoan()
  {
    return $this->trueCostOfLoan;
  }

  /**
   * @param mixed $trueCostOfLoan
   */
  public function setTrueCostOfLoan($trueCostOfLoan)
  {
    $this->trueCostOfLoan = $trueCostOfLoan;
  }
}
