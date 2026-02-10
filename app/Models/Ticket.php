<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'subject', 'description', 'status',
    ];

    // Relations
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
