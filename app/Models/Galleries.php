<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/galleriess/' . $value),
        );
        // use Illuminate\Database\Eloquent\Casts\Attribute;
    }
}
