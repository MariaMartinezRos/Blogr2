<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('contacto', 'contact')->name('contact');
Route::view('nosotros', 'about')->name('about');
Route::get('blog', [PostController::class, 'index'] )->name('blog');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Me he dado cuenta de que he inicializado el proyecto mal. Para este tipo
// de protectos se ha de crear directamente desde la terminal, ya que si no
// la bbdd se configura automaticamente de sqlite y necesito que sea de sql
