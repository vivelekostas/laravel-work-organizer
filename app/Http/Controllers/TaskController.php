<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * Возвращает список всех статей с учётом пейджинга. Если же сюда приходит поисковая
     * форма, то из неё ($request) извлекаются данные, и статьи извлекаются уже с определённой
     * фильтрацией - согласно запросу.
     * Like оказывает огромное влияние на производительность. Используйте их осторожно. Изучите индексы
     * и полнотекстовый поиск.
     * Если $q - true (т.е НЕ пустое), то присв-ется 1ое значение, а еси false (null/пустое) то 2ое.
     * Во 1ом значении про-ит фильтрация по слову, встречающемуся в названии статьи с учётом пагинации.
     * Во 2ом значении про-ит вывод всех статей по дате создания, начиная с новых.
     * q передаётся 2ым пар-ом, чтобы строка поиска не оставалась пустой после выполнения.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q'); // Извлекает значение по указанному ключу (если есть).

        $tasks = $q ? Task::where('name', 'like', "%{$q}%")->paginate(3) : Task::orderBy('created_at', 'desc')->paginate(3);
        return view('task.index', compact('tasks', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     * В ней создаётся пустой о.task для передачи в форму.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        return view('task.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Laravel самостоятельно находит нужную сущность, достаёт
     * её из базы данных и передаёт в качестве параметра.
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
