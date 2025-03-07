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
@endsection
