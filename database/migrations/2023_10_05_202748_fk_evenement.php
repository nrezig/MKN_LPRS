<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('evenement', function (Blueprint $table) {

            $table->foreign('ref_etudiant')->references('id')->on('etudiant');
            $table->foreign('ref_repentreprise')->references('id')->on('rep_entreprise');
            $table->foreign('ref_salle')->references('id')->on('salle');
            $table->foreign('ref_admin')->references('id')->on('admin');

            Schema::enableForeignKeyConstraints();

        });


    }

    /**
     * Revrse the migrations.
     */

    public function down(): void
    {
        Schema::table('evenement', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();

            $table->dropForeign(['ref_etudiant']);
            $table->dropForeign(['ref_offre']);
            $table->dropForeign(['ref_repentreprise']);
            $table->dropForeign(['ref_salle']);
            $table->dropForeign(['ref_admin']);


        });
    }
};

