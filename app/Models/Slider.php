<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = ['title', 'image_path'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($slider) {
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
        });
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
