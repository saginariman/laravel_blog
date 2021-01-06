<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'subject' => 'required|min:5|max:50',
            'message' => 'required|min:15|max:500',
            'email' => 'required|email',
            'name' => 'required'
        ];
    }

    /*public function attributes(){
        return [
            'name' => 'Имя'
        ];
    }*/

    public function messages() {
        return [
            'name.required' => 'Введите ваше имя',
            'email.required' => 'Введите ваше email',
            'subject.required' => 'Введите вашу тему',
            'message.required' => 'Введите ваше сообщение'
        ];
    }
}
