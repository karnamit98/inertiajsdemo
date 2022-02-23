<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
// use Request;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('user.login');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('user.logout');



Route::middleware('auth')->group(function() {

        
    Route::get('/', function () {
        // return inertia('Welcome');
        return Inertia::render('Welcome',[
            'name' => 'John Doe'
        ]);
    });

    Route::get('/home', function () {
        // return inertia('Welcome');
        return Inertia::render('Home',[
            // 'username' => 'Uzumaki Naruto',
            'name' => 'John Doe',
            'frameworks' => [
                'Laravel', 'React', 'Vue'
            ]
        ]);
    });



    Route::get('/users', function(){
        // sleep(1);
        //Always map/through user data before passing to component
    /* $users = [
            [
                'id'=>'1','name'=>'Guts'
            ],
            [
                'id'=>'2','name'=>'Naruto Uzumaki'
            ],
            [
                'id'=>'3','name'=>'Sasuke Uchiha'
            ],
            [
                'id'=>'4','name'=>'Muzan Kibutsuji'
            ],
            [
                'id'=>'5','name'=>'Inosuke'
            ],
            [
                'id'=>'6','name'=>'Eren Yeager'
            ]
        ]; */

        //Alternate
        
        $users = User::query()
        ->when(request()->input('search'), function($query, $search){
            $query->where('name','like', '%'.$search.'%' );
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn($user) => [
            'id' => $user->id,
            'name' => $user->name
        ]);
        

    // $users = paginate($users, 2);
        // return $users;
        // dd(request()->only(['search']));
        return Inertia::render('Users/Index',[
            'time' => now()->toTimeString(),
            'users' => $users,
            'filters' => request()->only(['search']),
            'can' => [
                'createUser' => auth()->user()->email == 'sasuke@gmail.com' ? true : false
            ]
        ]);
    });

    Route::get('/users/create', function(){
        // sleep(1);
        return Inertia::render('Users/Create');
    });

    Route::post('/users/store', function(){
        //Validation
        $validated = request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        //Create User
        User::create( $validated ); 
        // dd('asd');
        //Redirect
        return redirect('/users');  
    });

    Route::get('/settings', function(){
        // sleep(1);
        return Inertia::render('Settings');
    });

    // Route::post('/logout', function() {
    //     // dd('Logging Out! FOO:'.request('foo'));
    //     auth()->logout()
    // });


});

