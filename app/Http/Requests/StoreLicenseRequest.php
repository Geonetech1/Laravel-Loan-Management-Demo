<?php

namespace App\Http\Requests;

use App\Models\License;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLicenseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('license_create');
    }

    public function rules()
    {
        return [];
    }
}
