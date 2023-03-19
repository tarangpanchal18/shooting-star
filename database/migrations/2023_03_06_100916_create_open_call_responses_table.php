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
        Schema::create('open_call_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('open_call_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('website_link');
            $table->text('instagram_link');
            $table->text('comment');
            $table->json('art_work_title')->nullable();
            $table->json('art_work_size')->nullable();
            $table->json('art_work_medium')->nullable();
            $table->json('art_work_image')->nullable();
            $table->json('other_field')->nullable();
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
        Schema::dropIfExists('open_call_responses');
    }
};
