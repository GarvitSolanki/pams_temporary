<?php

namespace App\Http\Requests;

use App\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'student_first_name'             => [
                'required',
            ],
            'student_last_name'              => [
                'required',
            ],
            'student_age'                    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'student_date_of_birth'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'student_gender'                 => [
                'required',
            ],
            'student_profile_image'          => [
                'required',
            ],
            'student_branch'                 => [
                'required',
            ],
            'student_year'                   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'student_semester'               => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'student_email'                  => [
                'required',
                'unique:students',
            ],
            'student_phone_number'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'student_alternate_phone_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'student_address'                => [
                'required',
            ],
            'student_password'               => [
                'required',
            ],
            'student_github_profile'         => [
                'required',
            ],
        ];
    }
}
