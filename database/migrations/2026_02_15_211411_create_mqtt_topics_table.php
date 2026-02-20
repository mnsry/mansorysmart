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
            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->integer('order')->default(1);
            $table->string('name', 100);
            $table->string('topic', 255);
            // 0:publish  1:subscribe
            $table->boolean('direction')->default(0);
            // 0:bit 1:word
            $table->boolean('value_type')->default(0);
            // ['DigitalInput', 'DigitalOutput', 'DigitalMemory', 'AnalogInput', 'AnalogOutput', 'Temp', 'TempSet']
            $table->string('signal_type', 30)->default('DigitalOutput');
            $table->string('unit', 20)->nullable(); // °C, bar, %, V
            $table->tinyInteger('qos')->default(0);
            $table->boolean('retain')->default(false);
            $table->decimal('min_value', 12, 4)->nullable();
            $table->decimal('max_value', 12, 4)->nullable();
            $table->boolean('log_enabled')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('description')->nullable();
            $table->timestamps();
            $table->unique(['device_id', 'topic']);
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
