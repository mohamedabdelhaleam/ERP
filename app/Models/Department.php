<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
    public function jobTitles()
    {
        return $this->hasMany(JobTitle::class);
    }   
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
