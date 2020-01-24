@extends('layouts.app')

@section('title', 'Рабочие Задачи')

@section('content')
    <div class="row">
        <p class="h4 col-sm">Рабочие задачи</p>
        <div>
            {{ Form::open(['url' => route('tasks.actual'), "class" => "form-inline", 'method' => 'GET']) }}
            @include('task.searchForm')
            {{ Form::close() }}
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Заметки</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата обновления</th>
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


