@extends('layouts.app')
@section('title')<div>
   <b>The list of tasks</b>
</div>
@endsection
@section('content')
{{-- @isset($name)
    <div>The name is {{ $name }}</div>
@endisset --}}


  {{--  @if (count($tasks)) --}}
       @forelse ($tasks as $task )
       <div>
        <a href="{{ route ('tasks.show', ['id'=> $task->id])}}"> {{ $task -> title}}</a>

       </div>
       @empty
         <div>
          There are no tasks!
            </div>
       @endforelse

   {{-- @endif --}}



@endsection
