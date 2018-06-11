<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffAccountRequest extends FormRequest
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
           'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           /* 'password_confirmation' => 'same:password',*/
        ];
    }
    
    
		 public function messages()
			    {
			        return [
			            'login.required' => 'Поле Логин обязательно для заполнения',
			            'email.required' => 'Поле Email обязательно для заполнения',
			            'password.required' => 'Поле Пароль обязательно для заполнения',
			           /* 'password_confirmation.same' => 'Поле Повторите пароль Должно совпадать с полем пароля',*/
			            'login.string' => 'Неверный формат логина',
			            'email.string' => 'Неверный формат электронного адреса',
			            'password.string' => 'Неверный формат пароля',
			            'login.max' => 'Максимальная длина пароля 255 символов',
			            'email.max' => 'Максимальная длина электронного адреса 255 символов',
			            'password.min' => 'Минимальная длина пароля 6 символов',
			            'email.email' => 'В поле Email должен быть записан электронный адрес',
			            'email.unique' => 'Данный электронный адрес уже используется',
			       
			            
			        	];
			    }
	}

