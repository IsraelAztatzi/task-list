@extends('layouts.app')
@section('title', isset($task) ? 'Edit Task' : 'Add Task')
 
 @section('content')
   <form method="POST"
     action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
     @csrf
     @isset($task)
       @method('PUT')
     @endisset
     <div class="mb-4">
       <label for="title">
         Title
       </label>
       <input type="text" name="title" id="title"
       class="border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }} rounded-md p-2"
       value="{{ old('title', $task->title ?? '') }}">
       @error('title')
         <p class="error">{{ $message }}</p>
       @enderror
     </div>
 
     <div class="mb-4">
       <label for="description">Description</label>
       <textarea name="description" id="description"
         rows="5"  class="border {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }} rounded-md p-2">{{ $task->description ?? old('description') }} </textarea>
       @error('description')
         <p class="error">{{ $message }}</p>
       @enderror
     </div>
 
     <div class="mb-4">
       <label for="long_description">Long Description</label>
       <textarea name="long_description" id="long_description"
         rows="10"  class="border {{ $errors->has('long_description') ? 'border-red-500' : 'border-gray-300' }} rounded-md p-2">{{ $task->long_description ?? old('long_description') }}
        </textarea>
       @error('long_description')
         <p class="error">{{ $message }}</p>
       @enderror
     </div>
 
     <div class="flex gap-2 items-center">
       <button type="submit" class="btn my-2">
         @isset($task)
           Update Task
         @else
           Add Task
         @endisset
       </button>
       <a href="{{ route('tasks.index') }}" class="link">Cancels</a>
     </div>
   </form>
 @endsection