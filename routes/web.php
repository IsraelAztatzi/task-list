<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')
    ->name('task.create');

Route::get('/tasks/{task}', function (Task $task) {

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) { //we add task 
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::post('/tasks', function(TaskRequest $request) {
    // $data = $request->validated();
    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task , TaskRequest $request) {
    // $data = $request->validated();
   // $task = Task::findOrFail($id); We remove this line because we add task in the function parameter and laravel will automatically find the task with the id in the url and pass it to the function as a parameter --- Route Model Binding
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
    ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-complete', function(Task $task) {

    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task status updated successfully');
})->name('tasks.toggle-complete');
// Route::get('/ddd', function () {
//     return 'Hello World';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello world');
// });

// Route::get('/greet/{name}', function ($name
// ) {
//     return 'hello ' . $name . '!';
// });

// Route::fallback(function () {
//     return view('alternativePage');
// });
