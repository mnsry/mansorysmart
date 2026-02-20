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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            // مالک دستگاه
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            // اطلاعات عمومی
            $table->string('name', 100);
            $table->string('type', 50)->nullable();
            // BMS, PLC, ESP32, Gateway ...

            // وضعیت
            $table->boolean('is_active')->default(true);
            $table->boolean('is_online')->default(false);

            // مانیتورینگ
            $table->timestamp('last_seen_at')->nullable();
            $table->ipAddress('last_ip')->nullable();

            // محدودیت‌ها (برای پلن)
            $table->integer('max_topics')->default(100);
            $table->integer('max_messages_per_minute')->default(1000);

            // متادیتا قابل توسعه
            $table->json('meta')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
