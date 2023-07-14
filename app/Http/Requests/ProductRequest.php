<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Session;
class ProductRequest extends FormRequest
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
            'Ma_sp'=>[
                        Rule::unique('product')->ignore($this->route('product'))->where(function ($query) {
                            return $query->where('id_company_child',Session::get('id_company_child'));
                        }),
                     ]
        ];
    }
    public function messages(){
        return [
             'Ma_sp.unique'=>'Mã sản phẩm đã tồn tại',
        ];
    }
    
}
