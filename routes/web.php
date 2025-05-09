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
    // $users = Auth::user()->role === 'admin'
    // ? User::with('item')->has('item')->get()
    // : collect([User::with('item')->findOrFail(Auth::id())])->filter(function ($user) {
    //     return $user->item->isNotEmpty();
    // });
    $users = Auth::user()->role === 'admin'
    ? User::with('item')->has('item')
    : User::with('item')->Where('id', Auth::id())->whereHas('item');
    return view('items.list', ['users'=> $users->paginate(15)]);

})->middleware(['auth', 'verified'])->name('items.list');

Route::resource('/items', ItemController::class)->only(['store', 'update'])->middleware(['auth', 'verified', 'throttle:5,1']);
// Routes that require auth but no throttle (create + edit)
Route::resource('/items', ItemController::class)
->only(['create', 'edit', 'destroy'])
->middleware(['auth', 'verified']);
Route::resource('/items', ItemController::class)
    ->only(['index', 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
