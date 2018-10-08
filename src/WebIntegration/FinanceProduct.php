<?php

namespace billythekid\dekopay\WebIntegration;

/**
 * Class FinanceProduct
 *
 * @package billythekid\dekopay\WebIntegration
 */
class FinanceProduct
{
  /**
   * @var
   */
  private $id;
  /**
   * @var
   */
  private $apr;
  /**
   * @var
   */
  private $rate_of_interest;
  /**
   * @var
   */
  private $term;
  /**
   * @var
   */
  private $p_name;
  /**
   * @var
   */
  private $subsidy_lower;
  /**
   * @var
   */
  private $subsidy_upper;
  /**
   * @var
   */
  private $p4l_min_fee;
  /**
   * @var
   */
  private $lender_min_fee;
  /**
   * @var
   */
  private $l_min;
  /**
   * @var
   */
  private $l_max;
  /**
   * @var
   */
  private $factor;
  /**
   * @var
   */
  private $fees;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getApr()
  {
    return $this->apr;
  }

  /**
   * @param mixed $apr
   */
  public function setApr($apr)
  {
    $this->apr = $apr;
  }

  /**
   * @return mixed
   */
  public function getRateOfInterest()
  {
    return $this->rate_of_interest;
  }

  /**
   * @param mixed $rate_of_interest
   */
  public function setRateOfInterest($rate_of_interest)
  {
    $this->rate_of_interest = $rate_of_interest;
  }

  /**
   * @return mixed
   */
  public function getTerm()
  {
    return $this->term;
  }

  /**
   * @param mixed $term
   */
  public function setTerm($term)
  {
    $this->term = $term;
  }

  /**
   * @return mixed
   */
  public function getPName()
  {
    return $this->p_name;
  }

  /**
   * @param mixed $p_name
   */
  public function setPName($p_name)
  {
    $this->p_name = $p_name;
  }

  /**
   * @return mixed
   */
  public function getSubsidyLower()
  {
    return $this->subsidy_lower;
  }

  /**
   * @param mixed $subsidy_lower
   */
  public function setSubsidyLower($subsidy_lower)
  {
    $this->subsidy_lower = $subsidy_lower;
  }

  /**
   * @return mixed
   */
  public function getSubsidyUpper()
  {
    return $this->subsidy_upper;
  }

  /**
   * @param mixed $subsidy_upper
   */
  public function setSubsidyUpper($subsidy_upper)
  {
    $this->subsidy_upper = $subsidy_upper;
  }

  /**
   * @return mixed
   */
  public function getP4lMinFee()
  {
    return $this->p4l_min_fee;
  }

  /**
   * @param mixed $p4l_min_fee
   */
  public function setP4lMinFee($p4l_min_fee)
  {
    $this->p4l_min_fee = $p4l_min_fee;
  }

  /**
   * @return mixed
   */
  public function getLenderMinFee()
  {
    return $this->lender_min_fee;
  }

  /**
   * @param mixed $lender_min_fee
   */
  public function setLenderMinFee($lender_min_fee)
  {
    $this->lender_min_fee = $lender_min_fee;
  }

  /**
   * @return mixed
   */
  public function getLMin()
  {
    return $this->l_min;
  }

  /**
   * @param mixed $l_min
   */
  public function setLMin($l_min)
  {
    $this->l_min = $l_min;
  }

  /**
   * @return mixed
   */
  public function getLMax()
  {
    return $this->l_max;
  }

  /**
   * @param mixed $l_max
   */
  public function setLMax($l_max)
  {
    $this->l_max = $l_max;
  }

  /**
   * @return mixed
   */
  public function getFactor()
  {
    return $this->factor;
  }

  /**
   * @param mixed $factor
   */
  public function setFactor($factor)
  {
    $this->factor = $factor;
  }

  /**
   * @return mixed
   */
  public function getFees()
  {
    return $this->fees;
  }

  /**
   * @param mixed $fees
   */
  public function setFees($fees)
  {
    $this->fees = $fees;
  }

  /**
   * @param $param
   * @param $value
   */
  public function setter($param, $value)
  {
    $this->$param = $value;
  }
}
