<?php

namespace billythekid\dekopay\Response;

use billythekid\dekopay\Core\ResponseTrait;

/**
 * Class CreditApplicationResumeLinkResponse
 *
 * @package billythekid\dekopay\Response
 */
class CreditApplicationResumeLinkResponse
{
  use ResponseTrait;

  /**
   * @var
   */
  private $resumeLink;

  /**
   * CreditApplicationResumeLinkResponse constructor.
   *
   * @param $response
   * @throws \Exception
   */
  public function __construct($response)
  {
    $data = $this->xmlResponseToArray($response);

    $this->resumeLink = $data['result'];
  }

  /**
   * @return mixed
   */
  public function getResumeLink()
  {
    return $this->resumeLink;
  }
}
