<?php

namespace billythekid\dekopay\Requests;

use billythekid\dekopay\Core\RequestTrait;
use billythekid\dekopay\Core\RequestInterface;

/**
 * Class CreditApplicationInitialisationRequest
 *
 * @package billythekid\dekopay\Requests
 */
class CreditApplicationInitialisationRequest implements RequestInterface
{
  use RequestTrait;

  /**
   *
   */
  const CONSUMER_GENDER_MALE = 'M';
  /**
   *
   */
  const CONSUMER_GENDER_FEMALE = 'F';

  /**
   *
   */
  const CONSUMER_TITLE_MR = 'Mr';
  /**
   *
   */
  const CONSUMER_TITLE_MRS = 'Mrs';
  /**
   *
   */
  const CONSUMER_TITLE_MS = 'Ms';
  /**
   *
   */
  const CONSUMER_TITLE_MISS = 'Miss';
  /**
   *
   */
  const CONSUMER_TITLE_DR = 'Dr';
  /**
   *
   */
  const CONSUMER_TITLE_REV = 'Rev';
  /**
   *
   */
  const CONSUMER_TITLE_COL = 'Col';
  /**
   *
   */
  const CONSUMER_TITLE_SGT = 'Sgt';

  /**
   *
   */
  const CONSUMER_MARITAL_STATUS_MARRIED = 'M';
  /**
   *
   */
  const CONSUMER_MARITAL_STATUS_SINGLE = 'S';
  /**
   *
   */
  const CONSUMER_MARITAL_STATUS_COHABITING = 'C';
  /**
   *
   */
  const CONSUMER_MARITAL_STATUS_DIVORCED = 'D';
  /**
   *
   */
  const CONSUMER_MARITAL_STATUS_SEPARATED = 'P';
  /**
   *
   */
  const CONSUMER_MARITAL_STATUS_WIDOWED = 'W';

  /**
   *
   */
  const CONSUMER_RESIDENTIAL_STATUS_HOMEOWNER = 'H';
  /**
   *
   */
  const CONSUMER_RESIDENTIAL_STATUS_TENANT = 'T';
  /**
   *
   */
  const CONSUMER_RESIDENTIAL_STATUS_LIVING_WITH_PARENTS = 'L';
  /**
   *
   */
  const CONSUMER_RESIDENTIAL_STATUS_RENTING = 'R';
  /**
   *
   */
  const CONSUMER_RESIDENTIAL_STATUS_COUNCIL_RENTING = 'C';
  /**
   *
   */
  const CONSUMER_RESIDENTIAL_STATUS_OTHER = 'O';

  /**
   *
   */
  const CONSUMER_EMPLOYMENT_STATUS_FULL_TIME = 'P';
  /**
   *
   */
  const CONSUMER_EMPLOYMENT_STATUS_PART_TIME = 'PT';
  /**
   *
   */
  const CONSUMER_EMPLOYMENT_STATUS_SELF = 'S';
  /**
   *
   */
  const CONSUMER_EMPLOYMENT_STATUS_MILITARY = 'M';
  /**
   *
   */
  const CONSUMER_EMPLOYMENT_STATUS_RETIRED = 'R';
  /**
   *
   */
  const CONSUMER_EMPLOYMENT_STATUS_HOUSE_PERSON = 'H';

  /**
   *
   */
  const ACTION = 'credit_application_link';

  /** @var string
   * The merchant unique reference to tie applications to their system
   */
  private $identificationRetailerUniqueRef;

  /** @var int
   * The installation associated with this credit request.
   * Installations enable you to associate credit requests
   * with different sales channels and/or websites. Each
   * installation can have a unique configuration (logo, return
   * URL’s, CSN URL’s etc…)
   */
  private $identificationInstallationId;

  /** @var string
   * Description of order contents
   */
  private $goodsDescription;

  /** @var int
   * The overall total order value expressed in pennies
   */
  private $goodsPrice;

  /** @var string
   * Specifies the finance product, please refer to product
   * codes for a full list of our lender product codes
   */
  private $financeCode;

  /** @var int
   * The deposit amount expressed in pennies
   */
  private $financeDeposit;

  /** @var string
   * The title of the customer
   */
  private $consumerTitle;

  /** @var string
   * The forename of the customer
   */
  private $consumerForename;

  /** @var string
   * The surname of the customer
   */
  private $consumerSurname;

  /** @var \DateTime
   * The day of the customer's birth date
   */
  private $consumerDateOfBirthDay;

  /** @var string
   * The customer's gender
   */
  private $consumerGender;

  /** @var string
   * The customer's martial status
   */
  private $consumerMaritalStatus;

  /** @var string
   * The mobile phone number of the customer.
   * Not required, but if set, must match the following regex:
   * /(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/
   * It will match local and both international formats: 07123456789 00447123456789 +447123456789
   */
  private $consumerMobileNumber;

  /** @var string
   * The customer's email address
   */
  private $consumerEmailAddress;

  /** @var string
   * The customer's residential status
   */
  private $consumerResidentialStatus;

  /** @var string
   * The customer's employment status
   */
  private $consumerEmploymentStatus;

  /** @var string
   * The customer's occupation
   */
  private $consumerEmploymentOccupation;

  /** @var string
   * The customer's employer name
   */
  private $consumerEmploymentEmployerName;

  /** @var string
   * How long the customer has worked for the employer
   */
  private $consumerEmploymentYears;

  /** @var string
   * The customer's current salary
   */
  private $consumerEmploymentSalary;

  /** @var string
   * The owner's of the customer's bank account name
   */
  private $consumerBankAccountName;

  /** @var string
   *  The customer's bank account number
   */
  private $consumerBankAccountNumber;

  /** @var string
   * The customer's bank branch sort code
   */
  private $consumerBankSortCode;

  /** @var string
   * How long the customer has been using the bank account,
   * years 0-9 to be passed though as a string of 0-9 in
   * order to populate the field, a value of 10 needs to
   * be passed across in order to display more then 10
   * years on the application form.
   */
  private $consumerBankYears;

  /**
   * @return array
   */
  public function getParameters()
  {
    $this->addParameter('action', self::ACTION);
    $this->addParameter('Identification[RetailerUniqueRef]', $this->getIdentificationRetailerUniqueRef());
    $this->addParameter('Identification[InstallationID]', $this->getIdentificationInstallationId());
    $this->addParameter('Goods[Description]', $this->getGoodsDescription());
    $this->addParameter('Goods[Price]', $this->getGoodsPrice());
    $this->addParameter('Finance[Code]', $this->getFinanceCode());
    $this->addParameter('Finance[Deposit]', $this->getFinanceDeposit());
    $this->addParameter('Consumer[Title]', $this->getConsumerTitle());
    $this->addParameter('Consumer[Forename]', $this->getConsumerForename());
    $this->addParameter('Consumer[Surname]', $this->getConsumerSurname());
    $this->addParameter('Consumer[Gender]', $this->getConsumerGender());
    $this->addParameter('Consumer[MaritalStatus]', $this->getConsumerMaritalStatus());
    $this->addParameter('Consumer[MobileNumber]', $this->getConsumerMobileNumber());
    $this->addParameter('Consumer[EmailAddress]', $this->getConsumerEmailAddress());
    $this->addParameter('Consumer[ResidentialStatus]', $this->getConsumerResidentialStatus());
    $this->addParameter('Consumer[Employment][Status]', $this->getConsumerEmploymentStatus());
    $this->addParameter('Consumer[Employment][Occupation]', $this->getConsumerEmploymentOccupation());
    $this->addParameter('Consumer[Employment][EmployerName]', $this->getConsumerEmploymentEmployerName());
    $this->addParameter('Consumer[Employment][Years]', $this->getConsumerEmploymentYears());
    $this->addParameter('Consumer[Employment][Salary]', $this->getConsumerEmploymentSalary());
    $this->addParameter('Consumer[Bank][AccountName]', $this->getConsumerBankAccountName());
    $this->addParameter('Consumer[Bank][AccountNumber]', $this->getConsumerBankAccountNumber());
    $this->addParameter('Consumer[Bank][SortCode]', $this->getConsumerBankSortCode());
    $this->addParameter('Consumer[Bank][Years]', $this->getConsumerBankYears());

    if ($this->getConsumerDateOfBirthDay() !== null)
    {
      $this->addParameter('Consumer[DateOfBirthDay]', $this->getConsumerDateOfBirthDay()->format('d'));
      $this->addParameter('Consumer[DateOfBirthMonth]', $this->getConsumerDateOfBirthDay()->format('m'));
      $this->addParameter('Consumer[DateOfBirthYear]', $this->getConsumerDateOfBirthDay()->format('Y'));
    }

    return $this->parameters;
  }

  /**
   * @return string
   */
  public function getIdentificationRetailerUniqueRef()
  {
    return $this->identificationRetailerUniqueRef;
  }

  /**
   * @param string $identificationRetailerUniqueRef
   */
  public function setIdentificationRetailerUniqueRef($identificationRetailerUniqueRef)
  {
    $this->identificationRetailerUniqueRef = $identificationRetailerUniqueRef;
  }

  /**
   * @return int
   */
  public function getIdentificationInstallationId()
  {
    return $this->identificationInstallationId;
  }

  /**
   * @param int $identificationInstallationId
   */
  public function setIdentificationInstallationId($identificationInstallationId)
  {
    $this->identificationInstallationId = $identificationInstallationId;
  }

  /**
   * @return string
   */
  public function getGoodsDescription()
  {
    return $this->goodsDescription;
  }

  /**
   * @param string $goodsDescription
   */
  public function setGoodsDescription($goodsDescription)
  {
    $this->goodsDescription = $goodsDescription;
  }

  /**
   * @return int
   */
  public function getGoodsPrice()
  {
    return $this->goodsPrice;
  }

  /**
   * @param int $goodsPrice
   */
  public function setGoodsPrice($goodsPrice)
  {
    $this->goodsPrice = $goodsPrice;
  }

  /**
   * @return string
   */
  public function getFinanceCode()
  {
    return $this->financeCode;
  }

  /**
   * @param string $financeCode
   */
  public function setFinanceCode($financeCode)
  {
    $this->financeCode = $financeCode;
  }

  /**
   * @return int
   */
  public function getFinanceDeposit()
  {
    return $this->financeDeposit;
  }

  /**
   * @param int $financeDeposit
   */
  public function setFinanceDeposit($financeDeposit)
  {
    $this->financeDeposit = $financeDeposit;
  }

  /**
   * @return string
   */
  public function getConsumerTitle()
  {
    return $this->consumerTitle;
  }

  /**
   * @param string $consumerTitle
   */
  public function setConsumerTitle($consumerTitle)
  {
    $this->consumerTitle = $consumerTitle;
  }

  /**
   * @return string
   */
  public function getConsumerForename()
  {
    return $this->consumerForename;
  }

  /**
   * @param string $consumerForename
   */
  public function setConsumerForename($consumerForename)
  {
    $this->consumerForename = $consumerForename;
  }

  /**
   * @return string
   */
  public function getConsumerSurname()
  {
    return $this->consumerSurname;
  }

  /**
   * @param string $consumerSurname
   */
  public function setConsumerSurname($consumerSurname)
  {
    $this->consumerSurname = $consumerSurname;
  }

  /**
   * @return \DateTime
   */
  public function getConsumerDateOfBirthDay()
  {
    return $this->consumerDateOfBirthDay;
  }

  /**
   * @param \DateTime $consumerDateOfBirthDay
   */
  public function setConsumerDateOfBirthDay($consumerDateOfBirthDay)
  {
    $this->consumerDateOfBirthDay = $consumerDateOfBirthDay;
  }

  /**
   * @return string
   */
  public function getConsumerGender()
  {
    return $this->consumerGender;
  }

  /**
   * @param string $consumerGender
   */
  public function setConsumerGender($consumerGender)
  {
    $this->consumerGender = $consumerGender;
  }

  /**
   * @return string
   */
  public function getConsumerMaritalStatus()
  {
    return $this->consumerMaritalStatus;
  }

  /**
   * @param string $consumerMaritalStatus
   */
  public function setConsumerMaritalStatus($consumerMaritalStatus)
  {
    $this->consumerMaritalStatus = $consumerMaritalStatus;
  }

  /**
   * @return string
   */
  public function getConsumerMobileNumber()
  {
    return $this->consumerMobileNumber;
  }

  /**
   * @param string $consumerMobileNumber
   */
  public function setConsumerMobileNumber($consumerMobileNumber)
  {
    $this->consumerMobileNumber = $consumerMobileNumber;
  }

  /**
   * @return string
   */
  public function getConsumerEmailAddress()
  {
    return $this->consumerEmailAddress;
  }

  /**
   * @param string $consumerEmailAddress
   */
  public function setConsumerEmailAddress($consumerEmailAddress)
  {
    $this->consumerEmailAddress = $consumerEmailAddress;
  }

  /**
   * @return string
   */
  public function getConsumerResidentialStatus()
  {
    return $this->consumerResidentialStatus;
  }

  /**
   * @param string $consumerResidentialStatus
   */
  public function setConsumerResidentialStatus($consumerResidentialStatus)
  {
    $this->consumerResidentialStatus = $consumerResidentialStatus;
  }

  /**
   * @return string
   */
  public function getConsumerEmploymentStatus()
  {
    return $this->consumerEmploymentStatus;
  }

  /**
   * @param string $consumerEmploymentStatus
   */
  public function setConsumerEmploymentStatus($consumerEmploymentStatus)
  {
    $this->consumerEmploymentStatus = $consumerEmploymentStatus;
  }

  /**
   * @return string
   */
  public function getConsumerEmploymentOccupation()
  {
    return $this->consumerEmploymentOccupation;
  }

  /**
   * @param string $consumerEmploymentOccupation
   */
  public function setConsumerEmploymentOccupation($consumerEmploymentOccupation)
  {
    $this->consumerEmploymentOccupation = $consumerEmploymentOccupation;
  }

  /**
   * @return string
   */
  public function getConsumerEmploymentEmployerName()
  {
    return $this->consumerEmploymentEmployerName;
  }

  /**
   * @param string $consumerEmploymentEmployerName
   */
  public function setConsumerEmploymentEmployerName($consumerEmploymentEmployerName)
  {
    $this->consumerEmploymentEmployerName = $consumerEmploymentEmployerName;
  }

  /**
   * @return string
   */
  public function getConsumerEmploymentYears()
  {
    return $this->consumerEmploymentYears;
  }

  /**
   * @param string $consumerEmploymentYears
   */
  public function setConsumerEmploymentYears($consumerEmploymentYears)
  {
    $this->consumerEmploymentYears = $consumerEmploymentYears;
  }

  /**
   * @return string
   */
  public function getConsumerEmploymentSalary()
  {
    return $this->consumerEmploymentSalary;
  }

  /**
   * @param string $consumerEmploymentSalary
   */
  public function setConsumerEmploymentSalary($consumerEmploymentSalary)
  {
    $this->consumerEmploymentSalary = $consumerEmploymentSalary;
  }

  /**
   * @return string
   */
  public function getConsumerBankAccountName()
  {
    return $this->consumerBankAccountName;
  }

  /**
   * @param string $consumerBankAccountName
   */
  public function setConsumerBankAccountName($consumerBankAccountName)
  {
    $this->consumerBankAccountName = $consumerBankAccountName;
  }

  /**
   * @return string
   */
  public function getConsumerBankAccountNumber()
  {
    return $this->consumerBankAccountNumber;
  }

  /**
   * @param string $consumerBankAccountNumber
   */
  public function setConsumerBankAccountNumber($consumerBankAccountNumber)
  {
    $this->consumerBankAccountNumber = $consumerBankAccountNumber;
  }

  /**
   * @return string
   */
  public function getConsumerBankSortCode()
  {
    return $this->consumerBankSortCode;
  }

  /**
   * @param string $consumerBankSortCode
   */
  public function setConsumerBankSortCode($consumerBankSortCode)
  {
    $this->consumerBankSortCode = $consumerBankSortCode;
  }

  /**
   * @return string
   */
  public function getConsumerBankYears()
  {
    return $this->consumerBankYears;
  }

  /**
   * @param string $consumerBankYears
   */
  public function setConsumerBankYears($consumerBankYears)
  {
    $this->consumerBankYears = $consumerBankYears;
  }
}
