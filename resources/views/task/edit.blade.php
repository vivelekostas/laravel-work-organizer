@extends('layouts.app')

@section('title', 'Обновление')

@section('header')
    Обновление Задачи "{{$task->name}}"
@endsection

@section('content')
    {{--
    Здесь форма отправится методом PATCH на соответсвующий обработчик, через соответсвующий маршрут.
    --}}
    {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
    @include('task.form')
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
