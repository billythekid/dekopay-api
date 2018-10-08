<?php

namespace billythekid\dekopay\Core;

/**
 * Trait RequestTrait
 *
 * @package billythekid\dekopay\Core
 */
trait RequestTrait
{
  /**
   * @var array
   */
  private $parameters;

  /**
   * RequestTrait constructor.
   */
  public function __construct()
  {
    $this->parameters = array();
  }

  /**
   * @param $name
   * @param $value
   */
  public function addParameter($name, $value)
  {
    if ($value !== null && $value !== false && $value !== '')
    {
      $this->parameters[$name] = $value;
    }
  }
}
