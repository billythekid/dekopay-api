<?php

namespace billythekid\dekopay\Core;

use billythekid\dekopay\Requests\AmendmentRequest;
use billythekid\dekopay\Requests\CancellationRequest;
use billythekid\dekopay\Requests\CreditApplicationInitialisationRequest;
use billythekid\dekopay\Requests\CreditApplicationResumeLinkRequest;
use billythekid\dekopay\Requests\FulfilmentRequest;
use billythekid\dekopay\Requests\ResendCsnRequest;
use billythekid\dekopay\Requests\StatusRequest;
use billythekid\dekopay\Response\AmendmentResponse;
use billythekid\dekopay\Response\CancellationResponse;
use billythekid\dekopay\Response\CreditApplicationInitialisationResponse;
use billythekid\dekopay\Response\CreditApplicationResumeLinkResponse;
use billythekid\dekopay\Response\FulfilmentResponse;
use billythekid\dekopay\Response\ResendCsnResponse;
use billythekid\dekopay\Response\StatusResponse;
use billythekid\dekopay\WebIntegration\FinanceCalculator;

/**
 * Class DekoPayApiClient
 *
 * @package billythekid\dekopay\Core
 */
class DekoPayApiClient
{
  /**
   * @var
   */
  /**
   * @var
   */
  /**
   * @var
   */
  private $interfaceBackend, $interfaceFrontEnd, $apiKey;

  /**
   * DekoPayApiClient constructor.
   *
   * @param $interfaceBackend
   * @param $interfaceFrontEnd
   * @param $apiKey
   */
  public function __construct($interfaceBackend, $interfaceFrontEnd, $apiKey)
  {
    $this->interfaceBackend  = $interfaceBackend;
    $this->interfaceFrontEnd = $interfaceFrontEnd;
    $this->apiKey            = $apiKey;
  }

  /**
   * @param CreditApplicationInitialisationRequest $request
   * @return CreditApplicationInitialisationResponse $response
   * @throws \Exception
   */
  public function creditApplicationInitialisation(CreditApplicationInitialisationRequest $request)
  {
    return new CreditApplicationInitialisationResponse($this->createRequest($request));
  }

  /**
   * @param StatusRequest $request
   * @return StatusResponse $response
   * @throws \Exception
   */
  public function status(StatusRequest $request)
  {
    return new StatusResponse($this->createRequest($request));
  }

  /**
   * @param CreditApplicationResumeLinkRequest $request
   * @return CreditApplicationResumeLinkResponse $response
   * @throws \Exception
   */
  public function creditApplicationResumeLink(CreditApplicationResumeLinkRequest $request)
  {
    return new CreditApplicationResumeLinkResponse($this->createRequest($request));
  }

  /**
   * @param FulfilmentRequest $request
   * @return FulfilmentResponse $response
   * @throws \Exception
   */
  public function fullFillApplication(FulfilmentRequest $request)
  {
    return new FulfilmentResponse($this->createRequest($request));
  }

  /**
   * @param ResendCsnRequest $request
   * @return ResendCsnResponse $response
   * @throws \Exception
   */
  public function resendCsn(ResendCsnRequest $request)
  {
    return new ResendCsnResponse($this->createRequest($request));
  }

  /**
   * @param CancellationRequest $request
   * @return CancellationResponse $response
   * @throws \Exception
   */
  public function cancellation(CancellationRequest $request)
  {
    return new CancellationResponse($this->createRequest($request));
  }

  /**
   * @param AmendmentRequest $request
   * @return AmendmentResponse $response
   * @throws \Exception
   */
  public function amendment(AmendmentRequest $request)
  {
    return new AmendmentResponse($this->createRequest($request));
  }

  /**
   * @return FinanceCalculator
   * @throws \Exception
   */
  public function getFinanceCalculator()
  {
    return new FinanceCalculator($this->interfaceFrontEnd, $this->apiKey);
  }

  /**
   * @param RequestInterface $request
   * @return mixed
   * @throws \Exception
   */
  private function createRequest(RequestInterface $request)
  {
    $parameters                            = $request->getParameters();
    $parameters['Identification[api_key]'] = $this->apiKey;
    $parameters['api_key']                 = $this->apiKey;

    $sender = new Sender($this->interfaceBackend, $parameters);
    $sender->request();

    if ($sender->isFailed())
    {
      throw new \Exception($sender->getError(), $sender->getErrorCode());
    }

    return $sender->getResponse();
  }
}
