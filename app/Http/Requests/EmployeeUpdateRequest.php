<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EmployeeUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name'=>'required',
            'phone'=>'required|unique:users,phone,' . $request->id,
            'email'=>'required|unique:users,email,' . $request->id,
            'date_of_birth'=>'required',
            'gender_id'=>'required',


        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Tên sản phẩm không được bỏ trống',
//            'name.unique' => 'Tên sản phẩm đã tồn tại',
//            'name.max' => 'Tên sản phẩm tối đã 255',
//            'name.min' => 'Tên sản phẩm tối thiểu 10',
//            'price.required' => 'Giá sản phẩm không được bỏ trống',
//            'category_id.required' => 'Danh mục sản phẩm không được bỏ trống',
//            'contents.required' => 'Nội dung sản phẩm không được bỏ trống',
        ];
    }
}
