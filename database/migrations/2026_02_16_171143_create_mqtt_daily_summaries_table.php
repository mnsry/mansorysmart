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
        Schema::create('mqtt_daily_summaries', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mqtt_topic_id')->constrained()->cascadeOnDelete();
            $table->date('summary_date');

            $table->double('min_value')->nullable();
            $table->double('max_value')->nullable();
            $table->double('avg_value')->nullable();
            $table->integer('total_count')->default(0);

            $table->primary(['user_id','mqtt_topic_id','summary_date']);
            $table->index('summary_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mqtt_daily_summaries');
    }
};
