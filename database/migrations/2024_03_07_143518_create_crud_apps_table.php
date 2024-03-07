<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crud_apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('gender');
            $table->integer('age');
            $table->string('occupation');
            $table->string('image')->nullable();
            $table->timestamp('date')->nulable();
            $table->string('color');
            $table->text('about');
            $table->tinyInteger('check_me')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crud_apps');
    }
};
