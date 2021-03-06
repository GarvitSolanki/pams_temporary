<?php

namespace App\Http\Requests;

use App\Coach;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCoachRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('coach_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'coach_first_name'             => [
                'required',
            ],
            'coach_last_name'              => [
                'required',
            ],
            'coach_date_of_birth'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'coach_gender'                 => [
                'required',
            ],
            'coach_profile_image'          => [
                'required',
            ],
            'coach_email'                  => [
                'required',
            ],
            'coach_phone_number'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'coach_alternate_phone_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'coach_password'               => [
                'required',
            ],
            'coach_linkedin_profile'       => [
                'required',
            ],
            'coach_github_profile'         => [
                'required',
            ],
        ];
    }
}
