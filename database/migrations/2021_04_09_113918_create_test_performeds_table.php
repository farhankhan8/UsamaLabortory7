<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestPerformedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_performeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('available_test_id');
            $table->unsignedBigInteger('catagory_id');

            $table->timestamps();
            $table->foreign('available_test_id')->references('id')->on('available_tests')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('catagory_id')->references('id')->on('catagories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_performeds');
    }
}
