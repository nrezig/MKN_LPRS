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
        Schema::table('offre', function (Blueprint $table) {

            $table->foreign('ref_type')->references('id')->on('type');

            Schema::enableForeignKeyConstraints();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offre', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();

            $table->dropForeign(['ref_type']);
        });
    }
};
