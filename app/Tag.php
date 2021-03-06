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
     * @var array
     */
    protected $hidden =  [
        'id','pivot', 'created_at', 'updated_at'
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
    public function media()
    {
        return $this->belongsToMany(Media::class);
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
        $this->slug = $name;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
