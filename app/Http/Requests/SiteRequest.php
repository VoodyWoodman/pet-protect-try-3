<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidUrlCharacters;

class SiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Здесь может быть логика для проверки авторизации пользователя
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Добавляем новое правило валидации для URL
        return [
            'url' => [
                'required',
                // 'url',
                new ValidUrlCharacters(),
                'regex:/^(https?:\/\/)?[^\W_]+(\.[^\W_]+)+(:\d{1,5})?(\/.*)?$/', // Проверка на формат URL
                'regex:/\.(com|ru|org)$/i', // Проверка на окончание домена
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'url.required' => 'Поле URL является обязательным',
            'url.url' => 'Неверный формат URL',
            'url.ValidUrlCharacters' => 'Недопустимый домен',
            'url.regex' => 'Недопустимые символы в URL-адресе',
        ];
    }
}
