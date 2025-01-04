<?php

// database/migrations/xxxx_xx_xx_create_competitions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('entry_fee', 8, 2);
            $table->string('status');  // tambah ini
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('competitions');
    }
}
