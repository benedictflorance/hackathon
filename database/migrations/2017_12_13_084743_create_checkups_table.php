<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('aadhar');
            $table->biginteger('registerid');
            $table->mediumText('questions');
            $table->longText('advice');
            $table->mediumText('medicines');
            $table->boolean('emergency');
            $table->boolean('vaccination');
            $table->boolean('surgery');
            $table->string('accompany',512)->nullable();
            $table->biginteger('accmobile')->nullable();
            $table->mediumText('surgdetail')->nullable();
            $table->mediumText('vaccdetail')->nullable();
            $table->mediumText('emergdetail')->nullable();
            $table->mediumText('remarks')->nullable();
            $table->string('filename',256)->nullable();
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
        Schema::dropIfExists('checkups');
    }
}
