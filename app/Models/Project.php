<?php

namespace App\Models;

use App\Models\Concerns\HasCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use App\Models\Concerns\HasTags;
use Spatie\Sluggable\SlugOptions;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;
    use HasTags;
    use HasCategories;

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'features' => 'array'
    ];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'project_post', 'project_id', 'post_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this
        ->addMediaCollection('media')
        ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('show')
            ->fit(Manipulations::FIT_CROP, 500, 500)
            ->format('webp')
            ->nonQueued();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function showUrl()
    {
        return route('front.projects.show', ['slug' => $this->slug]);
    }

    public function votes()
    {
        return $this->hasMany(ProjectVote::class, 'project_id');
    }

    public function scopeForCard($query)
    {
        $query->select('id', 'name', 'slug');
    }
}
