<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('short_description');
            $table->string('other_short_description');
            $table->text('filename');
            $table->string('file_size');
            $table->text('filename_md')->nullable();
            $table->text('filename_sm')->nullable();
            $table->enum('status', ['Active', 'InActive'])->default('Active');
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
        Schema::dropIfExists('artist_images');
    }
};
