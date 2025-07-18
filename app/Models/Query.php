<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Query extends Model
{
    protected $table = "queries";

    protected $fillable = [
        'user_id',
        'slug',
        'query',
        'vendor_id',
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    // public function user(){
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if (empty($query->slug)) {
                $query->slug = self::generateUniqueSlug($query->user_name);
            }
        });
        static::updating(function ($query) {
            if ($query->isDirty('user_name')) {
                $query->slug = self::generateUniqueSlug($query->user_name);
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
