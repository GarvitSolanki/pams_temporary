<?php
/*
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Spoc extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'spocs';

    protected $hidden = [
        'spoc_password',
    ];

    protected $appends = [
        'spoc_profile_image',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'spoc_date_of_birth',
    ];

    const SPOC_GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    protected $fillable = [
        'spoc_age',
        'spoc_email',
        'created_at',
        'updated_at',
        'deleted_at',
        'spoc_gender',
        'spoc_password',
        'spoc_last_name',
        'spoc_first_name',
        'spoc_phone_number',
        'spoc_date_of_birth',
        'spoc_github_profile',
        'spoc_alternate_email',
        'spoc_linkedin_profile',
        'spoc_alternate_phone_number',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getSpocDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSpocDateOfBirthAttribute($value)
    {
        $this->attributes['spoc_date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSpocProfileImageAttribute()
    {
        $file = $this->getMedia('spoc_profile_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}*/


namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Spoc extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    public $table = 'spocs';
    protected $hidden = [
        'spoc_password',
    ];
    protected $appends = [
        'spoc_profile_image',
    ];
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'spoc_date_of_birth',
    ];
    const SPOC_GENDER_RADIO = [
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other',
    ];
    protected $fillable = [
        'id',
        'spoc_age',
        'spoc_email',
        'created_at',
        'updated_at',
        'deleted_at',
        'spoc_gender',
        'spoc_password',
        'spoc_last_name',
        'spoc_first_name',
        'spoc_phone_number',
        'spoc_date_of_birth',
        'spoc_github_profile',
        'spoc_alternate_email',
        'spoc_linkedin_profile',
        'spoc_alternate_phone_number',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getSpocDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSpocDateOfBirthAttribute($value)
    {
        $this->attributes['spoc_date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSpocProfileImageAttribute()
    {
        $file = $this->getMedia('spoc_profile_image')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }
        return $file;
    }
}
