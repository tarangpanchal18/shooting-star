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
            $table->foreignId('open_call_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('field_label');
            $table->string('field_name');
            $table->string('field_type');
            $table->string('field_description')->nullable();
            $table->enum('status', ['Active', 'InActive'])->default('InActive');
            $table->softDeletes();
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
