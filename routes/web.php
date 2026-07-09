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
use app\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('index');
});
// Route::get('#contact', function () {
//     return view('success');
// });

// Route::get('/test', function () {
//     return view('welcome');
// });

Route::get('/dashboard', 'AdminController@index')->middleware('auth')->name('admin.dashboard');
// Route::get('/checkforupdates/ashiddental', function (Request $request) {
//     // Check if the request contains the custom header or parameter required for authentication
//     // Replace 'YOUR_CUSTOM_HEADER' with the actual header name or 'YOUR_PARAM_NAME' with the actual parameter name used by your Windows application.
//     if ($request->header('User-Agent') === 'AutoUpdaterDotNet' || $request->query('ashiddental') === 'AshidSec1-9*') {
//         // The secret key matches, so return the XML file as the response
//         return Response::file(storage_path('xml/ashiddental.xml'));
//     } else {
//         // Unauthorized access, return a 404 response or any other response you prefer
//         abort(404);

//     }
// });

// Route::get('/products/ashiddental/setup', function (Request $request) {
//     $filePath = storage_path('/products/ashiddental/SetupProject.msi');

//     if ($request->header('User-Agent') === 'AutoUpdaterDotNet' && file_exists($filePath) && is_file($filePath)) {
//         // The secret key matches, so return the XML file as the response
//         return response()->download($filePath);
//     } else {
//         // If the file does not exist, return a 404 response or any other response you prefer
//         abort(404);
//     }
// });

// Route::get('/products/ashiddental/SetupProject.msi', function (Request $request) {
//     $filePath = public_path('/products/ashiddental/SetupProject.msi');
        
//     if (file_exists($filePath) && is_file($filePath)) {
//         // Return the file as a download response
//         return response()->download($filePath);
 //     } else {
//         // If the file does not exist, return a 404 response or any other response you prefer
//         abort(404);
//     }
// });

Route::get('/contact', 'SendEmailController@index');
Route::post('/contact', 'SendEmailController@send');

Auth::routes();

// Route::post('/contact', 'ContactController@store')
//         ->name('contact.store');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    // Route::get('/users', 'UserController@GetList')->name('admin-users-list');
    // Route::get('/users/edit/{id}', 'UserController@GetUser');
    // Route::put('/users/update/{id}', 'UserController@Update')->name('admin-users-update');
    // Route::name('admin-users-delete')->get('/users/delete/{id}', 'UserController@Delete');
    Route::get('/partner/list', 'PartnerController@GetList')->name('admin-partner-list');
    Route::get('/partner/create', 'PartnerController@Create')->name('admin-partner-create');
    Route::get('/partner/edit/{id}', 'PartnerController@Edit')->name('admin-partner-edit');
    Route::put('/partner/store', 'PartnerController@Store')->name('admin-partner-store');
    Route::put('/partner/update/{id}', 'PartnerController@Update')->name('admin-partner-update');
    Route::get('/partner/delete/{id}', 'PartnerController@Delete')->name('admin-partner-delete');
    Route::get('/partner/view/{id}', 'PartnerController@View')->name('admin-partner-view');
    
    // Route::get('/contact/view', 'ContactController@ContactViewAdmin')->name('admin-contact-view');
    // Route::get('/contact/edit/{id}', 'ContactController@ContactEditAdmin');
    // Route::put('/contact/update/{id}', 'ContactController@Update')->name('admin-contact-update');
    // Route::get('/contact-message/list', 'ContactController@ContactMessageList')->name('admin-contact-message-list');
    // Route::get('/contact-message/view/{id}', 'ContactController@ContactMessageView')->name('admin-contact-message-view');
    // Route::get('/post/list', 'PostController@GetList')->name('admin-post-list');
    // Route::get('/post/create', 'PostController@Create')->name('admin-post-create');
    // Route::get('/post/edit/{id}', 'PostController@Edit')->name('admin-post-edit');
    // Route::put('/post/store', 'PostController@Store')->name('admin-post-store');
    // Route::put('/post/update/{id}', 'PostController@Update')->name('admin-post-update');
    // Route::get('/post/delete/{id}', 'PostController@Delete')->name('admin-post-delete');
    // Route::get('/post/view/{id}', 'PostController@View')->name('admin-post-view');
    // Route::post('ckeditor/image-upload', 'CKEditorController@Upload')->name('ckeditor-upload');
    // Route::get('/banner/list', 'BannerController@List')->name('admin-banner-list');
    // Route::get('/banner/view/{id}', 'BannerController@View')->name('admin-banner-view');
    // Route::get('/banner/create', 'BannerController@Create')->name('admin-banner-create');
    // Route::get('/banner/edit/{id}', 'BannerController@Edit')->name('admin-banner-edit');
    // Route::put('/banner/store', 'BannerController@Store')->name('admin-banner-store');
    // Route::put('/banner/update/{id}', 'BannerController@Update')->name('admin-banner-update');
    // Route::get('/banner/delete/{id}', 'BannerController@Delete')->name('admin-banner-delete');
});

// Route::get('/adminx', 'AdminController@index')->name('dashboard');
