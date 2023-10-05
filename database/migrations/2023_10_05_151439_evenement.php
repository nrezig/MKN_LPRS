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
        Schema::create('evenement', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description', 200);
            $table->date('date');
            $table->time('heure');
            $table->integer('duree');
            $table->unsignedBigInteger('ref_etudiant');
            $table->unsignedBigInteger('ref_repentreprise');
            $table->unsignedBigInteger('ref_salle');
            $table->unsignedBigInteger('ref_admin');
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
