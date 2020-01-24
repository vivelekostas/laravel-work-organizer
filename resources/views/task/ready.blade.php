@extends('layouts.app')

@section('title', '- Задачи')

@section('header', 'Задачи')

@section('content')
    <div class="row">
        <p class="h4 col-sm">Готовые задачи</p>
        <div>
            {{ Form::open(['url' => route('tasks.ready'), "class" => "form-inline", 'method' => 'GET']) }}
            @include('task.searchForm')
            {{ Form::close()}}
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Заметки</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата завершения</th>
            </tr>
            </thead>
            @include('task.table')
        </table>
        <div>
            {{-- красивый вывод пейджинга --}}
            {{ $tasks->links() }}
        </div>
    </div>
@endsection

