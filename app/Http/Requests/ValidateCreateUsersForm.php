<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreateUsersForm extends FormRequest
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

    public function rules() {
        return [
            'username' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages() {
        return [
            'username.required' => 'El :atribute no puede estar vacío',
            'name.required' => 'El :atribute no puede estar vacío',
            'surname.required' => 'El :atribute no puede estar vacío',
            'password.required' => 'La :atribute no puede estar vacía',
            'password.min' => 'La :atribute no puede tener menos de 6 caracteres',
            'confirmPassword.required' => 'El campo no puede estar vacío',
            'confirmPassword.same' => 'Las contraseñas no coinciden',
            'email.required' => 'El :atribute no puede estar vacío',
            'email.email' => ':atribute no válido',
            'email.unique' => 'Ya existe un usuario con ese email',
        ];
    }

    public function attributes() {
        return [
            
        ];
    }
}
