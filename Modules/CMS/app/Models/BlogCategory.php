<?php

namespace Modules\CMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'cms_blog_categories';

    protected $fillable = ['name', 'slug', 'parent_id'];

    // Auto-generate slug before create
    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Parent category
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    // Child categories
    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }

    // Blogs relationship
    public function blogs()
    {
        return $this->belongsToMany(
            Blog::class,
            'cms_blog_category_pivot',
            'category_id',
            'blog_id'
        );
    }

    // Blog count accessor
    public function getBlogCountAttribute()
    {
        return $this->blogs()->count();
    }
}
