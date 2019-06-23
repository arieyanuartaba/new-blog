<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoriesRequest extends FormRequest
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
           
                'name' => 'required|unique:categories|max:30',
              
            ]; 
            
    }

    public function messages(){

        return 
        [
            'name.required' => 'Input kategorinya dulu donk',
            'name.unique' => 'Kategori sudah ada pada database',
            'name.max' => 'Batas maksimal input kategori adalah 30 character'
        ];
    }
}
