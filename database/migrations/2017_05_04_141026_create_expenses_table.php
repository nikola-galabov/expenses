<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product');
            $table->decimal('price', 10, 2);
            $table->integer('type_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('expense_types');
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
        Schema::dropIfExists('expense_types');
        Schema::dropIfExists('expenses');
        Schema::enableForeignKeyConstraints();
    }
}
