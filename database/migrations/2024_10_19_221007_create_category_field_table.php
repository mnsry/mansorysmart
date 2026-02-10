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
        Schema::create('category_field', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('field_id')->references('id')->on('fields');
            $table->primary(['category_id','field_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_field');
    }
};
