<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{

    protected $fillable = ['name'];

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'business_type_vendor');
    }
}
