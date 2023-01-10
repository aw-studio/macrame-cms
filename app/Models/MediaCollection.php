<?php

namespace App\Models;

use App\Models\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCollection extends Model
{
    use HasFiles, HasFactory;

    protected $fillable = ['title', 'key'];

    protected $table = 'file_collections';
}
