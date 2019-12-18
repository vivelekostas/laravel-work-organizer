@extends('layouts.app')

@section('title', $task->id)

{{--@section('header', 'Статьи')--}}

@section('content')
    <h1>{{$task->name}}</h1>
    <div>
        <b>Описание: </b>{{$task->description}}<br>
        <b>Заметки: </b>{{$task->notes}}<br>
        <b>Статус: </b>{{$task->status}}<br>
    </div>
@endsection
