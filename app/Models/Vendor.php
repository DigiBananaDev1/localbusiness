<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Vendor extends Authenticatable
{
    protected $table = 'vendors';
    protected $fillable = [
        'slug',
        'email',
        'otp',
        'otp_verified',
        'otp_expires_at',
        'business_name',
        'mobile',
        'whatsapp_no',
        'address',
        'city',
        'state',
        'pin_code',
        'categories',
        'type',
        'search_terms',
        'name',
        'password',
        'status',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories', 'id');
    }

    public function businessTypes()
    {
        return $this->belongsToMany(BusinessType::class, 'business_type_vendor');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vendor) {
            if (empty($vendor->slug)) {
                $vendor->slug = self::generateUniqueSlug($vendor->business_name . " " . $vendor->id);
            }
        });

        static::updating(function ($vendor) {
            if ($vendor->isDirty('business_name')) {
                $vendor->slug = self::generateUniqueSlug($vendor->business_name . " " . $vendor->id);
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
