<?php

use App\Models\Autor;
use App\Models\Livro;
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
        Schema::create('autor_livro', function (Blueprint $table) {
            $table->foreignIdFor(Autor::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Livro::class)->constrained()->onDelete('cascade');
            $table->primary(['autor_id', 'livro_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autor_livro');
    }
};
