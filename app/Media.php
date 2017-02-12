<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use App\Services\MediaStorageService;

/**
 * Class Media
 * @package App
 */
class Media extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title','slug','url','description','category_id','user_id','published_at'];

    /**
     * @var array
     */
    protected $hidden =  [
        'created_at', 'updated_at', 'category_id', 'user_id'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @var mediaStorageService
     */
    protected $mediaStore;

    /**
     * Media constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->mediaStore = new MediaStorageService;
        parent::__construct($attributes);
    }

    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * @param $string
     */
    public function setSlugAttribute($string)
    {
        $this->attributes['slug'] = str_slug(strtolower($string));

    }

    /**
     * @param $string
     */
    public function setTitleAttribute($string)
    {
        $this->attributes['title'] = $string;
        $this->slug = $string;
    }

    /**
     * @param $url
     */
    public function setUrlAttribute($url)
    {
        if(Request::hasFile('url')){
            if(Request::file('url')->isValid()){
                $url = $this->mediaStore->upload(Request::file('url'),'media',960,640); //square
            }
        }

        $this->attributes['url'] = $url;
    }

    /**
     * @param $url
     * @return string
     */
    public function getUrlAttribute($url)
    {
        if(!empty($url)) $url = '/media/'.$url;

        return $url;
    }

    public function url()
    {
        $url = '';

        if(config('app.debug')) {
            $url = 'http://placehold.it/960x640';
        }

        if(!empty($this->url)) {
            $url = '/'.config('app.media').$this->url;
        }

        return $url;
    }

    public function destroyFile()
    {
        $this->mediaStore->destroy($this->url);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * 
     */
    public function viewed()
    {

        ++$this->attributes['views'];

        $this->save();

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
