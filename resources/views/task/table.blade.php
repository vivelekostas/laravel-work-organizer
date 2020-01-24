<tbody>
{{--перебор коллекции--}}
<?php $count = 1 ?>
@foreach($tasks as $task)
    <tr>
        <th scope="row">{{$count ++}}</th>
        <td><a href="{{ route('tasks.show', $task) }}"><h5>{{$task->name}}</h5></a></td>
        <td>{{Str::limit($task->description, 30)}}</td>
        <td>{{Str::limit($task->notes, 30)}}</td>
        <td>{{$task->created_at}}</td>
        <td>{{$task->updated_at}}</td>
    </tr>
@endforeach
</tbody>

