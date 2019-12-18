@extends('layouts.app')

@section('title', 'Create Task')

@section('header', 'Новая задача')

@section('content')
    {{--    <div class="form-group">--}}
    {{ Form::model($tasks, ['url' => route('tasks.store')]) }}
    {{--подключение общей части формы--}}
    @include('task.form')
    {{ Form::submit('Создать') }}
    {{ Form::close() }}
    {{--    </div>--}}
@endsection
