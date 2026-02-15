<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MqttTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'topic', 'direction',
    ];

    // Relations
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
