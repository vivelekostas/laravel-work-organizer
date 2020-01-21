<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class TaskController
 * Отвечает за CRUD сущности Task.
 * @package App\Http\Controllers
 */

class TaskController extends Controller
{
    /**
     * TaskController constructor. Отделяет овец от козлищ. Т.е. не позволяет
     * незалогиненным юзерам просматривать и пользоваться частями приложения,
     * за которые отвечает этот контроллер, но которые доступны только заре-
     * гестрированным пользователям. Пока что это index и create.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * Возвращает список всех задач текущего юзера с учётом пейджинга. Если же сюда приходит поисковая (посик задачи по названию)
     * форма, то из неё ($request) извлекаются данные, и задачи извлекаются уже с определённой фильтрацией - согласно запросу.
     * Like оказывает огромное влияние на производительность. Используйте их осторожно. Изучите индексы
     * и полнотекстовый поиск.
     * Если $q - true (т.е НЕ пустое), то присв-ется 1ое значение, а еси false (null/пустое) то 2ое.
     * Во 1ом значении про-ит фильтрация по текущему юзеру и по слову, встречающемуся в названии задачи с учётом пагинации.
     * Во 2ом значении про-ит вывод всех задач по текущему юзеру и по дате создания, начиная с новых.
     * q передаётся 2ым пар-ом, чтобы строка поиска не оставалась пустой после выполнения.
     * @return Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q'); // Извлекает значение по указанному ключу (если есть).
        $id = Auth::id();

        $tasks = $q ? Task::where('name', 'like', "%{$q}%")->where('creator_id', "{$id}")->paginate(3) :
            Task::where('creator_id', "{$id}")->orderBy('created_at', 'desc')->paginate(3);

        return view('task.index', compact('tasks', 'q'));
    }

    /**
     * Отображает таблицу с рабочими задачами и поисковой формой с учётом пейджинга.
     * В $tasks записывается либо результат работы поиска, либо просто вывод табли-
     * цы со всеми задачами.
     * @param Request $request
     * @return Factory|View
     */
    public function actual(Request $request)
    {
        $find = $request->input('find'); // Извлекает значение по указанному ключу (если есть).
        $id = Auth::id();
        $tasks = $find ? Task::where('name', 'like', "%{$find}%")
            ->where('status', 'active')
            ->where('creator_id', "{$id}")
            ->orderBy('created_at', 'desc')
            ->paginate(8) :
            Task::where('status', 'active')
                ->where('creator_id', "{$id}")
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        return view('task.actual', compact('tasks', 'find'));
    }

    /**
     * Отображает таблицу с готовыми задачами и поисковой формой с учётом пейджинга.
     * В $tasks записывается либо результат работы поиска, либо просто вывод табли-
     * цы со всеми задачами.
     * @param Request $request
     * @return Factory|View
     */
    public function ready(Request $request)
    {
        $find = $request->input('find'); // Извлекает значение по указанному ключу (если есть).
        $id = Auth::id();
        $tasks = $find ? Task::where('name', 'like', "%{$find}%")
            ->where('status', 'done')
            ->where('creator_id', "{$id}")
            ->orderBy('created_at', 'desc')
            ->paginate(8) :
            Task::where('status', 'done')
                ->where('creator_id', "{$id}")
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        return view('task.ready', compact('tasks', 'find'));
    }

    /**
     * Show the form for creating a new resource.
     * В ней создаётся пустой о.task для передачи в форму создания новой задачи.
     * @return Response
     */
    public function create()
    {
        $task = new Task();
        return view('task.create', compact('task'));
    }

    /**
     * Cохранение новой статьи.
     * Здесь используется StoreTaskRequest - класс с валидацией для этого метода.
     * Через фасад Auth получаю текущего юзера, далее магия Eloquent: из юзера вы-
     * зываю задачи как метод->создаю новую задачу->записываю в неё данные из фор-
     * мы и->сохраняю её. Затем редирект с флеш сообщением.
     * @param StoreTaskRequest $request
     * @return Response
     */
    public function store(StoreTaskRequest $request)
    {
        $user = Auth::user();
        $task = $user->tasks()->make()->fill($request->all())->save();

        \Session::flash('flash_message', 'Создана новая задача!');
        return redirect()
            ->route('tasks.actual');
    }

    /**
     * Display the specified resource.
     * Laravel самостоятельно находит нужную сущность, достаёт
     * её из базы данных и передаёт в качестве параметра метод,
     * а затем в шаблон.
     * @param Task $task
     * @return Response
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     * Валидация происходит до выполнения этого метода. А затем в полученный обновляемый
     * объект присваиваиваются данные из формы. Потом сохранение и редирект с флешем.
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return Response
     */

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->fill($request->all());
        $task->save();

        \Session::flash('flash_message', 'Задача обновлена!');
        return redirect()
            ->route('tasks.show', $task);
    }

    public function done($id)
    {
//        dd($id);
        $task = Task::FindOrFail($id);
//        dump($task);
        $task->status = 'done';
        $task->save();
//        dd($task);
        $name = $task->name;

        \Session::flash('flash_message', 'Задача "' . $name . '" выполнена!');
        return redirect()->route('tasks.actual');
    }

    /**
     * Remove the specified resource from storage.
     * $name извлекаю исключительно для флеша
     * @param Task $task
     * @return Response
     * @throws \Exception
     */

    public function destroy(Task $task)
    {
        echo 'Miu!';
        dd($task->toArray());
        $name = $task->name;
        $task->delete();

        \Session::flash('flash_message', 'Задача "' . $name . '" удалена успешно!');
        return redirect()->route('tasks.actual');
    }
}
