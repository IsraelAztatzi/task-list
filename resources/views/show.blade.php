@extends('layouts.app')

@section('title', 'Task: ' . $task -> title)
@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.index')}}" class="link">Back to all tasks</a>

</div>
<p class="mb-4 text-slate-700">
    {{$task -> description}}
</p>
<p class="mb-4 text-slate-700">
 @if ($task -> long_description)
    <span style="color:green">{{ $task -> long_description}}</span>
    @else
    <span style="color:red">Not completed</span>
    @endif
</p>
<p class="mb-4 text-slate-500 text-sm">
    Created {{$task -> created_at->diffForHumans()}} • Updated {{$task -> updated_at->diffForHumans()}}
</p>

<p class="mb-4">
    @if ($task -> completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not Completed</span>
    @endif
</p>
<div class="flex items-center space-x-4 w-full max-w-lg">

    <a href="{{ route('tasks.edit',['task' => $task])}}" class="btn">Edit</a>

    <form action="{{ route('tasks.toggle-complete',['task' => $task])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">Mark as {{$task -> completed ? 'not completed' : 'completed'}}</button>

    </form>

    <form action="{{ route('tasks.destroy',['task' => $task -> id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete Task</button>
    </form>
</div>
@endsection
