<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'initial_datetime' => ['required', 'date_format:Y-m-d H:i:s'],
            'final_datetime' => ['required', 'date_format:Y-m-d H:i:s', 'after:initial_datetime'],
            'buy_value' => ['required', 'numeric', 'min:0'],
            'sell_value' => ['required', 'numeric', 'min:0', 'gt:buy_value'],
            'description' => ['required', 'string', 'max:255']
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'initial_datetime.required' => 'Data inicial não informada.',
            'final_datetime.required' => 'Data final não informada.',
            'buy_value.required' => 'Valor de compra não informado.',
            'sell_value.required' => 'Valor de venda não informado.',
            'description.required' => 'Descricao não informada.',
        ];
    }
}
