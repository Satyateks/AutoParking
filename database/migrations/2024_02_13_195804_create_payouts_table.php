<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePayoutsTable extends Migration
{
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->decimal('amount', 10, 2);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payouts');
    }
}
