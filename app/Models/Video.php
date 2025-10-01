<?php

namespace App\Models;

use App\Models\Concerns\HasCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Video extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasCategories;

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
            ->fit(Manipulations::FIT_CROP, 300, 200)
            ->nonQueued();
    }

    public function showUrl()
    {
        return route('front.videos.show', $this->id);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
