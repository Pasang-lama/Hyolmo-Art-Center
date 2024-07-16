<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use App\Models\Product;

class Blogs extends Model
{
    use HasFactory;

    use Sluggable;

    protected $table = "blogs";

    protected $fillable = [
        "blog_title",
        "blog_slug",
        "blog_description",
        "blog_image",
        "blog_status",
        "blog_meta_title",
        "blog_meta_description",
    ];

    public function sluggable(): array
    {
        return [
            'blog_slug' => [
                'source' => 'blog_title',
                'onUpdate' => true
            ]
        ];
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
