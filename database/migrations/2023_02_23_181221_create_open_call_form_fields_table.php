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
        Schema::create('open_call_form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreign('open_call_id')->references('id')->on('users');
            $table->string('field_label');
            $table->string('field_name');
            $table->string('field_type');
            $table->string('field_description')->nullable();
            $table->enum('status', ['Active', 'InActive'])->default('InActive');
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
        Schema::dropIfExists('open_call_form_fields');
    }
};
