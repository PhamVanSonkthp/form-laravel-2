<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

trait StorageImageTrait
{

    public static function saveToS3($request, $fieldName){
        $file = $request->$fieldName;
//        $path = $file->store('public/images');

        // save to public and prefix link cloudfront here

        Storage::disk('s3')->put('public/images', $file);
    }

    public static function storageTraitUpload($request, $fieldName, $folderName, $id)
    {

        if ($request->hasFile($fieldName) || is_file($fieldName)) {

            try {
                $idSenter = 0;

                if (auth()->check()) {
                    $idSenter = auth()->id();
                }

                $folderName = $folderName . "/";

                $folderName = "/assets/" . $folderName . $idSenter . "/" . $id;
                if (is_file($fieldName)){
                    $file = $fieldName;
                }else{
                    $file = $request->$fieldName;
                }

                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $dataUpluadTrait = [
                    'file_name' => $fileNameOrigin,
                    'file_path' => $folderName . '/original/' . $fileNameHash,
                ];

                // for save thumnail image
                $ImageUpload = Image::make($file->getRealpath())->orientate();

//                self::saveToS3($request, $fieldName);

                if (!file_exists(storage_path() . $folderName . '/original/')) {
                    mkdir(storage_path() . $folderName . '/original/', config('_images_cut_sizes.permission'), true);
                }
                $ImageUpload->save(storage_path() . $folderName . '/original/' . $fileNameHash);


//                $folder = $folderName . '/original';
//                $path= Storage::disk('my_public')->put($folder, $file);
//                $dataUpluadTrait['file_path'] = "/". $path;

//                if (!file_exists(storage_path() . $folderName . '/original/optimize/')) {
//                    mkdir(storage_path() . $folderName . '/original/optimize/', config('_images_cut_sizes.permission'), true);
//                }
//                $ImageUpload->save(storage_path() . $folderName . '/original/optimize/' . $fileNameHash, config('_images_cut_sizes.compress_image_quality'));

                foreach (config('_images_cut_sizes.sizes') as $size) {

                    $width = (int)explode("x", $size)[0];
                    $height = (int)explode("x", $size)[1];

                    $ImageUpload = Image::make($file->getRealpath())->orientate();
                    $ImageUpload->fit($width, $height);
                    if (!file_exists(storage_path() . $folderName . '/' . $width . 'x' . $height . '/')) {
                        mkdir(storage_path() . $folderName . '/' . $width . 'x' . $height . '/', config('_images_cut_sizes.permission'), true);

                    }
//                    if (!file_exists(storage_path() . $folderName . '/' . $width . 'x' . $height . '/optimize/')) {
//                        mkdir(storage_path() . $folderName . '/' . $width . 'x' . $height . '/optimize/', config('_images_cut_sizes.permission'), true);
//                    }
                    $ImageUpload->save(storage_path() . $folderName . '/' . $width . 'x' . $height . '/' . $fileNameHash);

//                    $ImageUpload->save(storage_path() . $folderName . '/' . $width . 'x' . $height . '/optimize/' . $fileNameHash, config('_images_cut_sizes.compress_image_quality'));
                }

                return $dataUpluadTrait;
            } catch (\Exception $exception) {
                Log::error($exception->getMessage());
                return $exception->getMessage();
            }
        }

        return null;
    }

    public static function storageTraitUploadFile($request, $fieldName, $folderName, $id)
    {

        if ($request->hasFile($fieldName) || is_file($fieldName)) {
            try {
                $idSenter = 0;

                if (auth()->check()) {
                    $idSenter = auth()->id();
                }


                $folderName = "/assets/" . $folderName;
                if (is_file($fieldName)){
                    $file = $fieldName;
                }else{
                    $file = $request->$fieldName;
                }

                $fileNameOrigin = $file->getClientOriginalName();
                $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $dataUpluadTrait = [
                    'file_name' => $fileNameOrigin,
                    'file_path' => $folderName . $fileNameHash,
                ];

                $path = $file->store($folderName,  ['disk' => 'my_files']);
                $dataUpluadTrait['file_path'] = "/myfiles/" . $path;

                return $dataUpluadTrait;
            } catch (\Exception $exception) {
                Log::error($exception->getMessage());
                return $exception->getMessage();
            }
        }

        return null;
    }

}
