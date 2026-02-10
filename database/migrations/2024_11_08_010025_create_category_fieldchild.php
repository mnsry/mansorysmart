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
        Schema::create('category_fieldchild', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('fieldchild_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('fieldchild_id')->references('id')->on('fieldchilds');
            $table->primary(['category_id','fieldchild_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_fieldchild');
    }
};
