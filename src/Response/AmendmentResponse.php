<?php

namespace billythekid\dekopay\Response;

use billythekid\dekopay\Core\ResponseTrait;

/**
 * Class AmendmentResponse
 *
 * @package billythekid\dekopay\Response
 */
class AmendmentResponse
{
  use ResponseTrait;

  /**
   * @var
   */
  private $result;

  /**
   * AmendmentResponse constructor.
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
