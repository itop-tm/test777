<?php

namespace Domain\Payments\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Domain\Transactions\Models\Transaction;
use Domain\Transactions\Enums\TransactionState;

trait HasTransactions
{
    public $latestTransaction;

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'payment_uuid', 'uuid');
    }

    public function captureTransaction($response, string $name)
    {
        $this->loadLatestTransaction();

        return $this
                ->transaction()
                ->create([
                    'previous_id'  => $this->getLatestTransactionId(),
                    'order'        => $this->getLatestTransactionOrder(),
                    'client_id'    => $this->client_id,
                    'service'      => $this->service,
                    'response'     => $response,
                    'state'        => TransactionState::OK,
                    'name'         => $name
                ]);
    }

    public function captureTransactionError($response, string $name, $error = null)
    {
        $this->loadLatestTransaction();

        return $this
                ->transaction()
                ->create([
                    'previous_id' => $this->getLatestTransactionId(),
                    'order'       => $this->getLatestTransactionOrder(),
                    'client_id'   => $this->client_id,
                    'service'     => $this->service,
                    'response'    => $response,
                    'exception'   => $error,
                    'state'       => TransactionState::EXCEPTION,
                    'name'        => $name
                ]);
    }

    public function getLatestTransaction()
    {
        return $this->transaction()
                ->orderBy('order', 'desc')
                ->first();
    }

    public function getLatestTransactionOrder()
    {
        return isset($this->latestTransaction->order) ? $this->latestTransaction->order + 1 : 1;
    }

    public function getLatestTransactionId()
    {
        return $this->latestTransaction->id ?? null;
    }

    public function loadLatestTransaction()
    {
        $this->latestTransaction = $this->getLatestTransaction();
    }
}
