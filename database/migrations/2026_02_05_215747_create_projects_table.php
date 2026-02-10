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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade' );
            $table->string('project_name')->nullable();
            $table->string('project_address')->nullable();
            $table->string('image')->nullable();
            $table->string('multi_images')->nullable()->default('[]');
            $table->string('description')->nullable(); // توضیحات اضافی
            // وضعیت پروژه
            $table->enum('type', ['home', 'bagh', 'sanati', 'hotel', 'edare', 'other'])->default('home');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            // تاریخ‌ها
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
