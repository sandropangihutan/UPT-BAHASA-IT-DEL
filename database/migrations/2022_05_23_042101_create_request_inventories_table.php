<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('inventory_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->longText('description');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('inventory_id')->references('id')->on('inventories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_inventories');
    }
}
