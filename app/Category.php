<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\MediaStorageService;
use Illuminate\Support\Facades\Request;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name','slug','icon','description'
    ];

    /**
     * @var array
     */
    protected $hidden =  [
        'created_at', 'updated_at'
    ];

    /**
     * @var MediaStorageService
     */
    protected $mediaStore;

    /**
     * Category constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->mediaStore = new MediaStorageService;
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }

//    /**
//     * @param $count
//     */
//    public function setCountAttribute($count)
//    {
//        $this->attributes['count'] = $count;
//    }

    /**
     * @param $string
     */
    public function setNameAttribute($string)
    {
        $this->attributes['name'] = $string;
        $this->slug = $string;
    }

    /**
     * @param $string
     * @return string
     */
    public function setSlugAttribute($string)
    {
        $this->attributes['slug'] = str_slug(strtolower($string));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
