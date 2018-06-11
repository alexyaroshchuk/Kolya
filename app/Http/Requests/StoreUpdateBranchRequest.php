<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBranchRequest extends FormRequest
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
	            'housenumber.required' => 'Необходимо указать номер дома',
	            'city.alpha' => 'Неверный формат для названия города',
	            'streat.alpha' => 'Неверный формат для названия улицы',
	            
	        	];
	    }
	}
