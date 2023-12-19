<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    // return view('welcome', ['name' => 'Lerry']);

    // FETCH ALL THE USERS

    // $selectUsers = DB::select('select * from users WHERE email=?', ['gojo.saturo@gmail.com']);
    $selectUsers = DB::select('select * from users');


    // DISPLAY ONLY DATA

    // foreach ($users as $user) {
    //     $name = $user->name;
    //     $email = $user->email;

    //     echo 'Name: ' . $name . '  ' . '</br>' . $email;
    // }


    // INSERT DATA

    // $insertUser = DB::insert('INSERT INTO users (id, name, email, password) VALUES (?, ?, ?, ?)', [4, 'John Lerry', 'johnlerry@gmail.com', 'johnxlerry']);
    // $insertUser = DB::insert('INSERT INTO users (name, email, password) VALUES (?, ?, ?)', ['John Lerry', 'johnlerryhehe@gmail.com', 'password']);


    // UPDATE DATA

    $updateUser = DB::update('UPDATE users set name = "John Lerry Hapatinga" WHERE email = ? ', ['john@email.com']);


    // DELETE DATA
    $deleteUser = DB::delete('DELETE FROM users WHERE email=?', ['johnlerry@gmail.com']);

    dd($selectUsers);
});

// Route::view('/', 'home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
