use Intervention\Image\Facades\Image;
                'filename' => self::sanitizeFileName($file->getClientOriginalName()),
            if ($model->isImage()) {
                $file = Image::make($file)
                    ->orientate()
                    ->encode();
            }

            $model->storage()->put(
                $model->getFilepath().DIRECTORY_SEPARATOR.$model->filename,
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
