<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_types', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('short', 10);
            $table->uuid('uid');
            $table->string('name');
            $table->enum('credit_level', [
                'all',
                'level1',
                'level2',
                'level3',
                'level4'
            ])->default('level4');
            $table->enum('debit_level', [
                'all',
                'level1',
                'level2',
                'level3',
                'level4'
            ])->default('level4');
            $table->unsignedInteger('credit_id')->nullable();
            $table->unsignedInteger('debit_id')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_types');
    }
}
