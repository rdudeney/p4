<?php

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

Route::get('/', 'WelcomeController');

# CREATE
Route::get('/sessions/add', 'SessionController@newSession');
Route::post('/sessions', 'SessionController@store');

# FIND

Route::get('/sessions/find', 'SessionController@find');
Route::get('/sessions/search-process', 'SessionController@searchProcess');

# Route::get('/sessions/new-session', 'SessionController@newSession');

# SHOW
Route::get('/sessions/{id}', 'SessionController@show');
Route::get('/sessions', 'SessionController@index');

# EDIT
Route::get('/sessions/{id}/edit', 'SessionController@edit');
Route::put('/sessions/{id}', 'SessionController@update');

# DELETE
Route::get('/sessions/{id}/delete', 'SessionController@delete');

Route::delete('/sessions/{id}', 'SessionController@destroy');





Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});