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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->string('autor');
            $table->float('preco', 4, 2);
            $table->bigInteger('quantidade');
            $table->text('biografiaAutor')->nullable();
            $table->string('nacionalidadeAutor')->nullable();
            $table->timestamps();

            return 'Produto Cadastrado com sucesso!';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
