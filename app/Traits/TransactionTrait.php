<?php

namespace App\Traits;

use Carbon\Carbon;

trait TransactionTrait
{
    public function transactionDuration(string $initial_datetime, string $final_datetime): string
    {
        $initial = Carbon::createFromDate($initial_datetime);
        $final = Carbon::createFromDate($final_datetime);

        $date_interval = $initial->diff($final);
        return $date_interval->format('%H:%I:%S');
    }

    public function transactionResultValue(float $sell_value, float $buy_value): float
    {
        return $sell_value - $buy_value;
    }
}