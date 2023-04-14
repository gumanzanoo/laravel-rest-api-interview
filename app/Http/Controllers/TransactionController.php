<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Responses\ApiResponse;
use App\Repositories\TransactionRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct(protected TransactionRepository $transactionRepository) {}

    public function index(): JsonResponse
    {
        try {
            $data = $this->transactionRepository->showAll();
            return ApiResponse::success($data);
        } catch (Exception $exception) {
            return ApiResponse::failed($exception);
        }
    }

    public function store(StoreTransactionRequest $request): JsonResponse
    {
        try {
            $validated_transaction = $request->validated();

            $data = null;
            DB::transaction(function () use ($validated_transaction, &$data) {
                $data = $this->transactionRepository->store($validated_transaction);
            });

            return ApiResponse::success($data);
        } catch (Exception $exception) {
            return ApiResponse::failed($exception);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $data = $this->transactionRepository->show($id);

            return ApiResponse::success($data);
        } catch (Exception $exception) {
            return ApiResponse::failed($exception);
        }
    }

    public function update(UpdateTransactionRequest $request, $transaction_id): JsonResponse
    {
        try {
            $validated = $request->validated();

            $data = null;
            DB::transaction(function () use ($validated, $transaction_id, &$data) {
                $data = $this->transactionRepository->update($validated, $transaction_id);
            });

            return ApiResponse::success($data);
        } catch (Exception $exception) {
            return ApiResponse::failed($exception);
        }
    }

    public function destroy(int $transaction_id): JsonResponse
    {
        try {
            DB::transaction(function () use ($transaction_id) {
                $this->transactionRepository->destroy($transaction_id);
            });

            return ApiResponse::success();
        } catch (Exception $exception) {
            return ApiResponse::failed($exception);
        }
    }
}
