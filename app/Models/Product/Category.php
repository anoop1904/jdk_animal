<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\CategoryImage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'banner_image',
        'parent_id',
    ];

    public function category_images()
    {
        return $this->hasMany(CategoryImage::class);
    }


}
