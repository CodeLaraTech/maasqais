<?php

namespace Modules\CMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'cms_blogs';

    public $translatable = ['title','content','excerpt','slug'];

    protected $fillable = [
        'status',
        'allow_comments',
        'allow_pings',
        'tags',
        'featured_image',
        'title',
        'content',
        'excerpt',
        'slug',
    ];

    protected $casts = [
        'tags' => 'array',
        'allow_comments' => 'boolean',
        'allow_pings' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            BlogCategory::class,
            'cms_blog_category_pivot',
            'blog_id',
            'category_id'
        );
    }
}
