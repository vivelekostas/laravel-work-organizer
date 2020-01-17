@extends('layouts.app')

@section('title', '- Задачи')

@section('header', 'Задачи')

@section('content')
    <h3>Готовые задачи</h3>
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
        <tbody>
        {{--перебор коллекции--}}
        <?php $count = 1 ?>
        @foreach($ready as $task)
            <tr>
                <th scope="row">{{$count ++}}</th>
                <td><a href="{{ route('tasks.show', $task) }}"><h5>{{$task->name}}</h5></a></td>
                <td>{{Str::limit($task->description, 35)}}</td>
                <td>{{Str::limit($task->notes, 35)}}</td>
                <td>{{$task->created_at}}</td>
                <td>{{$task->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

