<?php

namespace Modules\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CMS\Database\Factories\PageFactory;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
     protected $fillable = [
        'title', 'slug', 'content', 'status',
        'template_type', 'template_name', 'parent_id', 'published_at',
        'meta_description', 'meta_keywords', 'canonical_url',
        'og_title', 'og_description', 'og_url', 'og_type', 'og_site_name', 'og_locale',
        'published_time', 'modified_time',
        'twitter_card', 'twitter_title', 'twitter_description',
    ];

    public $translatable = ['title','content'];

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function getFullSlugAttribute()
    {
        $segments = [$this->slug];
        $parent = $this->parent;

        while ($parent) {
            array_unshift($segments, $parent->slug);
            $parent = $parent->parent;
        }

        return implode('/', $segments);
    }

}
