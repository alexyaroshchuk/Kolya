<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddWaybillRequest extends FormRequest
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
		            'provider' => 'required|integer|exists:providers,id',
	        		];
	    }
	    
	      public function messages()
	    {
	        return [
	            'required' => 'Необходимо указать идентификатор поставщика',
	            'exists' => 'Поставщика с данным идентификатором не существует',
	            'provider.integer' => 'Неверный идентификатор поставщика',
	            
	        	];
	    }
	}
