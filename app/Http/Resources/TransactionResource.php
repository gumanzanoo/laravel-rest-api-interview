<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'initial_datetime' => $this->initial_datetime,
            'final_datetime' => $this->final_datetime,
            'duration' => $this->duration,
            'buy_value' => $this->buy_value,
            'sell_value' => $this->sell_value,
            'result_value' => $this->result_value,
            'description' => $this->description
        ];
    }
}
