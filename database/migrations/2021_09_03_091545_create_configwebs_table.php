<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigwebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configwebs', function (Blueprint $table) {
            $table->id();
            $table->string('profile')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->text('desc')->nullable();
            $table->string('url')->nullable();
            $table->string('site_name')->nullable();
            $table->string('metadata')->nullable();
            $table->string('keywords')->nullable();
            $table->string('developer')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('configwebs');
    }
}
