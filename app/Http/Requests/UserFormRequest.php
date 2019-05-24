<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'username' => 'required|string|max:100',
            'info' => 'required|string|max:200',
            'youtube' => 'nullable|url|max:150',
            'linkedin' => 'nullable|url|max:150',
            'github' => 'nullable|url|max:150',
            'photo' => 'nullable|image|dimensions:min_height=400,min_width=400,max_height=600,max_width=600,ratio=1/1',
            'password' => 'nullable|string|max:100'
        ];
    }

    public function attributes () {
        return [
            'name' => 'Nombres',
            'email' => 'Email',
            'username' => 'Nombre de usuario',
            'info' => 'Info',
            'photo' => 'Imagen de perfil',
            'password' => 'Contraseña'
        ];
    }
}
