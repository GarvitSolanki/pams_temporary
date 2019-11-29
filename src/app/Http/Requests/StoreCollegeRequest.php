<?php

namespace App\Http\Requests;

use App\College;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCollegeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('college_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'college_name'         => [
                'required',
            ],
            'college_website'      => [
                'required',
            ],
            'college_address'      => [
                'required',
            ],
            'college_phone_number' => [
                'required',
            ],
            'college_email'        => [
                'required',
            ],
        ];
    }
}
