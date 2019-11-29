<?php

namespace App\Http\Requests;

use App\Coach;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCoachRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('coach_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:coaches,id',
        ];
    }
}
