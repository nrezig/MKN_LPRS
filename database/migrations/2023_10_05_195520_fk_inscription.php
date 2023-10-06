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
        Schema::table('inscription', function (Blueprint $table) {
            $table->foreign('ref_etudiant')->references('id')->on('etudiant');
            $table->foreign('ref_evenement')->references('id')->on('evenement');

            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::table('inscription', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();

            $table->dropForeign(['ref_etudiant']);
            $table->dropForeign(['ref_evenement']);
        });
    }
};
