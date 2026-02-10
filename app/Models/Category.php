<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends \TCG\Voyager\Models\Category
{
    protected $perPage = 50;

    public function files()
    {
        return $this->hasMany(File::class)
            ->orderBy('created_at', 'DESC');
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class)->orderBy('order', 'ASC');
    }

    public function fieldchilds()
    {
        return $this->belongsToMany(Fieldchild::class)->orderBy('order', 'ASC');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childes()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order', 'ASC');
    }

    public function allChildes()
    {
        return collect($this->childes)->pluck('name')->flatten()->unique();
    }

    public function scopeParentNull($query)
    {
        return $query->whereNull('parent_id')->orderBy('order', 'ASC');
    }

    public function scopeParentNotNull($query)
    {
        return $query->whereNotNull('parent_id')->orderBy('order', 'ASC');
    }
}
