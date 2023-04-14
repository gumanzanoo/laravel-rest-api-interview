<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('initial_datetime')->nullable(false)->comment('Data e hora de início.');
            $table->dateTime('final_datetime')->nullable(false)->comment('Data e hora final.');
            $table->string('duration', 50)->nullable(false)->comment('Tempo de duração.');
            $table->decimal('buy_value', 10, 2)->nullable(false)->comment('Valor de compra.');
            $table->decimal('sell_value', 10, 2)->nullable(false)->comment('Valor de venda.');
            $table->decimal('result_value', 10, 2)->nullable(false)->comment('Valor liquido da transação.');
            $table->string('description', 255)->nullable(false)->comment('Descrição');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
