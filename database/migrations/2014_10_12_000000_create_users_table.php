<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birthday')->nullable();
            $table->text('address')->nullable();
            $table->text('googlemap')->nullable();
            $table->string('phone')->nullable();
            $table->text('about')->nullable();
            $table->string('picture')->nullable();
            $table->string('education')->nullable();
            $table->date('edu_date_start')->nullable();
            $table->date('edu_date_finish')->nullable();
            $table->string('job')->nullable();
            $table->string('akun_fb')->nullable();
            $table->string('akun_git')->nullable();
            $table->string('akun_linkedin')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
