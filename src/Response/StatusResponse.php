<?php

namespace billythekid\dekopay\Response;

use billythekid\dekopay\Core\ResponseTrait;

/**
 * Class StatusResponse
 *
 * @package billythekid\dekopay\Response
 */
class StatusResponse
{
  use ResponseTrait;

  /**
   * @var int
   */
  private $creditApplicationId;
  /**
   * @var
   */
  private $decision;

  /**
   *
   */
  const STATUS_DECLINE = 'DECLINE';
  /**
   *
   */
  const STATUS_ACCEPT = 'ACCEPT';
  /**
   *
   */
  const STATUS_REFER = 'REFER';
  /**
   *
   */
  const STATUS_CANCEL = 'CANCEL';
  /**
   *
   */
  const STATUS_FULFILLED = 'FULFILLED';
  /**
   *
   */
  const STATUS_SUBMITTED = 'SUBMITTED';
  /**
   *
   */
  const STATUS_VERIFIED = 'VERIFIED';

  /**
   * StatusResponse constructor.
   *
   * @param $response
   * @throws \Exception
   */
  public function __construct($response)
  {
    $data = $this->xmlResponseToArray($response);

    $this->creditApplicationId = (int)$data['cr_id'];
    $this->decision            = $data['decision'];
  }

  /**
   * @return int
   */
  public function getCreditApplicationId()
  {
    return $this->creditApplicationId;
  }

  /**
   * @return string
   */
  public function getDecision()
  {
    return $this->decision;
  }
}
