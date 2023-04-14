<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class TransactionsCollection extends ResourceCollection
{
    public function toArray(Request $request): Collection
    {
        return $this->collection;
    }
}