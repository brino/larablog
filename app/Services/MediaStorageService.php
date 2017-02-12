<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 2/8/17
 * Time: 6:35 AM
 */

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use League\Flysystem\FileNotFoundException;

class MediaStorageService
{
    /**
     * @param $image
     * @param string $dir
     * @param int $width
     * @param int $height
     * @return string
     */
    public function upload($image,$dir='banners',$width=1024,$height=250)
    {
        $filename = time().str_random(25).'.'.$image->getClientOriginalExtension();

        //manipulate the uploaded image ... resize and overwrite
        Image::make($image->getRealPath())->fit($width,$height)->save($image->getRealPath());

        //move the image to storage
        Storage::disk('public')->put($this->filePath($filename,$dir),File::get($image));

        return $filename;
    }

    /**
     * @param $file
     * @return mixed
     * @throws FileNotFoundException
     */
    public function destroy($file)
    {
        if(Storage::disk('public')->exists($file)) {
            return Storage::disk('public')->delete($file);
        }

        throw new FileNotFoundException('Image not found');
    }

    /**
     * @param $filename
     * @param $dir
     * @return string
     */
    protected function filePath($filename,$dir)
    {
        return $dir.'/'.$filename;
    }
}