<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        'slug',
        'parent_id'
    ];


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }

    // // public function products()
    // // {
    // //     return $this->hasMany(Product::class);
    // // }
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'category_product');
    // }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }




    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = self::generateUniqueSlug($category->name);
            }
        });
        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = self::generateUniqueSlug($category->name);
            }
        });
    }

    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = self::where('slug', 'LIKE', "{$slug}%")->count();
        return $count > 0 ? "{$slug}-{$count}" : $slug;
    }
}
