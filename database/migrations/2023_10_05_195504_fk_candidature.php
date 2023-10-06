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
        Schema::table('candidature', function (Blueprint $table) {
            $table->foreign('ref_etudiant')->references('id')->on('etudiant');
            $table->foreign('ref_offre')->references('id')->on('offre');

            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidature', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();

            $table->dropForeign(['ref_etudiant']);
            $table->dropForeign(['ref_offre']);
        });
    }
};
