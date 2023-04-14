<?php

namespace App\RepositoriesInterfaces;

interface TransactionInterface
{
    public function store(array $transaction);

    public function update(array $transaction, int $id);

    public function show(int $transaction_id);

    public function showAll();

    public function destroy(int $transaction_id);
}