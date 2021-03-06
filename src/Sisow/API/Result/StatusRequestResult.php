<?php

namespace Sisow\API\Result;

use Sisow\API\Client;
use Sisow\API\Exception;
use Sisow\API\Result;

class StatusRequestResult extends Result
{
    /** @var string */
    private $transactionId;

    /** @var string */
    private $status;

    /** @var int */
    private $amount;

    /** @var int|string */
    private $purchaseId;

    /** @var string */
    private $description;

    /** @var int|string */
    private $entranceCode;

    /** @var int */
    private $issuerId;

    /** @var \DateTime */
    private $timestamp;

    /** @var string */
    private $consumerName;

    /** @var string */
    private $consumerCity;

    /** @var string */
    private $consumerIban;

    /** @var string */
    private $consumerBic;

    /**
     * @param Client $client
     * @param array $statusRequestData
     * @throws Exception
     */
    public function __construct(Client $client, array $statusRequestData)
    {
        $this->setClient($client);

        if (!isset($statusRequestData['signature']['sha1'])) {
            throw new Exception('Signature is missing');
        }
        $this->setSignature($statusRequestData['signature']['sha1']);

        $statusRequestData = call_user_func_array('array_merge', $statusRequestData);

        if (isset($statusRequestData['trxid'])) {
            $this->setTransactionId($statusRequestData['trxid']);
        }
        if (isset($statusRequestData['status'])) {
            $this->setStatus($statusRequestData['status']);
        }
        if (isset($statusRequestData['amount'])) {
            $this->setAmount($statusRequestData['amount']);
        }
        if (isset($statusRequestData['purchaseid'])) {
            $this->setPurchaseId($statusRequestData['purchaseid']);
        }
        if (isset($statusRequestData['description'])) {
            $this->setDescription($statusRequestData['description']);
        }
        if (isset($statusRequestData['entrancecode'])) {
            $this->setEntranceCode($statusRequestData['entrancecode']);
        }
        if (isset($statusRequestData['issuerid'])) {
            $this->setIssuerId($statusRequestData['issuerid']);
        }
        if (isset($statusRequestData['timestamp'])) {
            $this->setTimestamp($statusRequestData['timestamp']);
        }
        if (isset($statusRequestData['consumername'])) {
            $this->setConsumerName($statusRequestData['consumername']);
        }
        if (isset($statusRequestData['consumercity'])) {
            $this->setConsumerCity($statusRequestData['consumercity']);
        }
        if (isset($statusRequestData['consumeriban'])) {
            $this->setConsumerIban($statusRequestData['consumeriban']);
        }
        if (isset($statusRequestData['consumerbic'])) {
            $this->setConsumerBic($statusRequestData['consumerbic']);
        }
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    protected function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    protected function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    protected function setAmount($amount)
    {
        $this->amount = (int)$amount;
    }

    /**
     * @return int|string
     */
    public function getPurchaseId()
    {
        return $this->purchaseId;
    }

    /**
     * @param string $purchaseId
     */
    protected function setPurchaseId($purchaseId)
    {
        $this->purchaseId = $purchaseId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    protected function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int|string
     */
    public function getEntranceCode()
    {
        return $this->entranceCode;
    }

    /**
     * @param string $entranceCode
     */
    protected function setEntranceCode($entranceCode)
    {
        $this->entranceCode = $entranceCode;
    }

    /**
     * @return int
     */
    public function getIssuerId()
    {
        return $this->issuerId;
    }

    /**
     * @param string $issuerId
     */
    protected function setIssuerId($issuerId)
    {
        $this->issuerId = (int)$issuerId;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    protected function setTimestamp($timestamp)
    {
        $this->timestamp = new \DateTime($timestamp);
    }

    /**
     * @return string
     */
    public function getConsumerName()
    {
        return $this->consumerName;
    }

    /**
     * @param string $consumerName
     */
    protected function setConsumerName($consumerName)
    {
        $this->consumerName = is_array($consumerName) ? '' : $consumerName;
    }

    /**
     * @return string
     */
    public function getConsumerCity()
    {
        return $this->consumerCity;
    }

    /**
     * @param string $consumerCity
     */
    protected function setConsumerCity($consumerCity)
    {
        $this->consumerCity = is_array($consumerCity) ? '' : $consumerCity;
    }

    /**
     * @return string
     */
    public function getConsumerIban()
    {
        return $this->consumerIban;
    }

    /**
     * @param string $consumerIban
     */
    protected function setConsumerIban($consumerIban)
    {
        $this->consumerIban = is_array($consumerIban) ? '' : $consumerIban;
    }

    /**
     * @return string
     */
    public function getConsumerBic()
    {
        return $this->consumerBic;
    }

    /**
     * @param string $consumerBic
     */
    protected function setConsumerBic($consumerBic)
    {
        $this->consumerBic = is_array($consumerBic) ? '' : $consumerBic;
    }
}
