@extends('layouts.app')

@section('title', $task->id)

{{--@section('header', 'Статьи')--}}

@section('content')
    <div class="myContent">
        <h1>{{$task->name}}</h1>
        <br>
        <div>
            <dl class="row">
                <dt class="col-sm-2">Описание:</dt>
                <dd class="col-sm-9">{{$task->description}}</dd>
                <dt class="col-sm-2">Заметки:</dt>
                <dd class="col-sm-9">{{$task->notes}}</dd>
                <dt class="col-sm-2">Статус:</dt>
                <dd class="col-sm-9">{{$task->status}}</dd>
                <dt class="col-sm-2">Дата создания:</dt>
                <dd class="col-sm-9">{{$task->created_at}}</dd>
                <dt class="col-sm-2">Редактирование:</dt>
                <dd class="col-sm-9">
                    <div class="row">
                        <a class="btn btn-primary col-sm-1 mx-sm-3" href="{{ route('tasks.edit', $task->id) }}"
                           role="button">Edit</a>

                        <a class="btn btn-success col-sm-1" href="{{ route('tasks.done', $task) }}"
                           data-method="get"
                           rel="nofollow" role="button">Готово</a>

                        {{--временно не работающая по неизвестным причинам кнопка-сылка на удаление зависящая от
                            js библиотеки--}}
                        {{--<a class="btn btn-danger pull-right" href="{{ route('tasks.destroy', $task) }}"--}}
                        {{--data-confirm="Вы уверены, что хотите удалить эту задачу?"--}}
                        {{--data-method="delete"--}}
                        {{--rel="nofollow" role="button">Удалить</a>--}}

                        <div class="col-sm-1">
                            {{ Form::model($task, ['url' => route('tasks.destroy', $task), 'method' => 'DELETE']) }}
                            {{ Form::submit('Удалить!', ["class" => "btn btn-danger"]) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </dd>
            </dl>
        </div>
    </div>
@endsection

