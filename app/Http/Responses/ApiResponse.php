<?php

namespace App\Http\Responses;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiResponse extends JsonResponse
{
    public static function success(object $data = null): JsonResponse
    {
        return response()->json([
          'status' => 'Success',
          'message' => 'Operação realizada com sucesso.',
          'code' => 200,
          'data' => $data
        ]);
    }

    public static function failed(Exception $exception = null): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => 'Erro ao realizar operação.',
            'code' => $exception->getCode()
        ]);
    }
}