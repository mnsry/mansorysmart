<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE publish_logs (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                mqtt_topic_id BIGINT UNSIGNED NOT NULL,
                numeric_value DECIMAL(14,4) NOT NULL,
                created_at DATETIME NOT NULL,

                PRIMARY KEY (id, created_at),
                INDEX idx_topic_created (mqtt_topic_id, created_at)
            )
            PARTITION BY RANGE COLUMNS(created_at) (
                PARTITION p202602 VALUES LESS THAN ('2026-03-01'),
                PARTITION p202603 VALUES LESS THAN ('2026-04-01'),
                PARTITION p202604 VALUES LESS THAN ('2026-05-01'),
                PARTITION p202605 VALUES LESS THAN ('2026-06-01'),
                PARTITION p202606 VALUES LESS THAN ('2026-07-01'),
                PARTITION p202607 VALUES LESS THAN ('2026-08-01'),
                PARTITION p202608 VALUES LESS THAN ('2026-09-01'),
                PARTITION p202609 VALUES LESS THAN ('2026-10-01'),
                PARTITION p202610 VALUES LESS THAN ('2026-11-01'),
                PARTITION p202611 VALUES LESS THAN ('2026-12-01'),
                PARTITION p202612 VALUES LESS THAN ('2027-01-01'),
                PARTITION p202701 VALUES LESS THAN ('2027-02-01'),
                PARTITION pmax VALUES LESS THAN (MAXVALUE)
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE IF EXISTS publish_logs");
    }
};
