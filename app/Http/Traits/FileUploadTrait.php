<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 2/18/2018
 * Time: 11:08 PM
 */

namespace App\Http\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


trait FileUploadTrait
{

    /**
     * @param $getPhoto | Photo File
     * @param $path | Storage Path Name
     * @param null $options | Resizing Size Width or Height
     * @return bool|string  | Store File Name Or Null
     */
    public function fileUpload($getPhoto, $path, $options = null)
    {
        $image_name = str_random(20);

        if (!is_null($options) && is_array($options)) {
            if (isset($options['name'])) $image_name = $options['name'];
        }

        $photo = Image::make($getPhoto);

        List($width, $height) = getimagesize($getPhoto);
        $size['width'] =  $width;
        $size['height'] = $height;

        $photo = $this->imageReSize($photo, $options, $size);

        $photo =  $photo->stream()->__toString();


        $ext = strtolower($getPhoto->getClientOriginalExtension());

        if(in_array($ext, ['jpg', 'png', 'jpeg', 'gif'])) {
            $image_full_name = $image_name . '.' . $ext;

            $success = Storage::disk('public')->put($path.$image_full_name, $photo);

            if(!$success) $image_full_name = '';
        } else {
            return false;
        }

        return $image_full_name;
    }

    /**
     * @param $photo
     * @param $options
     * @return mixed
     */
    private function imageReSize($photo, $options, $size)
    {
        $ratio = $size['width']/$size['height'];

        if( $ratio < 1 ){
            if( $size['width'] < 300 ) {
                $options['height'] = $size['height'];
                $options['width'] = $size['height'] * $ratio;
            }
        } elseif( $ratio == 1 ) {
            if( $size['width'] < 300 ){
                $options['width'] = $size['width'];
                $options['height'] = $size['height'];
            }
        } else {
            if( $size['width'] < 300 ) {
                $options['height'] = $size['width'] * $ratio;
                $options['width'] = $size['width'];
            }
        }

        if(is_null($options) || !is_array($options)){
            $options['width'] = 300;
            $options['height'] = 300*$ratio;
        } else {
            $options['width'] = isset($options['width']) ? $options['width'] : null;
            $options['height'] = isset($options['height']) ? $options['height'] : null;
        }

        return $photo->resize($options['width'], $options['height'], function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    /**
     * @param $fileName
     * @param $path
     * @return bool
     */
    public function fileDestroy($fileName, $path)
    {
        if (is_null($fileName)) return true;

        return Storage::disk('public')->delete($path . $fileName);
    }
}