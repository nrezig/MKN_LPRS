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
        Schema::create('candidature', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ref_etudiant');
            $table->unsignedBigInteger('ref_offre');
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
