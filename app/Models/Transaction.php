<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['initial_datetime', 'final_datetime', 'duration', 'buy_value', 'sell_value', 'result_value', 'description'];
}
