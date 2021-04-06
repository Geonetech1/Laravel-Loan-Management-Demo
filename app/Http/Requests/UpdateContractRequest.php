<?php

namespace App\Http\Requests;

use App\Models\Contract;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContractRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contract_edit');
    }

    public function rules()
    {
        return [
            'expires_on'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'start_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'department'  => [
                'string',
                'nullable',
            ],
            'entity'      => [
                'string',
                'nullable',
            ],
        ];
    }
}
