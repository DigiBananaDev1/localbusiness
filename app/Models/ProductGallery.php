<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{

    protected $fillable = [
        'product_id',
        'image_path',
    ];
    
    /**
     * The product that this gallery belongs to.
     */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
