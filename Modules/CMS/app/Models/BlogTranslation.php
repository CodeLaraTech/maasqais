<?php

namespace Modules\CMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    use HasFactory;

    protected $table = 'cms_blog_translations'; // Your translation table

    protected $fillable = [
        'blog_id', // Foreign key to cms_blogs
        'locale',  // e.g., 'en', 'ur', 'ar'
        'title',
        'content',
    ];

    /**
     * Relation to parent blog
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
