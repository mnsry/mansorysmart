<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE mqtt_logs (
                id BIGINT UNSIGNED AUTO_INCREMENT,
                user_id BIGINT UNSIGNED NOT NULL,
                mqtt_topic_id BIGINT UNSIGNED NOT NULL,
                value VARCHAR(100),
                created_at DATETIME NOT NULL,
                updated_at DATETIME NULL,

                PRIMARY KEY (id, created_at),
                INDEX(user_id),
                INDEX(mqtt_topic_id),
                INDEX(created_at),
                INDEX(user_id, created_at)
            )
            PARTITION BY RANGE (YEAR(created_at)*100 + MONTH(created_at)) (
                PARTITION p202601 VALUES LESS THAN (202602),
                PARTITION p202602 VALUES LESS THAN (202603),
                PARTITION p202603 VALUES LESS THAN (202604),
                PARTITION pmax VALUES LESS THAN MAXVALUE
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mqtt_logs');
    }
};
