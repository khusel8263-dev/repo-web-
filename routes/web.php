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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('home');
});
Route::get('#contact', function () {
    return view('success');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/checkforupdates/ashiddental', function (Request $request) {
    // Check if the request contains the custom header or parameter required for authentication
    // Replace 'YOUR_CUSTOM_HEADER' with the actual header name or 'YOUR_PARAM_NAME' with the actual parameter name used by your Windows application.
    if ($request->header('User-Agent') === 'AutoUpdaterDotNet' || $request->query('ashiddental') === 'AshidSec1-9*') {
        // The secret key matches, so return the XML file as the response
        return Response::file(storage_path('xml/ashiddental.xml'));
    } else {
        // Unauthorized access, return a 404 response or any other response you prefer
        abort(404);
    }
});

Route::get('/products/ashiddental/setup', function (Request $request) {
    $filePath = storage_path('/products/ashiddental/SetupProject.msi');

    if ($request->header('User-Agent') === 'AutoUpdaterDotNet' && file_exists($filePath) && is_file($filePath)) {
        // The secret key matches, so return the XML file as the response
        return response()->download($filePath);
    } else {
        // If the file does not exist, return a 404 response or any other response you prefer
        abort(404);
    }
});

Route::get('/products/ashiddental/SetupProject.msi', function (Request $request) {
    $filePath = public_path('/products/ashiddental/SetupProject.msi');
        
    if (file_exists($filePath) && is_file($filePath)) {
        // Return the file as a download response
        return response()->download($filePath);
    } else {
        // If the file does not exist, return a 404 response or any other response you prefer
        abort(404);
    }
});

Route::get('/contact', 'SendEmailController@index');
Route::post('/contact', 'SendEmailController@send');
