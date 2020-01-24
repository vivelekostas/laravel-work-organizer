@extends('layouts.app')

@section('title', 'Обновление')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body border rounded rounded-lg" style="background-color: whitesmoke ">
                        {{--
                        Здесь форма отправится методом PATCH на соответсвующий обработчик, через соответсвующий маршрут.
                        --}}
                        {{ Form::model($task, ['url' => route('tasks.update', $task), 'method' => 'PATCH']) }}
                        @include('task.form')
                        {{ Form::submit('Обновить', ["class" => "btn btn-secondary"]) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
