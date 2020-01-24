@extends('layouts.app')

@section('title', 'Laravel')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/reg.jpeg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1><a  class="btn btn-lg btn-primary" href="{{ route('register') }}">Зерегистрируйся!</a></h1>
                            <p>Чтобы пользоваться приложением</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/zadacha2.jpeg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Создавай задачи и цели</h1>
                            <p>И сохраняй их тут, чтобы не забыть о своих планах по завоеванию мира!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/tabl2.jpeg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Пользуйся таблицами</h1>
                            <p>Две удобные таблицы для контроля рабочих и готовых задач.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection
