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
        //Agregamos el campo imagen a la tabal de users
        Schema::table('users', function (Blueprint $table) {
            $table->string('imagen')->nullable(); /* el nullable indica que el campo puede ir vacío */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
};
