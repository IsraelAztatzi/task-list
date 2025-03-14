@extends('layouts.app')
@section('title')<div>
   <b>The list of tasks</b>
</div>
@endsection
@section('content')
<div>
  <a href="{{ route('task.create')}}" class="link">Add new Task</a>
</div>
{{-- @isset($name)
    <div>The name is {{ $name }}</div>
@endisset --}}


  {{--  @if (count($tasks)) --}}
       @forelse ($tasks as $task )
       <div class="flex items-center justify-center space-x-4 w-full max-w-lg">
        <a href="{{ route('tasks.show', ['task'=> $task->id])}}" class="flex-grow">
            <div @class(['border p-3 my-2 w-full','text-red-500' => $task->completed])> {{ $task->title }}
            </div>
        </a>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn">Edit</a>
    </div>
       @empty
         <div>
          There are no tasks!
            </div>
       @endforelse

   {{-- @endif --}}
@if($tasks->count())
<div class="mt-4">
  {{ $tasks->links() }}
</div>
@endif


@endsection
