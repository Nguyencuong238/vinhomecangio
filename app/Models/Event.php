<?php

namespace App\Models;

use App\Models\Concerns\HasCategories;
use App\Models\Concerns\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use HasSLug;
    use HasCategories;
    use InteractsWithMedia;

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'meta'        => 'array',
        'feature'     => 'array',
        'status'      => 'boolean',
    ];

    /**
     * Scope a query to only include published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include drafts (unpublished posts).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 0);
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this
        ->addMediaCollection('media')
        ->singleFile();

        $this
            ->addMediaCollection('eventMulti');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('show')
            ->fit(Manipulations::FIT_CROP, 310, 300)
            ->format('webp')
            ->nonQueued();

        $this
            ->addMediaConversion('show-bf')
            ->fit(Manipulations::FIT_CROP, 315, 200)
            ->format('webp')
            ->nonQueued();
    }

    public function showUrl()
    {
        return route('front.events.show', ['slug' => $this->slug]);
    }

    public function scopeForCard($query)
    {
        $query->select('id', 'title', 'slug', 'created_at');
    }
}
