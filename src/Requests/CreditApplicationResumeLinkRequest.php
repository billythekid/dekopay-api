<?php

namespace billythekid\dekopay\Requests;

use billythekid\dekopay\Core\RequestTrait;
use billythekid\dekopay\Core\RequestInterface;

/**
 * Class CreditApplicationResumeLinkRequest
 *
 * @package billythekid\dekopay\Requests
 */
class CreditApplicationResumeLinkRequest implements RequestInterface
{
  use RequestTrait;

  /**
   *
   */
  const ACTION = 'credit_application_resume_link';

  /** @var int */
  private $creditApplicationId;

  /** @var string */
  private $identificationInstallationId;

  /**
   * @return array
   */
  public function getParameters()
  {
    $this->addParameter('action', self::ACTION);
    $this->addParameter('cr_id', $this->getCreditApplicationId());
    $this->addParameter('Identification[InstallationID]', $this->getIdentificationInstallationId());

    return $this->parameters;
  }

  /**
   * @return int
   */
  public function getCreditApplicationId()
  {
    return $this->creditApplicationId;
  }

  /**
   * @param int $creditApplicationId
   */
  public function setCreditApplicationId($creditApplicationId)
  {
    $this->creditApplicationId = $creditApplicationId;
  }

  /**
   * @return string
   */
  public function getIdentificationInstallationId()
  {
    return $this->identificationInstallationId;
  }

  /**
   * @param string $identificationInstallationId
   */
  public function setIdentificationInstallationId($identificationInstallationId)
  {
    $this->identificationInstallationId = $identificationInstallationId;
  }
}
