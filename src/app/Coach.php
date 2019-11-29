<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Coach extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'coaches';

    protected $hidden = [
        'coach_password',
    ];

    protected $appends = [
        'coach_profile_image',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'coach_date_of_birth',
    ];

    const COACH_GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    protected $fillable = [
        'updated_at',
        'created_at',
        'deleted_at',
        'coach_email',
        'coach_gender',
        'coach_password',
        'coach_last_name',
        'coach_first_name',
        'coach_phone_number',
        'coach_date_of_birth',
        'coach_github_profile',
        'coach_alternate_email',
        'coach_linkedin_profile',
        'coach_alternate_phone_number',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getCoachDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCoachDateOfBirthAttribute($value)
    {
        $this->attributes['coach_date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCoachProfileImageAttribute()
    {
        $file = $this->getMedia('coach_profile_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
