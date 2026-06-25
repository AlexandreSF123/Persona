<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('guest', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('idade');

            /* $table->string('nome', 100); quantidade de 100 caracteres */
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest');
    }
};
