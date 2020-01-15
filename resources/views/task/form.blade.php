{{--вывод ошибок--}}
@if ($errors->any())
    <div>
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group row">
    {{ Form::label('name', 'Название', ["class" => "col-sm-2 col-form-label col-form-label-lg"]) }}
    <div class="col-sm-10">
        {{ Form::text('name', $value = null, ["class" => "form-control form-control-lg", "placeholder" => "Название"]) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('description', 'Описание', ["class" => "col-sm-2 col-form-label col-form-label-lg"]) }}
    <div class="col-sm-10">
        {{ Form::textarea('description', null, ["class" => "form-control form-control-lg", "rows" => "5", "placeholder" => "Краткое описание задачи"]) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('notes', 'Заметки', ["class" => "col-sm-2 col-form-label col-form-label-lg"]) }}
    <div class="col-sm-10">
        {{ Form::textarea('notes', null, ["class" => "form-control form-control-lg", "rows" => "5", "placeholder" => "Дополнительные примечания"]) }}
    </div>
</div>

