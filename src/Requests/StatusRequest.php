<?php

namespace billythekid\dekopay\Requests;

use billythekid\dekopay\Core\RequestTrait;
use billythekid\dekopay\Core\RequestInterface;

/**
 * Class StatusRequest
 *
 * @package billythekid\dekopay\Requests
 */
class StatusRequest implements RequestInterface
{
  use RequestTrait;

  /** @var string */
  private $retailerUniqueRef;

  /**
   *
   */
  const REQUEST_STATE = 'true';

  /**
   * @return array
   */
  public function getParameters()
  {
    $this->addParameter('retaileruniqueref', $this->retailerUniqueRef);
    $this->addParameter('request_state', self::REQUEST_STATE);

    return $this->parameters;
  }

  /**
   * @return string
   */
  public function getRetailerUniqueRef()
  {
    return $this->retailerUniqueRef;
  }

  /**
   * @param string $retailerUniqueRef
   */
  public function setRetailerUniqueRef($retailerUniqueRef)
  {
    $this->retailerUniqueRef = $retailerUniqueRef;
  }
}
