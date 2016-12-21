<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * Class Photo
 * @package App
 */
class Photo extends Model
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
        $this->attributes['slug'] = str_slug(strtolower($string)); // Replaces multiple hyphens with single one.

    }

    /**
     * @param $url
     */
    public function setUrlAttribute($url)
    {

        if(Request::hasFile('url')){
            if(Request::file('url')->isValid()){
                $url = $this->uploadImage(Request::file('url'));
            }
        }

        $url = str_replace('photos/','',$url);
        $this->attributes['url'] = $url;
    }

    /**
     * @param $url
     * @return string
     */
    public function getUrlAttribute($url)
    {
        if(!empty($url)) $url = 'photos/'.$url;

        return $url;
    }

    /**
     * @param $image
     * @param string $dir
     * @param int $width
     * @param int $height
     * @return string
     */
    private function uploadImage($image,$dir='photos',$width=1920,$height=1200){

        $filename = time().str_random(25).'.'.$image->getClientOriginalExtension();

        //manipulate the uploaded image ... resize and overwrite
        Image::make($image->getRealPath())->fit($width,$height)->save($image->getRealPath());

        Storage::disk('public')->put($dir.'/'.$filename,File::get($image));

        return $filename;
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
}
