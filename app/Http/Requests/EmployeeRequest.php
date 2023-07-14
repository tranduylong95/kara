<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Session;
class EmployeeRequest extends FormRequest
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
            'account'=>[
                        Rule::unique('employee')->ignore($this->id)->where(function ($query) {
                            return $query->where('id_company_child',Session::get('id_company_child'));
                        }),
                     ]
        ];
    }
     public function messages(){
        return [
             'account.unique'=>'Tên tài khoản đã tồn tại',
        ];
    }
}
