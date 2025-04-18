<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// Route::get("/", function(){
//     return view("welcome");
// });
Route::redirect('/', '/items');
Route::get('/items/list', function()    {
    $items = User::with('item')->findOrFail(Auth::id());
    //dd($items);
    return view('items.list', ['items'=> $items]);
})->name('items.list');
Route::resource('/items', ItemController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
