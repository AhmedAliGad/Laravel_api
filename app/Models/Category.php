<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasPhoto;

    protected $fillable = ['name', 'active'];

    /**
     * @param Builder $builder
     */
    public function scopeActive(Builder $builder)
    {
        $builder->whereActive(true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
