<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->comment('使用者id');
            $table->string('user_email',150)->unique()->comment = 'Email';
            $table->string('user_pass',150)->comment = '密碼';
            $table->string('user_name',20)->comment = '姓名';
            $table->string('user_role',2)->comment = '權限';
            $table->string('user_service',20)->nullable()->comment = '服務單位';
            $table->string('user_title',10)->nullable()->comment = '職稱';
            $table->string('user_valid',1)->comment = '是否停權(0:無效,1:有效)';
            $table->ipAddress('recent_visit_ip');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
