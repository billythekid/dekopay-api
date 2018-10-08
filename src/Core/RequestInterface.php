<?php

namespace billythekid\dekopay\Core;

/**
 * Interface RequestInterface
 *
 * @package billythekid\dekopay\Core
 */
interface RequestInterface
{
  /**
   * RequestInterface constructor.
   */
  public function __construct();

  /**
   * @return array
   */
  public function getParameters();
}
