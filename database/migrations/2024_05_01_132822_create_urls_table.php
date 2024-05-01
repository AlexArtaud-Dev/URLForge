<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('originalUrl');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->integer('click_count');
            $table->integer('max_click')->nullable();
            $table->string('password')->nullable();
            $table->date('expiration_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['slug', 'originalUrl']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
