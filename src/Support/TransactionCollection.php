<?php

namespace Cloudcogs\PayPal\Support;

class TransactionCollection extends AbstractCollection
{
    protected const TRANSACTIONS = 'transactions';

    protected function getTransactions(): ?array
    {
        $transactions = $this->{self::TRANSACTIONS};
        if (is_array($transactions))
        {
            foreach ($transactions as $i => $transaction)
            {
                if (is_array($transaction))
                    $transactions[$i] = new Transaction($transaction);
            }
            $this->offsetSet(self::TRANSACTIONS, $transactions);
        }

        return $transactions;
    }

    protected function setCollection(): AbstractCollection
    {
        if (empty($this->collection))
            $this->collection = $this->getTransactions() ?? [];

        return $this;
    }
}
