<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
     * @param $string
     * @return string
     */
    public function setSlugAttribute($string)
    {

        $this->attributes['slug'] = str_slug(strtolower($string));
        
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['published'] = $this->published_at->isPast();

        return $array;
    }

    /**
     * @param $banner
     * @return string
     */
    public function getBannerAttribute($banner)
    {
        if(!empty($banner) && !str_contains($banner,'placehold.it')) $banner= 'banners/'.$banner;
        return $banner;
    }

    /**
     * @param $thumbnail
     * @return string
     */
    public function getThumbnailAttribute($thumbnail)
    {
        if(!empty($thumbnail) && !str_contains($thumbnail,'placehold.it')) $thumbnail = 'thumbnails/'.$thumbnail;
        return $thumbnail;
    }

    /**
     * @param $banner
     */
    public function setBannerAttribute($banner)
    {

        if(Request::hasFile('banner')){
            if(Request::file('banner')->isValid()){
                $banner = $this->uploadImage(Request::file('banner'));
            }
        }

        $banner = str_replace('banners/','',$banner);

        $this->attributes['banner'] = $banner;
    }

    /**
     * @param $thumbnail
     */
    public function setThumbnailAttribute($thumbnail)
    {

        if(Request::hasFile('thumbnail')){
            if(Request::file('thumbnail')->isValid()){
                $thumbnail = $this->uploadImage(Request::file('thumbnail'),'thumbnails',250,150);
            }
        }
        $thumbnail = str_replace('thumbnails/','',$thumbnail);
        $this->attributes['thumbnail'] = $thumbnail;
    }

    public function setCategoryIdAttribute($id)
    {
        $this->attributes['category_id'] = (Int) $id;
    }

    /**
     * @param $image
     * @param string $dir
     * @param int $width
     * @param int $height
     * @return string
     */
    private function uploadImage($image,$dir='banners',$width=1024,$height=250){
        
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

}
