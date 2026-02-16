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
        Schema::create('mqtt_commands', function (Blueprint $table) {
            $table->id();
            // ارتباطات
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mqtt_topic_id')->constrained()->cascadeOnDelete();
            // مقدار ارسال شده
            $table->string('sent_value',100);
            $table->dateTime('sent_at');
            // پاسخ دستگاه
            $table->string('response_value',100)->nullable();
            $table->dateTime('response_at')->nullable();
            // وضعیت پردازش
            $table->tinyInteger('status')->default(0);
            // 0 = pending
            // 1 = confirmed
            // 2 = failed
            // 3 = timeout
            $table->string('client_ip',45)->nullable();
            $table->timestamps();
            // ایندکس‌ها
            $table->index(['user_id','created_at']);
            $table->index(['mqtt_topic_id','created_at']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mqtt_commands');
    }
};
