<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        // sleep(1);
        return Inertia::render('Welcome', [
            'name' => 'Ahmed Sayyam',
            'frameworks' => [
                'laravel', 'vue', 'inertia'
            ]
        ]);
    });
    
    Route::get('/users', function(Request $request){
        return inertia('Users/Index', [
            'users' => User::query()
            ->when($request->input('search', ''), function($query, $search){
                $query->where('name', 'like', "%{$search}%");
            })        
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user)=>[
                'id'=> $user->id,
                'name'=> $user->name,
                'email'=> $user->email,
                'can' => [
                    'edit' => Auth::user()->can('edit', $user)
                ]
            ]),
            'filters'=> $request->only(['search']),
            'can' => [
                'createuser' => Auth::user()->can('create', User::class)
            ]
        ]);
    });
    
    Route::get('/users/create', function(){
        return inertia('Users/Create');
    })->can('create', 'App\Models\User');
    
    Route::post('/users', function(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        User::create($attributes);
        // User::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password')
        // ]);
        return redirect('/users');
    });
    
    Route::get('/settings', function(){
        sleep(1);
        return inertia('Settings');
    });
    
});

