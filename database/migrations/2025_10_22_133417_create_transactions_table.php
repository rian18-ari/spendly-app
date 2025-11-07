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
            $table->decimal('amount', 15, 0);
            $table->text('note');
            $table->date('date');
            $table->enum('type', ['pemasukan', 'pengeluaran']);
            $table->enum('status', ['menunggu', 'di setujui', 'di tolak']);
            $table->unsignedBigInteger('budget_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->foreign('user_id')->references('id')->on('user');
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
