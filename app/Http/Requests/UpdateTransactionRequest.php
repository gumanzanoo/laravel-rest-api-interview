<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'initial_datetime' => ['required', 'date_format:Y-m-d H:i:s'],
            'final_datetime' => ['required', 'date_format:Y-m-d H:i:s', 'after:initial_datetime'],
            'duration' => ['required', 'date_format:H:i:s'],
            'buy_value' => ['required', 'numeric', 'min:0'],
            'sell_value' => ['required', 'numeric', 'min:0', 'gt:buy_value'],
            'result_value' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'initial_datetime' => 'Data inicial não informada.',
            'final_datetime' => 'Data final não informada.',
            'duration' => 'Valor de duração da transação não informado.',
            'buy_value' => 'Valor de compra não informado.',
            'sell_value' => 'Valor de venda não informado.',
            'result_value' => 'Valor resultante da transação não informado.',
            'description' => 'Descricao não informada.',
        ];
    }
}
