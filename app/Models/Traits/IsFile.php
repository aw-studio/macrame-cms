<?php

namespace App\Models\Traits;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait IsFile
{
    /**
     * Create a new file model from the uploaded file.
     *
     * @param  UploadedFile  $file
     * @param  array  $attributes
     * @return static
     */
    public static function createFromUploadedFile(UploadedFile $file, array $attributes = []): static
    {
        return DB::transaction(function () use ($file, $attributes) {
            $model = static::create(array_merge([
                'filepath' => Str::uuid(),
                'filename' => self::sanitizeFileName($file->getClientOriginalName()),
                'mimetype' => $file->getClientMimeType(),
                'size' => $file->getSize(),
            ], $attributes));

            $model->setFilepath($model->getKey());

            if ($model->isImage()) {
                $file = Image::make($file)
                    ->orientate()
                    ->encode();
            }

            $model->storage()->put(
                $model->getFilepath().DIRECTORY_SEPARATOR.$model->filename,
                $file,
            );

            if ($model->isDirty('filepath')) {
                $model->save();
            }

            return $model;
        });
    }

    /**
     * Remove unwanted characters from a files name.
     * @param string $string
     * @return string
     */
    public static function sanitizeFileName(string $filename)
    {
        return Str::replace([' ', '(', ')'], ['-', '', ''], $filename);
    }

    /**
     * Check if the file is of mimetype image.
     *
     * @return bool
     */
    public function isImage()
    {
        return str_contains($this->mimetype, 'image/');
    }

    /**
     * Gets the url to the file.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->storage()->url(
            $this->getFilepath().DIRECTORY_SEPARATOR.$this->filename
        );
    }

    /**
     * Gets hhe filesystem for the model.
     *
     * @return FilesystemAdapter
     */
    public function storage(): FilesystemAdapter
    {
        return Storage::disk($this->getDiskName());
    }

    /**
     * Get the disk name of the file model.
     *
     * @return void
     */
    public function getDiskName(): string
    {
        return $this->disk;
    }

    /**
     * Set the file path of the model.
     *
     * @return string|null
     */
    public function setFilepath(string $path)
    {
        $this->filepath = $path;
    }

    /**
     * Get the file path of the model.
     *
     * @return string|null
     */
    public function getFilepath(): ?string
    {
        return $this->filepath;
    }

    /**
     * Get the human readable file size.
     *
     * @return string
     */
    public function getReadableSize()
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $this->size > 1024; $i++) {
            $this->size /= 1024;
        }

        return round($this->size, 2).' '.$units[$i];
    }
}
