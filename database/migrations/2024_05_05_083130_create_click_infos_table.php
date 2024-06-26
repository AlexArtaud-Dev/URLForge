<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClickInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('geolocation')->nullable();
            $table->string('browser');
            $table->boolean('is_bot');
            $table->timestamp('clicked_at');
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
        Schema::dropIfExists('click_infos');
    }
}
