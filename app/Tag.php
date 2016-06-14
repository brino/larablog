<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name','slug'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photo()
    {
        return $this->belongsToMany(Photo::class);
    }

    /**
     * @param $string
     */
    public function setSlugAttribute($string)
    {

        $this->attributes['slug'] = str_slug(strtolower($string));

    }

    /**
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }
}
