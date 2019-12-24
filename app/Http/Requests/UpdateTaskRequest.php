<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
/**
 * Class UpdateTaskRequest
 * Отвечатет за валидацию обновления задачи. Наследуется от вали-
 * дации создания задачи, а потому знает его особенности проверки.
 * @package App\Http\Requests
 */
class UpdateTaskRequest extends StoreTaskRequest
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
     * В $task каким-то образом попадает обновляемый О. и из него
     * для проверки извлекается id, чтобы сохранить обновления.
     * Иначе валидация будет ругаться, что запись с таким именем
     * уже сужествует в БД. Остальные правила проверки наследуются
     * от StoreTaskRequest и с помощью array_merge сочетаются с мас-
     * сивом валидации данного класса.
     * @return array
     */
    public function rules()
    {
        $task = $this->route('task');
        return array_merge(parent::rules(), [
            'name' => [
                'required',
                Rule::unique('tasks')->ignore($task->id)
            ]
        ]);
    }
}
