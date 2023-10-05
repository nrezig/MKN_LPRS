<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('offre', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100);
            $table->string('description', 200);
            $table->string('etat', 50);
            $table->unsignedBigInteger('ref_typeoffre');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
