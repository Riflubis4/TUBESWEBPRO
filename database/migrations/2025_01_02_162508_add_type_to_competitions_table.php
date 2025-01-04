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
        Schema::table('competitions', function (Blueprint $table) {
            $table->string('type')->after('name')->default('academic'); // Default bisa diubah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
