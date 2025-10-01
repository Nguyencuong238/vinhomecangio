<?php

namespace App\Models;

use App\Models\Concerns\HasCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Album extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasCategories;
    protected $table = 'albums';

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this
            ->addMediaCollection('media')
            ->singleFile();

        $this
            ->addMediaCollection('album');
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

    public function scopeForCard($query)
    {
        $query->select('id', 'name');
    }

    public function showUrl()
    {
        return route('front.albums.show', ['id' => $this->id, 'name' => $this->name]);
    }
}
