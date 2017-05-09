<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type_id')->unsigned();
            $table->decimal('amount', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('income_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('income_types');
        Schema::dropIfExists('incomes');
        Schema::enableForeignKeyConstraints();
    }
}
