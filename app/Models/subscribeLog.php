<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribeLog extends Model
{
    use HasFactory;

    protected $table = 'subscribe_logs';

    public $timestamps = false; // فقط created_at داریم

    protected $fillable = [
        'mqtt_topic_id',
        'numeric_value',
        'created_at',
    ];

    // Type casting
    protected $casts = [
        'numeric_value' => 'decimal:4',
        'created_at' => 'datetime',
    ];

    // Relationships
    public function topic()
    {
        return $this->belongsTo(\App\Models\MqttTopic::class, 'mqtt_topic_id');
    }

    public function device()
    {
        return $this->hasOneThrough(
            \App\Models\Device::class,
            \App\Models\MqttTopic::class,
            'id',           // Foreign key on MqttTopic for SubscribeLog -> mqtt_topic_id
            'id',           // Foreign key on Device for MqttTopic -> device_id
            'mqtt_topic_id',// Local key on SubscribeLog
            'device_id'     // Local key on MqttTopic
        );
    }

    // Scopes مفید
    public function scopeForTopic($query, $topicId)
    {
        return $query->where('mqtt_topic_id', $topicId);
    }

    public function scopeBetweenDates($query, $from, $to)
    {
        return $query->whereBetween('created_at', [$from, $to]);
    }

    public function scopeRecent($query, $limit = 100)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }
}
