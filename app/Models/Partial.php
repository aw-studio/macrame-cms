<?php

namespace App\Models;

use App\Models\Traits\HasFiles;
use App\Casts\PartialAttributesCast;
use Illuminate\Database\Eloquent\Model;

class Partial extends Model
{
    use HasFiles;

    protected $fillable = [
        'attributes',
        'name',
        'template',
    ];

    protected $casts = [
        'attributes' => PartialAttributesCast::class,
    ];

    protected $attributes = [
        'attributes' => '[]',
    ];
}
