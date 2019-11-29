<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Student extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'students';

    protected $hidden = [
        'student_password',
    ];

    protected $appends = [
        'student_profile_image',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'student_date_of_birth',
    ];

    const STUDENT_GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    protected $fillable = [
        'deleted_at',
        'updated_at',
        'created_at',
        'student_age',
        'student_year',
        'student_email',
        'student_gender',
        'student_branch',
        'student_address',
        'student_semester',
        'student_password',
        'student_last_name',
        'student_first_name',
        'student_phone_number',
        'student_aadhar_number',
        'student_date_of_birth',
        'student_github_profile',
        'student_alternate_email',
        'student_linkedin_profile',
        'student_alternate_phone_number',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getStudentDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStudentDateOfBirthAttribute($value)
    {
        $this->attributes['student_date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStudentProfileImageAttribute()
    {
        $file = $this->getMedia('student_profile_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
}
