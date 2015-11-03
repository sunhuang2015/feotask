<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MaterialRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            "code"=>"required|unique:materials",
            'c_name'=>"required",
            'e_name'=>"required",
            'brand'=>"required",
            'unit'=>"required",
            'model'=>"required",
        ];
    }
}
