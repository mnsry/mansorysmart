<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'type', 'is_active', 'is_online', 'last_seen_at', 'last_ip', 'max_topics', 'max_messages_per_minute', 'meta',
    ];

    protected $casts = [
        'is_active' => 'boolean', 'is_online' => 'boolean', 'last_seen_at' => 'datetime', 'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mqttTopics()
    {
        return $this->hasMany(MqttTopic::class, 'device_id');
    }

    public function publishLogs()
    {
        return $this->hasManyThrough(
            PublishLog::class,
            MqttTopic::class,
            'device_id',      // Foreign key on mqtt_topics
            'mqtt_topic_id',  // Foreign key on publish_logs
            'id',             // Local key on devices
            'id'              // Local key on mqtt_topics
        );
    }

    public function subscribeLogs()
    {
        return $this->hasManyThrough(
            SubscribeLog::class,
            MqttTopic::class,
            'device_id',
            'mqtt_topic_id',
            'id',
            'id'
        );
    }

    // Scopes (کوئری‌های پرکاربرد)
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOnline($query)
    {
        return $query->where('is_online', true);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return $this->name . ' (' . $this->type . ')';
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    // Helper Methods
    public function canAddMoreTopics(): bool
    {
        return $this->mqttTopics()->count() < $this->max_topics;
    }

    public function canSendMoreMessages(int $currentMinuteCount): bool
    {
        return $currentMinuteCount < $this->max_messages_per_minute;
    }
}
