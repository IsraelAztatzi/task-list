@extends('layouts.app')

@section('title', 'Task: ' . $task -> title)
@section('content')
<p>
    {{$task -> description}}
</p>
<p>
 @if ($task -> long_description)
    <span style="color:green">{{ $task -> long_description}}</span>
    @else
    <span style="color:red">Not completed</span>
    @endif
</p>
<p>
    {{$task -> created_at}}
</p>
<p>
    {{$task -> updated_at}}
</p>

<p>
    @if ($task -> completed)
    Completed
    @else
    Not completed
    @endif
</p>
<div>
    <a href="{{ route('tasks.edit',['task' => $task])}}">Edit</a>
</div>
<div>
    <form action="{{ route('tasks.toggle-complete',['task' => $task])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">Mark as {{$task -> completed ? 'not completed' : 'completed'}}</button>

    </form>
</div>
<div>
    <form action="{{ route('tasks.destroy',['task' => $task -> id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>
</div>
@endsection
