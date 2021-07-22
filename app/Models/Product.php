<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['category_id', 'brand_id', 'name', 'slug', 'code', 'quantity', 'short_content', 'long_content', 'price', 'sale_price', 'image', 'status'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function Atrr()
    {
        return $this->belongsTo(Attribute::class, 'id_product');
    }
    public function attribute()
    {
        return $this->hasMany(Attribute::class, 'id_product');
    }
}
