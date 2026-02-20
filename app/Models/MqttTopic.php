<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MqttTopic extends Model
{
    use HasFactory;

    protected $table = 'mqtt_topics';

    protected $fillable = [
        'device_id', 'order', 'name', 'topic', 'direction',
        'value_type', 'signal_type', 'unit', 'qos', 'retain',
        'min_value', 'max_value', 'log_enabled', 'is_active', 'description',
    ];

    // Type casting
    protected $casts = [
        'direction' => 'boolean',    // 0: publish, 1: subscribe
        'value_type' => 'boolean',   // 0: bit, 1: word
        'qos' => 'integer',
        'retain' => 'boolean',
        'log_enabled' => 'boolean',
        'is_active' => 'boolean',
        'min_value' => 'decimal:4',
        'max_value' => 'decimal:4',
    ];

    // Relationships
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function publishLogs()
    {
        return $this->hasMany(PublishLog::class, 'mqtt_topic_id');
    }

    public function subscribeLogs()
    {
        return $this->hasMany(SubscribeLog::class, 'mqtt_topic_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLogEnabled($query)
    {
        return $query->where('log_enabled', true);
    }

    public function scopePublish($query)
    {
        return $query->where('direction', 0);
    }

    public function scopeSubscribe($query)
    {
        return $query->where('direction', 1);
    }

    // Accessors
    public function getFullTopicAttribute()
    {
        return $this->device->id . '|' . $this->topic;
    }

    // Helper Methods
    public function isDigital(): bool
    {
        return $this->signal_type === 'DigitalInput' ||
            $this->signal_type === 'DigitalOutput' ||
            $this->signal_type === 'DigitalMemory';
    }

    public function isAnalog(): bool
    {
        return $this->signal_type === 'AnalogInput' ||
            $this->signal_type === 'AnalogOutput' ||
            $this->signal_type === 'Temp' ||
            $this->signal_type === 'TempSet';
    }

    public function valueWithinRange($value): bool
    {
        if (!is_numeric($value)) return false;
        if ($this->min_value !== null && $value < $this->min_value) return false;
        if ($this->max_value !== null && $value > $this->max_value) return false;
        return true;
    }
}
