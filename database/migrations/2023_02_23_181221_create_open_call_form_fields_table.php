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
            $table->string('field_name')->unique();
            $table->string('field_type');
            $table->string('field_multi_value')->nullable();
            $table->string('field_description')->nullable();
            $table->boolean('field_is_required')->default(1);
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
