<?php

namespace billythekid\dekopay\Core;

/**
 * Class Sender
 *
 * @package billythekid\dekopay\Core
 */
class Sender
{
  /**
   * @var
   */
  private $curlSession;

  /**
   * @var
   */
  private $response;
  /**
   * @var
   */
  private $info;
  /**
   * @var
   */
  private $error;
  /**
   * @var
   */
  private $errorInfo;

  /**
   * Sender constructor.
   *
   * @param       $interface
   * @param array $postFields
   */
  public function __construct($interface, array $postFields)
  {
    $this->createRequest($interface, $postFields);
  }

  /**
   * @param       $interface
   * @param array $postFields
   */
  public function createRequest($interface, array $postFields)
  {
    $this->response = null;
    $this->info     = null;

    $this->curlSession = curl_init();
    curl_setopt($this->curlSession, CURLOPT_URL, $interface);
    curl_setopt($this->curlSession, CURLOPT_HEADER, 0);
    curl_setopt($this->curlSession, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($this->curlSession, CURLOPT_POST, 1);
    curl_setopt($this->curlSession, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($this->curlSession, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($this->curlSession, CURLOPT_TIMEOUT, 180);
    curl_setopt($this->curlSession, CURLOPT_FOLLOWLOCATION, 1);
  }

  /**
   * @return mixed
   */
  public function request()
  {
    $this->response  = curl_exec($this->curlSession);
    $this->info      = curl_getinfo($this->curlSession);
    $this->error     = curl_errno($this->curlSession);
    $this->errorInfo = curl_error($this->curlSession);
    curl_close($this->curlSession);

    return $this->response;
  }

  /**
   * @return bool
   */
  public function isFailed()
  {
    return ($this->error !== 0);
  }

  /**
   * @return mixed
   */
  public function getError()
  {
    return $this->errorInfo;
  }

  /**
   * @return mixed
   */
  public function getErrorCode()
  {
    return $this->error;
  }

  /**
   * @return mixed
   */
  public function getResponse()
  {
    return $this->response;
  }

  /**
   * @return mixed
   */
  public function getInfo()
  {
    return $this->info;
  }
}
