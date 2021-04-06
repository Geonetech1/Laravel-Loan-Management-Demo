<?php

namespace App\Http\Requests;

use App\Models\Nda;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNdaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nda_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ndas,id',
        ];
    }
}
