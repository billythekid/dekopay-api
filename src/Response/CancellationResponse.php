<?php

namespace billythekid\dekopay\Response;

use billythekid\dekopay\Core\ResponseTrait;

/**
 * Class CancellationResponse
 *
 * @package billythekid\dekopay\Response
 */
class CancellationResponse
{
  use ResponseTrait;

  /**
   * @var
   */
  private $result;

  /**
   * CancellationResponse constructor.
   *
   * @param $response
   * @throws \Exception
   */
  public function __construct($response)
  {
    $data = $this->xmlResponseToArray($response);

    $this->result = $data['result'];
  }

  /**
   * @return bool
   */
  public function getResult()
  {
    return ($this->result === 'success');
  }
}
