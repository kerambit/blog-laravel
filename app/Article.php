<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];

    /**
     * Get the category for the article.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
