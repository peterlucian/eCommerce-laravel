<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;


    protected $fillable = ['name', 'description', 'price', 'thumbnail_path', 'user_id'];

    public function imagePath(){
        return $this->hasMany(ImagePath::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilterByTitle($query, $title){
        return $query->where('name','like','%'. $title .'%');
    }
    public function scopeFilterByAuthor($query, $email){
        return $query->whereHas('user', function ($q) use ($email) {
            $q->where('email', 'like', '%' . $email . '%');
        });
        // return $query->whereHas('user', function ($q) use ($email) {
        //     $q->where('email', 'like', '%' . $email . '%');
        // })->with('user');
    }
}
