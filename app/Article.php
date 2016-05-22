<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * Class Article
 * @package App
 */
class Article extends Model
{
    use ElasticquentTrait;
    /**
     * @var array
     */
    protected $fillable = [
        'title','body','slug','summary','tag_list','banner','thumbnail','script','category_id','user_id','published_at'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @var array
     */
    protected $mappingProperties =
        [
            'title' => [
                'type' => 'string'
            ],
            'summary' => [
                'type' => 'string'
            ],
            'body' => [
                'type' => 'string'
            ],
            'user_id' => [
                'type' => 'long'
            ],
            'category_id' => [
                'type' => 'long'
            ],
            'userName' => [
                'type' => 'string'
            ],
            'categoryName' => [
                'type' => 'string'
            ],
            'banner' => [
                'type' => 'string'
            ],
            'thumbnail' => [
                'type' => 'string'
            ],
            'published_at' => [
                'type' => 'date'
            ],
            'created_at' => [
                'type' => 'date'
            ],
            'updated_at' => [
                'type' => 'date'
            ]
        ];

    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * @return array
     */
    function getIndexDocumentData()
    {
        $fields = array(
            'id'      => $this->id,
            'title'   => $this->title,
            'summary'  => strip_tags($this->summary),
            'body' => strip_tags($this->body),
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'userName' => $this->user->name,
            'slug' => $this->attributes['slug'],
            'tag_list' => $this->tag_list,
            'tag_string' => $this->tags->implode('name',' '),
            'categoryName' => $this->category->name,
            'banner' => str_replace('banners/','',$this->banner),
            'thumbnail' => str_replace('thumbnails/','',$this->thumbnail),
            'published_at' => $this->published_at->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String()
        );

        return $fields;
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
     * @return string
     */
    public function setSlugAttribute($string)
    {

        $this->attributes['slug'] = str_slug(strtolower($string));
        
    }

    /**
     * @param $published_at
     * @return static
     */
    public function getPublishedAtAttribute($published_at){

        if(strstr($published_at,'T')){
            return Carbon::createFromFormat('Y-m-d\TH:i:sO',$published_at);
        }

        return Carbon::parse($published_at);
    }

    /**
     * @param $banner
     * @return string
     */
    public function getBannerAttribute($banner)
    {
        if(!empty($banner)) $banner= 'banners/'.$banner;
        return $banner;
    }

    /**
     * @param $thumbnail
     * @return string
     */
    public function getThumbnailAttribute($thumbnail)
    {
        if(!empty($thumbnail)) $thumbnail = 'thumbnails/'.$thumbnail;
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

}
