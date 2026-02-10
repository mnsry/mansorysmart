<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mqtt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ip_static', 'vnc_ip', 'vnc_password', 'mqtt_server', 'mqtt_port', 'mqtt_account', 'mqtt_password',
    ];

    // Relations
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
