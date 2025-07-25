<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $table = "admins";

    protected $fillable = [
        'role',
        'display_role',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if (empty($query->role)) {
                $query->role = self::generateUniqueSlug($query->display_role);
            }
        });
        static::updating(function ($query) {
             if(empty($query->role) || ($query->isDirty('display_role'))) {
                $query->role = self::generateUniqueSlug($query->display_role);
            }
        });
    }

    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = self::where('role', 'LIKE', "{$slug}%")->count();
        return $count > 0 ? "{$slug}-{$count}" : $slug;
    }

}
