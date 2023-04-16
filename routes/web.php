<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvartarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
     return view('welcome');
    //$users = DB::select("select * from users");
    //$users = DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['Talukder', 'talukder@gmail.com', 'password']);
    //$users = DB::update("update users set email = 'abc@gmail.com' where id=2");
    //DB:: delete("delete from users where id = 2");
    //$users = DB::table('users')->where('id', 1)->get();
    // $users = DB::table('users')->first();
    //$users = User::where('id', 1)->first();
//    $user = User::create([
//        'name' => 'London to Paris',
//        'email' => 'heading@gmail.com',
//        'password' => 'London to Paris']);
    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avartar', [AvartarController::class, 'update'])->name('profile.avartar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
