<?php

namespace Sisow\API\Method;

use Sisow\API\Client;
use Sisow\API\Exception;
use Sisow\API\Method;
use Sisow\API\Result\StatusRequestResult;

class StatusRequest extends Method
{
    /** @var string */
    private $transactionId;

    /**
     * @param Client $client
     * @param string $transactionId
     */
    public function __construct(Client $client, $transactionId)
    {
        $this->setClient($client);
        $this->setTransactionId($transactionId);
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return sha1("{$this->getTransactionId()}{$this->getShopId()}{$this->getClient()->getMerchantId()}{$this->getClient()->getMerchantKey()}");
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
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @param array $parameters
     * @return StatusRequestResult
     * @throws Exception
     */
    public function execute(array $parameters = array())
    {
        $client = $this->getClient();

        $parameters = array(
            'shopid' => $this->getShopId(),
            'merchantid' => $client->getMerchantId(),
            'trxid' => $this->transactionId,
            'sha1' => $this->getHash()
        );
        return new StatusRequestResult($client, parent::execute($parameters));
    }
}
