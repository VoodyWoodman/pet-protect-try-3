<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidUrlCharacters implements Rule
{
    public function passes($attribute, $value)
    {
        // Проверка формата URL
        if (!preg_match('/^(https?:\/\/)?[^\W_]+(\.[^\W_]+)+(:\d{1,5})?(\/.*)?$/', $value)) {
            return 'Неверный формат URL';
        }

        // Проверка на отсутствие пробелов
        if (preg_match('/\s/', $value)) {
            return 'URL-адрес не должен содержать пробелы';
        }

        // Проверка окончания домена
        if (!preg_match('/\.(com|ru|org)$/i', $value)) {
            return 'Недопустимое окончание домена';
        }

        return true;
    }

    public function message()
    {
        // Этот метод не будет вызван, так как сообщения об ошибке возвращаются из метода passes
        // Оставим его просто в качестве пустой реализации интерфейса
    }
}
