<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /**
     * Get media conversions.
     *
     * @param  Request  $request
     * @param  string  $id
     * @param  string  $file
     * @return void
     */
    public function conversion(Request $request, $id, $file)
    {
        $originalPath = storage_path("app/public/{$id}/{$file}");

        // abort if original file does not exist
        if (! file_exists($originalPath)) {
            abort(404);
        }

        if(!$this->isImageFile($file)){
            return response()->file($originalPath);
        }

        $path = $originalPath;

        $h = $this->roundImageSize($request->h);
        $w = $this->roundImageSize($request->w);

        if ($h) {
            $path = ($this->addStringToFilename($path, '_h'.$h));
        }
        if ($w) {
            $path = ($this->addStringToFilename($path, '_w'.$w));
        }

        // if the requested image size does exist, return it
        if (file_exists($path)) {
            return response()->file($path);
        }

        $img = Image::make($originalPath);

        // if the image width is smaller than the requested width, don't upscale,
        // use the original image.
        if (($w != null && $w > $img->width()) || ($h != null && $h > $img->height())) {
            return response()->file($originalPath);
        }

        $img->resize($w, $h, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($path, 60);

        return response()->file($path);
    }

    public function addStringToFilename($filename, $string)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $filename = str_replace('.'.$ext, '', $filename).$string.'.'.$ext;

        return $filename;
    }

    public function roundImageSize(int|null $size = null)
    {
        if ($size == null) {
            return;
        }
        if ($size < 10) {
            return 10;
        }
        if ($size < 100) {
            return (int) ceil($size / 10) * 10;
        }
        if ($size < 1600) {
            $f = $size % 50;

            return $size - $f + ($f > 0 ? 50 : 0);
        }
        if ($size < 2800) {
            $f = $size % 100;

            return $size - $f + ($f > 0 ? 100 : 0);
        }

        return 2800;
    }

    /**
     * Checks if the given file string has an extension
     * of a supported image file format.
     * 
     * @param string $file
     * @return bool
     */
    protected function isImageFile(string $file){

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $supportedFileFormats = ['jpg', 'jpeg', 'png', 'gif'];

        if(!in_array($ext, $supportedFileFormats)){
            return false;
        }

        return true;
    }
}
