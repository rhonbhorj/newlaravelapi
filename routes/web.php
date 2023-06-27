<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    return view('welcome');
});



Route::get('/send', [MailController::class, 'index']);


Route::any('/', function (Request $request) {
    return response()->json([
        'status' => 401,
        'message' => 'Please check your API endpoint.',
    ], 401);
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

// Route:: get('/setup',function(){


// $creadentails=[

// 'email'=>'admin@damin.com',
// 'password'=>'password'

// ];

// if(!Auth::attempt($creadentails)){

// $user =new \App\Models\User();
// $user->name ='Admin';
// $user->email = $creadentails['email'];
// $user->password= Hash::make($creadentails['password']);
// $user->save();





//         if (Auth::attempt($creadentails)) {
//             $user = Auth::user();
//             $accessToken = $user->createToken('admin', ['create', 'update', 'delete']);
//             $adminToken = $accessToken->accessToken;
//         }


// }

// });