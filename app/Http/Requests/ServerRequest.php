<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|string|alpha_dash:ascii',
            'ip'=> 'required|ip',
            'port'=> 'required|numeric|min:0',
            'qwery'=> 'required|numeric|min:0'
        ];
    }
    public function messages() {
        return [

            
        ];
    }
}
