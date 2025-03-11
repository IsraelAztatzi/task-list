@extends('layouts.app')
@section('title')<div>
   <b>The list of tasks</b>
</div>
@endsection
@section('content')
<div>
  <a href="{{ route('task.create')}}" class="font-bold my-2 text-blue-800 underline decoration-pink-500">Add new Task</a>
</div>
{{-- @isset($name)
    <div>The name is {{ $name }}</div>
@endisset --}}


  {{--  @if (count($tasks)) --}}
       @forelse ($tasks as $task )
       <div>
       {{-- <a href="{{ route ('tasks.show', ['id'=> $task->id])}}"> {{ $task -> title}}</a> --}}
       <a href="{{ route ('tasks.show', ['task'=> $task->id])}}">
        <div @class(['border p-3 my-2','text-red-500' => $task -> completed])> {{ $task -> title}}
        </div>
        </a>
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
