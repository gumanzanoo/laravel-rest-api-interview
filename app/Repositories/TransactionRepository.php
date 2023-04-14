<?php

namespace App\Repositories;

use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionsCollection;
use App\RepositoriesInterfaces\TransactionInterface;
use App\Models\Transaction;
use App\Traits\TransactionTrait;

class TransactionRepository implements TransactionInterface
{
    use TransactionTrait;

    public function __construct(protected Transaction $transaction) {}

    public function store(array $transaction): TransactionResource
    {
        $duration = $this->transactionDuration($transaction['initial_datetime'], $transaction['final_datetime']);

        $result_value = $this->transactionResultValue($transaction['sell_value'], $transaction['buy_value']);

        $transaction = $this->transaction::query()
            ->create([
                'initial_datetime' => $transaction['initial_datetime'],
                'final_datetime' => $transaction['final_datetime'],
                'duration' => $duration,
                'buy_value' => $transaction['buy_value'],
                'sell_value' => $transaction['sell_value'],
                'result_value' => $result_value,
                'description' => $transaction['description']
            ]);

        return TransactionResource::make($transaction);
    }

    public function update(array $transaction, int $id): TransactionResource
    {
        $this->transaction::query()
            ->where('id', $id)
            ->update([
                'initial_datetime' => $transaction['initial_datetime'],
                'final_datetime' => $transaction['final_datetime'],
                'duration' => $transaction['duration'],
                'buy_value' => $transaction['buy_value'],
                'sell_value' => $transaction['sell_value'],
                'result_value' => $transaction['result_value'],
                'description' => $transaction['description']
            ]);

        $transaction = $this->transaction::query()->find($id);

        return TransactionResource::make($transaction);
    }

    public function show(int $transaction_id): TransactionResource
    {
        $transaction = $this->transaction::query()
            ->find($transaction_id);

        return TransactionResource::make($transaction);
    }

    public function showAll(): TransactionsCollection
    {
        $transactions = $this->transaction::all();

        return TransactionsCollection::make($transactions);
    }

    public function destroy(int $transaction_id)
    {
        $this->transaction::destroy($transaction_id);
    }
}