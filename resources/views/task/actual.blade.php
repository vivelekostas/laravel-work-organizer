@extends('layouts.app')

@section('title', '- Задачи')

@section('header', 'Задачи')

@section('content')
    <div class="row">
        <p class="h4 col-sm">Рабочие задачи</p>
        <div class="text-right col-sm">
            {{ Form::open(['url' => route('tasks.actual'), 'method' => 'GET']) }}
            {{ Form::text('find', $find ?? '',  ["placeholder" => "Название"]) }}
            {{ Form::submit('Найти!') }}
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
    </div>
@endsection


