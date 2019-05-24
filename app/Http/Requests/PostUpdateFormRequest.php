<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateFormRequest extends FormRequest
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
            'title' => 'required|max:50|unique:posts,title,'. $this->route('post')->id,
            'excerpt' => 'required|max:200|string',
            'body' => 'required|max:10000',
            'category_post_id' => 'required|exists:category_posts,id',
            'image' => 'nullable|image|dimensions:min_width=200,min_height=200,max_width=500,max_height=500,ratio=1/1'
        ];
    }

    public function attributes () {
        return [
            'title' => 'Título',
            'excerpt' => 'Extracto',
            'body' => 'Contenido',
            'category_post_id' => 'Categoría',
            'image' => 'Imagen'
        ];
    }
}
