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
        Schema::table('rdv', function (Blueprint $table) {

            $table->foreign('ref_entreprise')->references('id')->on('entreprise');
            $table->foreign('ref_offre')->references('id')->on('offre');

            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rdv', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();

            $table->dropForeign(['ref_entreprise']);
            $table->dropForeign(['ref_offre']);

        });
    }
};
