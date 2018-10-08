<?php

namespace billythekid\dekopay\Core;

/**
 * Interface ResponseInterface
 *
 * @package billythekid\dekopay\Core
 */
interface ResponseInterface
{
  /**
   * @param string $response
   * @return array
   */
  public function xmlResponseToArray($response);
}
