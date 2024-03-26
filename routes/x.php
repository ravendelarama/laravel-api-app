<?php

use App\Http\Controllers\PogiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(PogiController::class)->prefix('users')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::patch('/edit', 'edit');
        Route::put('/', 'update');
        Route::delete('/', 'destroy');
    });
});

Route::match(['get', 'post'], '/user/{user}', function (Request $request, String $user) {
    return "Mukha kang etat " . $user;
})->name('profile');

//  HTTP Verb Exceptions
Route::match(['post', 'patch', 'put', 'delete'], '/mutate', function (Request $request) {
    return Response::json([
        'message' => "Data Mutated"
    ]);
});

// Any
Route::any('/any', function (Request $request) {
    return "any";
});
