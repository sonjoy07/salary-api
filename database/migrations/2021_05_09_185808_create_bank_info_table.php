<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_info', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->double('current_balance');
            $table->tinyInteger('account_type')->comment('0 = savings,1=current');
            $table->tinyInteger('user_type')->default(0)->comment('0 = Employee,1=Company');
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
        Schema::dropIfExists('bank_info');
    }
}
