<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    use HasSlug;

    protected $connection = 'mongodb';

    protected $guarded = ['id', 'slug', 'created_at', 'updated_at'];

    protected $fillable = ['title', 'subtitle', 'image_url', 'body'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
