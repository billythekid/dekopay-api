<?php

namespace billythekid\dekopay\Response;

use billythekid\dekopay\Core\ResponseTrait;

/**
 * Class CreditApplicationInitialisationResponse
 *
 * @package billythekid\dekopay\Response
 */
class CreditApplicationInitialisationResponse
{
  use ResponseTrait;

  /**
   * @var
   */
  private $retailerUniqueRef;

  /**
   * CreditApplicationInitialisationResponse constructor.
   *
   * @param $response
   * @throws \Exception
   */
  public function __construct($response)
  {
    $data = $this->xmlResponseToArray($response);

    $this->retailerUniqueRef = $data['result'];
  }

  /**
   * @return mixed
   */
  public function getRetailerUniqueRef()
  {
    return $this->retailerUniqueRef;
  }
}
