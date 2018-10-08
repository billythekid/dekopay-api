<?php

namespace billythekid\dekopay\Requests;

use billythekid\dekopay\Core\RequestTrait;
use billythekid\dekopay\Core\RequestInterface;

/**
 * Class AmendmentRequest
 *
 * @package billythekid\dekopay\Requests
 */
class AmendmentRequest implements RequestInterface
{
  use RequestTrait;

  /**
   *
   */
  const ACTION = 'order_amendment';

  /** @var int
   * The Deko ID for this credit application which you want to amend.
   */
  private $creditApplicationId;

  /** @var int
   * The amount in pounds (£) of the new total order value.
   */
  private $newPrice;

  /** @var string
   * A plain text description for the entire new order (not just the amendment),
   * it will replace any previous order description.
   */
  private $newDescription;

  /**
   * @return array
   */
  public function getParameters()
  {
    $this->addParameter('action', self::ACTION);
    $this->addParameter('cr_id', $this->getCreditApplicationId());
    $this->addParameter('new_price', $this->getNewPrice());
    $this->addParameter('new_description', $this->getNewDescription());

    return $this->parameters;
  }

  /**
   * @return int
   */
  public function getCreditApplicationId()
  {
    return $this->creditApplicationId;
  }

  /**
   * @param int $creditApplicationId
   */
  public function setCreditApplicationId($creditApplicationId)
  {
    $this->creditApplicationId = $creditApplicationId;
  }

  /**
   * @return int
   */
  public function getNewPrice()
  {
    return $this->newPrice;
  }

  /**
   * @param int $newPrice
   */
  public function setNewPrice($newPrice)
  {
    $this->newPrice = $newPrice;
  }

  /**
   * @return string
   */
  public function getNewDescription()
  {
    return $this->newDescription;
  }

  /**
   * @param string $newDescription
   */
  public function setNewDescription($newDescription)
  {
    $this->newDescription = $newDescription;
  }
}
