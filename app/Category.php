<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get the categories for the articles.
     */
    public function categories()
    {
        return $this->hasMany('App\Article');
    }
}
