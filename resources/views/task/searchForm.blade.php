<div class="form-group">
    {{ Form::text('find', $find ?? '',  ["class" => "form-control mx-sm-2 mb-2", "placeholder" => "Название"]) }}
</div>
{{ Form::submit('Найти!', ["class" => "btn btn-info mb-2"]) }}
