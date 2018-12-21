<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('customer_id')->unsigned()->nullable()->index();
            $table->string('particular')->nullable()->index();
            $table->integer('journalType_id')->unsigned()->nullable()->index();
            $table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');
            $table->foreign('customer_id') ->references('id')->on('customer') ->onDelete('cascade');
            $table->foreign('journalType_id') ->references('id')->on('journalType') ->onDelete('cascade');
            
            
            
            $table->integer('amount');;
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
        Schema::dropIfExists('transactions');
    }
}
