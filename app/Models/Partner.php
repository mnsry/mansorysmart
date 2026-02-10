<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'slug', 'company_name', 'company_address', 'image', 'instagram', 'telegram', 'other_social', 'notes',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
}
