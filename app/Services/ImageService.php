<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService
{
  public static function upload($imageFile, $folderName){
    $manager = new ImageManager(new Driver());
    // 画像を読み込む
    $image = $manager->read($imageFile->getPathname());
    // 重複しないファイル名をつくる
    $fileName = uniqid(rand().'_');
    // 拡張子を取得
    $extension = $imageFile->extension();
    // 上記のファイル名と拡張子を合体
    $fileNameToStore = $fileName. '.' .$extension;

    $resizedImage = $image->resize(1920, 1080)->encode();
    Storage::put('public/'. $folderName . '/' . $fileNameToStore, $resizedImage );


    return $fileNameToStore;
  }
}