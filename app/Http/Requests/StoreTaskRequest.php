<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTaskRequest
 * Этот класс берёт на себя функцию проверки данных из формы
 * создания новой задачи, чтобы разгрузить код его контроллера.
 * @package App\Http\Requests
 */
class StoreTaskRequest extends FormRequest
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     * Выставленно true, чтобы пока не было никакой авторизации.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Получить правила проверки для применения к запросу.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:tasks',
            'description' => 'required',
            'notes' => 'nullable'
        ];
    }
}
