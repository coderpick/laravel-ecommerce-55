<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = ['name', 'slug', 'logo', 'status', 'created_by', 'updated_by'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($brand) {
            $brand->created_by = auth()->user()->id;
        });
        static::updating(function ($brand) {
            $brand->updated_by = auth()->user()->id;
        });
    }
}
