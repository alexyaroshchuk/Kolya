<?php

	namespace App\Http\Requests;

	use Illuminate\Foundation\Http\FormRequest;

	class OrderDetalAddRequest extends FormRequest
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
		            'id' => 'required|integer|exists:products,id',
					'count' => 'required|integer|min:1'
	        		];
	    }
	    
	      public function messages()
	    {
	        return [
	            'required' => 'Необходимо указать код товара',
	            'exists' => 'Товар с данным кодом не существует',
	            'id.integer' => 'Неверный код товара',
	            'count.integer' => 'Количество товара должно быть целым числом',
	             'min' => 'Количество товара должно быть больше нуля',
	            
	        	];
	    }
	}
