<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')
    ->name('task.create');

Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required|max:255',
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])
    ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::get('/ddd', function () {
    return 'Hello World';
})->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name
// ) {
//     return 'hello ' . $name . '!';
// });

// Route::fallback(function () {
//     return view('alternativePage');
// });
