<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePath extends Model
{
    /** @use HasFactory<\Database\Factories\ImagePathFactory> */
    use HasFactory;
    protected $fillable = ['image_resource_path', 'item_id'];

}
