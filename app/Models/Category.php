<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'parent_id'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->where('status', 1);
    }
    public function childrent()
    {
        // NHIỀU CON
        return $this->hasMany(Category::class, 'parent_id');
    }
}
