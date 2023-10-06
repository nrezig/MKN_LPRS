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
        Schema::table('rep_entreprise', function (Blueprint $table) {

            $table->foreign('ref_entreprise')->references('id')->on('entreprise');
            Schema::enableForeignKeyConstraints();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rep_entreprise', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();

            $table->dropForeign(['ref_entreprise']);
        });
    }
};
