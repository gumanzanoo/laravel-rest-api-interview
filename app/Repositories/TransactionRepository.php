<?php

namespace App\Repositories;

use App\RepositoriesInterfaces\TransactionInterface;
use App\Models\Transaction;
use App\Traits\TransactionTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository implements TransactionInterface
{
    use TransactionTrait;

    public function __construct(protected Transaction $transaction) {}

    public function store(array $transaction)
    {
        $duration = $this->transactionDuration($transaction['initial_datetime'], $transaction['final_datetime']);

        $result_value = $this->transactionResultValue($transaction['sell_value'], $transaction['buy_value']);

        return $this->transaction::query()
            ->create([
                'initial_datetime' => $transaction['initial_datetime'],
                'final_datetime' => $transaction['final_datetime'],
                'duration' => $duration,
                'buy_value' => $transaction['buy_value'],
                'sell_value' => $transaction['sell_value'],
                'result_value' => $result_value,
                'description' => $transaction['description']
            ]);
    }

    public function update(array $transaction, int $id)
    {
        return $this->transaction::query()
            ->find($id)
            ->update([
                'initial_datetime' => $transaction['initial_datetime'],
                'final_datetime' => $transaction['final_datetime'],
                'duration' => $transaction['duration'],
                'buy_value' => $transaction['buy_value'],
                'sell_value' => $transaction['sell_value'],
                'result_value' => $transaction['result_value'],
                'description' => $transaction['description']
            ]);
    }

    public function show(int $transaction_id)
    {
        return $this->transaction::query()
            ->find($transaction_id)
            ->get();
    }

    public function showAll(): Collection
    {
        return $this->transaction::all();
    }

    public function destroy(int $transaction_id)
    {
        $this->transaction::query()
            ->where('id', $transaction_id)
            ->delete();
    }
}