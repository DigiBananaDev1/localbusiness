<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'vendor_id', 'service_id', 'rating', 'review'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}

