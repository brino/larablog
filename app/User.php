<?php

namespace App;

use App\Services\MediaStorageService;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','contributor','super','bio','api_token','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'email', 'super', 'contributor', 'created_at', 'updated_at'
    ];

    /**
     * @var MediaStorageService
     */
    protected $imageStore;

    /**
     * User constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->imageStore = new MediaStorageService;
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(){
        return $this->hasMany(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media(){
        return $this->hasMany(Media::class);
    }

    /**
     * @param $avatar
     * @return string
     */
    public function getAvatarAttribute($avatar)
    {
        if(!empty($avatar)) $avatar= '/avatars/'.$avatar;
        return $avatar;
    }

    public function avatarUrl()
    {
        $url = '';

        if(config('app.debug')) {
            $url = 'http://placehold.it/128';
        }

        if(!empty($this->avatar)) {
            $url = '/'.config('app.media').$this->avatar;
        }

        return $url;
    }

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @param $avatar
     */
    public function setAvatarAttribute($avatar)
    {
        if(Request::hasFile('avatar')){
            if(Request::file('avatar')->isValid()){
                $avatar = $this->imageStore->upload(Request::file('avatar'),'avatars',250,250);
            }
        }

        $this->attributes['avatar'] = $avatar;
    }

    /**
     *
     */
    public function destroyAvatar()
    {
        $this->imageStore->destroy($this->avatar);
    }
    
}
