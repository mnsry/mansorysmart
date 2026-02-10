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
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default(1);
            $table->string('name', 20);
            $table->string('slug', 30)->unique();
            $table->enum('form', ['NULL', 'NUMBER', 'TEXT', 'TEXTAREA', 'SELECT', 'MULTISELECT', 'CHECKBOX', 'MULTICHECKBOX', 'RADIOBUTTON', 'DATE','IMAGE', 'MULTIIMAGE', 'VIDEO', 'FILE'])->default('NULL');
            $table->boolean('optional')->default(0);
            $table->boolean('field_child_categories')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
