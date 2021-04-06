<?php

namespace App\Http\Requests;

use App\Models\Nda;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNdaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nda_create');
    }

    public function rules()
    {
        return [];
    }
}
