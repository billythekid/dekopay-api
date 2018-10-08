<?php

namespace billythekid\dekopay\Response;

use billythekid\dekopay\Core\ResponseTrait;

/**
 * Class ResendCsnResponse
 *
 * @package billythekid\dekopay\Response
 */
class ResendCsnResponse
{
  use ResponseTrait;

  /**
   * @var
   */
  private $result;

  /**
   * ResendCsnResponse constructor.
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
