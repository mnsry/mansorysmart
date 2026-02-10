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
        Schema::create('mqtts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade' );
            $table->string('ip_static', 20);
            $table->string('vnc_ip', 20);
            $table->string('vnc_password', 20);
            $table->string('mqtt_server', 30);
            $table->string('mqtt_port', 50);
            $table->string('mqtt_account', 50);
            $table->string('mqtt_password', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mqtts');
    }
};
