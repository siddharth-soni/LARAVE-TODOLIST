<?php

use App\Http\Controllers\ToDoListController;
// use App\Models\ToDoList;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// INDEX
Route::get('/', [ToDoListController::class, 'index'])->name('tasks.index');

// STORE
// Route::patch('/tasks/{id}/edit', [ToDoListController::class, 'update'])->name('tasks.update');

// EDIT
Route::get('/tasks/{id}/edit', [ToDoListController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{id}', [ToDoListController::class, 'update'])->name('tasks.update');

// DELETE
Route::delete('/tasks/{task}', [ToDoListController::class, 'destroy'])->name('tasks.destroy');

