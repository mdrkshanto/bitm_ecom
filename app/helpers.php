<?php
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

function storeImage($image, $directory, $width = false, $height = false)
{
    if (!is_dir($directory)){
        mkdir($directory,0755, true);
    }
    $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    $imageUrl = $directory.$imageName;
    Image::make($image)->resize($width,$height)->save($imageUrl);
    return $imageUrl;
}

function genSulg($name, $count = false, $id = false)
{
    if ($count > 1) {
        if ($id) {
            return Str::slug($name . ' ' . $id);
        }
        return Str::slug($name . ' ' . hexdec(uniqid()));
    }
    return Str::slug($name);
}




