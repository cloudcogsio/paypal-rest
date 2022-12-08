<?php

namespace Cloudcogs\PayPal\Message\Subscriptions;

use Cloudcogs\PayPal\Exception\UnsuccessfulResponseException;
use Cloudcogs\PayPal\Message\AbstractResponse;
use Cloudcogs\PayPal\Support\TransactionCollection;

class ListTransactionsForSubscriptionResponse extends AbstractResponse
{
    protected TransactionCollection $transactionCollection;
    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getHttpResponse()->getStatusCode() == 200;
    }

    public function getTransactionList(): TransactionCollection
    {
        if ($this->isSuccessful())
            return $this->transactionCollection ?? $this->transactionCollection = new TransactionCollection($this->getData());

        throw new UnsuccessfulResponseException();
    }
}
