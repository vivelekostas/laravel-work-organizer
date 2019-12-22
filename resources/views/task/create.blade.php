@extends('layouts.app')

@section('title', 'Create Task')

@section('header', 'Новая задача')

@section('content')
    {{--
    сюда для формы передаётся пустой О. этой сущности и методом POST отправляется на
    маршрут POST /tasks, который обработает форму методом store.
    --}}
    {{ Form::model($task, ['url' => route('tasks.store')]) }}
    {{--подключение общей части формы--}}
    @include('task.form')
    {{ Form::submit('Создать') }}
    {{ Form::close() }}

@endsection
