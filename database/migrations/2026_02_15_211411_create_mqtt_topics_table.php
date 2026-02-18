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
        Schema::create('mqtt_topics', function (Blueprint $table) {
            $table->id();
            // مالک تاپیک
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // ترتیب نمایش در پنل
            $table->integer('order')->default(1);
            // آیا این تاپیک لاگ شود؟
            $table->boolean('log_enabled')->default(false);
            // نام نمایشی در پنل
            $table->string('name', 50);
            // نام واقعی تاپیک در MQTT
            $table->string('topic', 50);
            /*
                direction:
                0 = publish (ارسال به دستگاه)
                1 = subscribe (دریافت از دستگاه)
            */
            $table->enum('direction', ['publish', 'subscribe',])->default('publish');
            //$table->boolean('direction')->default(false);

            /*
                data_type:
                0 = bit (0/1)
                1 = word (عدد)
            */
            $table->enum('type', ['bit', 'word',])->default('bit');
            //$table->boolean('bit_word')->default(false);
            /*
                display_type (برای word):
                0 = number
                1 = chart
                2 = progress
            */
            $table->enum('publish_word', ['number', 'chart', 'progress',])->default('number');
            //$table->tinyInteger('publish_word')->default(0);

            $table->integer('word_min_value')->nullable();
            $table->integer('word_max_value')->nullable();
            // فقط برای bit
            $table->string('publish_icon_on',  100)->nullable();
            $table->string('publish_icon_off', 100)->nullable();
            // فعال/غیرفعال بودن تاپیک
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            // هر کاربر می‌تواند topic مشابه کاربر دیگر داشته باشد
            $table->unique(['user_id', 'topic']);
            $table->index('user_id');
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mqtt_topics');
    }
};
