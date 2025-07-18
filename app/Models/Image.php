<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'image_library';

    protected $fillable = [
        'image_name',
        'image_path',
    ];
}
