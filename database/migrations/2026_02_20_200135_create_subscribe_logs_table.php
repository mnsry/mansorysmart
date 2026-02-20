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
        Schema::create('subscribe_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mqtt_topic_id');
            $table->decimal('numeric_value', 14, 4)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index(['mqtt_topic_id','created_at'], 'idx_sub_topic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_logs');
    }
};
