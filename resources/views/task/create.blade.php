@extends('layouts.app')

@section('title', 'Create Task')

@section('header', 'Новая задача')

@section('content')
    {{--
    сюда для формы передаётся пустой О. этой сущности и методом POST отправляется на
    маршрут POST /tasks, который обработает форму методом store.
    --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body border rounded rounded-lg" style="background-color: whitesmoke ">

                        {{ Form::model($task, ['url' => route('tasks.store'), "class" => "form-horizontal"]) }}
                        {{--подключение общей части формы--}}
                        @include('task.form')
                        {{ Form::submit('Создать', ["class" => "btn btn-secondary", "data-toggle" => "tooltip", "data-placement" => "left", "title" => "Создать задачу"]) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
