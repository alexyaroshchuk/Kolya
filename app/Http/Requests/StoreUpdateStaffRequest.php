<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStaffRequest extends FormRequest
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
	                'firstname' => 'required|alpha',
	                'lastname' => 'required|alpha',
	                'sex' => 'required|in:f,m',
	                'databirth' => 'required|date',
	                'phonenumber' => 'required',
	                'salary' => 'required',
		            'city' => 'required|alpha',
		            'streat' => 'required|alpha',
		            'housenumber' => 'required',
	        		];
	    }
	    
	      public function messages()
	    {
	        return [
	            'city.required' => 'Необходимо указать город',
	            'streat.required' => 'Необходимо указать улицу',
	            'firstname.required' => 'Необходимо указать имя',
	            'lastname.required' => 'Необходимо указать фамилию',
	            'sex.required' => 'Необходимо указать пол',
	            'databirth.required' => 'Необходимо указать дату рождения',
	            'phonenumber.required' => 'Необходимо указать телефон',
	            'salary.required' => 'Необходимо указать зарплату',
	            'housenumber.required' => 'Необходимо указать номер дома',
	            'city.alpha' => 'Неверный формат для названия города',
	            'streat.alpha' => 'Неверный формат для названия улицы',
	            'firstname.alpha' => 'Неверный формат имени',
	            'lastname.alpha' => 'Неверный формат фамилии',
	            'databirth.date' => 'Неверный формат даты рождения',
	            'salary.integer' => 'Неверный формат зарплаты',
	            'sex.in' => 'Неизвестный пол',
	       
	            
	        	];
	    }
	}
