<?php

namespace App;

use App\Services\MediaStorageService;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Laravel\Scout\Searchable;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{
    use Searchable;

    /**
     * @var array
     */
    protected $with = ['user','category','tags'];

    /**
     * @var array
     */
    protected $fillable = [
        'title','body','slug','summary','tag_list','banner','thumbnail','script','category_id','user_id','published_at'
    ];

    /**
     * @var array
     */
    protected $hidden =  [
        'user_id', 'category_id', 'created_at', 'updated_at'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @var MediaStorageService
     */
    protected $mediaStore;

    /**
     * Article constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->mediaStore = new MediaStorageService;
        parent::__construct($attributes);
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

//        $array['suggest'] = explode(' ',$array['title'].' '.strip_tags($array['summary']));
//        $array['title'] = $array['title'];
        $array['published'] = $this->published_at->isPast();

        return $array;
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
    public function scopePopular($query)
    {
        $query->where('views','>',0);
    }

    /**
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
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
     * @param $string
     * @return string
     */
    public function setSlugAttribute($string)
    {
        $this->attributes['slug'] = str_slug(strtolower($string));
    }

    /**
     * @param $banner
     * @return string
     */
    public function getBannerAttribute($banner)
    {
        if(!empty($banner)) $banner= '/banners/'.$banner;
        return $banner;
    }

    /**
     * @return string
     */
    public function bannerUrl()
    {
        $url = '';

        if(config('app.debug')) {
            $url = 'http://placehold.it/1024x250';
        }

        if(!empty($this->banner)) {
            $url = '/'.config('app.media').$this->banner;
        }

        return $url;
    }

    /**
     * @param $banner
     */
    public function setBannerAttribute($banner)
    {
        if(Request::hasFile('banner')){
            if(Request::file('banner')->isValid()){
                $banner = $this->mediaStore->upload(Request::file('banner'),'banners'); //square
            }
        }

        $this->attributes['banner'] = $banner;
    }

    /**
     *
     */
    public function destroyBanner()
    {
        $this->mediaStore->destroy($this->banner,'banners');
    }

    /**
     * @param $thumbnail
     * @return string
     */
    public function getThumbnailAttribute($thumbnail)
    {
        if(!empty($thumbnail)) $thumbnail = '/thumbnails/'.$thumbnail;
        return $thumbnail;
    }

    public function thumbnailUrl()
    {
        $url = '';

        if(config('app.debug')) {
            $url = 'http://placehold.it/128';
        }

        if(!empty($this->thumbnail)) {
            $url = '/'.config('app.media').$this->thumbnail;
        }

        return $url;
    }

    /**
     * @param $thumbnail
     */
    public function setThumbnailAttribute($thumbnail)
    {
        if(Request::hasFile('thumbnail')){
            if(Request::file('thumbnail')->isValid()){
                $thumbnail = $this->mediaStore->upload(Request::file('thumbnail'),'thumbnails',256,256); //square
            }
        }

        $this->attributes['thumbnail'] = $thumbnail;
    }

    /**
     *
     */
    public function destroyThumbnail()
    {
        $this->mediaStore->destroy($this->thumbnail);
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
     * @param Tag $tag
     * @return Model
     */
    public function addTag(Tag $tag)
    {
        return $this->tags()->save($tag);
    }

    /**
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->pluck('id')->all();
    }

    /**
     * @param $tag_list
     */
    public function setTagListAttribute($tag_list){
        $this->tags()->sync($tag_list);
    }

    /**
     * 
     */
    public function viewed()
    {
        $this->increment('views');

        $this->save();

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }



}
