<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'vendor_id',
        'slug',
        'name',
        'description',
        'price',
        'mrp',
        'image',
        'category_id',
        'search_tags',
        'bunch',
        'status',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if (empty($query->slug)) {
                $query->slug = self::generateUniqueSlug($query->name);
            }
        });
        static::updating(function ($query) {
            if ($query->isDirty('name')) {
                $query->slug = self::generateUniqueSlug($query->name);
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
