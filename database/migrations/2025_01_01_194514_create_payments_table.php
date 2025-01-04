<?php

// database/migrations/xxxx_xx_xx_create_payments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->id('payment_id');
            $table->string('user');
            $table->string('event_type');
            $table->string('event_name');
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
