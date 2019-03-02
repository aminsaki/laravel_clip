<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'=>'required',
            'description'=>'required',
            'cover'=>'required|image|mimes:jpeg,png,jpg,gif',
            'priority'=>'required',
            'activation'=>'required',


        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'لطفا یه عنوان انتخاب کنید ',
            'description.required'  => 'لطفا فلید توضحیات ها رو تکمیل نمایید',
            'cover.required'  => 'لطفا یه عکس انتخاب نمایید.',
            'priority.image'=>'لطفا اولویت انتخاب نمایید.',
            'activation.required'=>"لطفا وضیعت دسته رو انتخاب نمایید",




        ];
    }
    public function attributes()
    {
        return [
            'title'=>'عنوان',
            'description'=>'توضیحات',
            'cover'=>'عکس',
            'priority'=>'اولویت',
            'activation'=>'  وضیعت دسته'


        ];
    }
}
