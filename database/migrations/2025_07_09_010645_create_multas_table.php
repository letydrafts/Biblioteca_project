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
        Schema::create('multas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('dias_multa');
            $table->string('motivo');
            $table->string('status');
            $table->foreignForId(Emprestimo::class)->constrained()->onDelete();
            $table->foreignForId(User::class)->constrained()->onDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multas');
    }
};
