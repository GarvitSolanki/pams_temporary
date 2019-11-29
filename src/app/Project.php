<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Project extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'projects';

    protected $appends = [
        'project_media',
        'project_dataset',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'project_name',
        'project_description',
        'project_reference_url',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getProjectMediaAttribute()
    {
        return $this->getMedia('project_media');
    }

    public function getProjectDatasetAttribute()
    {
        return $this->getMedia('project_dataset');
    }
}
