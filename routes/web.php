<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\FolderNoteController;
use App\Http\Controllers\FolderTaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('noted');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('folders', FolderController::class)->scoped(['folder' => 'slug'])->except(['destroy']);

    Route::get('/folders/{folder:slug}/notes/create', [FolderNoteController::class, 'create']);
    Route::post('/folders/{folder:slug}/notes', [FolderNoteController::class, 'store']);
    Route::get('/folders/{folder:slug}/notes/{note}/edit', [FolderNoteController::class, 'edit'])->name('notes.edit');
    Route::patch('/folders/{folder:slug}/notes/{note}', [FolderNoteController::class, 'update']);

    Route::get('/folders/{folder:slug}/tasks/create', [FolderTaskController::class, 'create']);
    Route::post('/folders/{folder:slug}/tasks', [FolderTaskController::class, 'store']);
    Route::get('/folders/{folder:slug}/tasks/{task}/edit', [FolderTaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/folders/{folder:slug}/tasks/{task}', [FolderTaskController::class, 'update']);
    // Below, refactor to VueJS
    Route::post('/folders/{folder:slug}/tasks/{task}/complete', [FolderTaskController::class, 'complete']);
});