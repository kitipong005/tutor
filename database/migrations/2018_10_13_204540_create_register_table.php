<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FirstName_Std')->nullable();
            $table->string('LastName_Std')->nullable();
            $table->string('NickName_Std')->nullable();
            $table->string('Gender_Std')->nullable();
            $table->string('Age_Std')->nullable();
            $table->string('Birth_Std')->nullable();
            $table->string('School_Std')->nullable();
            $table->string('Class_Std')->nullable();
            $table->string('Major_Std')->nullable();
            $table->string('Email_Std')->nullable();
            $table->string('Tel_Std')->nullable();
            $table->string('Line_Std')->nullable();
            $table->string('Address_Std')->nullable();
            $table->string('FirstName_Par')->nullable();
            $table->string('LastName_Par')->nullable();
            $table->string('Email_Par')->nullable();
            $table->string('Tel_Par')->nullable();
            $table->string('Line_Par')->nullable();
            $table->string('course_1')->nullable();
            $table->string('price1')->nullable();
            $table->string('course_2')->nullable();
            $table->string('price2')->nullable();
            $table->string('course_3')->nullable();
            $table->string('price3')->nullable();
            $table->string('std')->nullable();
            $table->string('c_1')->nullable();
            $table->string('c_2')->nullable();
            $table->string('c_3')->nullable();
            $table->string('ThaiMoney')->nullable();
            $table->string('Pay')->nullable();
            $table->string('ID_Card')->nullable();
            $table->string('ID_Slip')->nullable();
            $table->string('Credit_Bank')->nullable();
            $table->string('Amount')->nullable();
            $table->string('Bank')->nullable();
            $table->string('Note')->nullable();
            $table->string('Status');
            $table->string('Term_ID');
            $table->string('User_id');
            $table->string('province');
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register');
    }
}
