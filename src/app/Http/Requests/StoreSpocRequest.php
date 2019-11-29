<?php

namespace App\Http\Requests;

use App\Spoc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSpocRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('spoc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'spoc_first_name'             => [
                'required',
            ],
            'spoc_last_name'              => [
                'required',
            ],
            'spoc_age'                    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'spoc_date_of_birth'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'spoc_gender'                 => [
                'required',
            ],
            'spoc_email'                  => [
                'required',
                'unique:spocs',
            ],
            'spoc_phone_number'           => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'spoc_alternate_phone_number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'spoc_profile_image'          => [
                'required',
            ],
            'spoc_password'               => [
                'required',
            ],
            'spoc_linkedin_profile'       => [
                'required',
            ],
            'spoc_github_profile'         => [
                'required',
            ],
        ];
    }
}
