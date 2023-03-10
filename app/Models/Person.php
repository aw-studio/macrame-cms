<?php

namespace App\Models;

use App\Models\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    use HasFiles;

    protected $fillable = [
        'name',
        'description',
        'phone',
        'email',
    ];
}
