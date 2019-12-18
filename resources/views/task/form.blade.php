@if ($errors->any())
    <div>
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label('name', 'Название') }}
    {{ Form::text('name') }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Описание') }}
    {{ Form::textarea('description') }}
</div>
<div class="form-group">
    {{ Form::label('notes', 'Заметки') }}
    {{ Form::textarea('notes') }}
</div>

