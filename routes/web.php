<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Views\Account\AccountSettingsControllerView;
use App\Http\Controllers\Views\Auth\SignUpControllerView;
use App\Http\Controllers\Views\Auth\SignInControllerView;
use App\Http\Controllers\Views\Auth\SignInSocialiteControllerView;
use App\Http\Controllers\Views\Auth\PasswordForgotControllerView;
use App\Http\Controllers\Views\Auth\PasswordResetControllerView;
use App\Http\Controllers\Views\Auth\OrganizationSelectControllerView;

use App\Http\Controllers\Views\Admin\UserControllerView;
use App\Http\Controllers\Views\Admin\DashboardAdminControllerView;

use App\Http\Controllers\Views\Products\ProductsControllerView;
use App\Http\Controllers\Views\DashboardControllerView;

//CONSTRUVIAS
use App\Http\Controllers\Construvias\WorkgroupMainBoxesController;


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




Route::get('/sign-out', function () {
    Session::flush();
    Auth::logout();
    return redirect('/sign-in');
});


Route::post('/users/valid/{email}',                   [UserController::class,                     'valid']);

Route::put('/locale/{id}',                            [LocaleController::class, 'select']);
Route::get('/locale/{id}',                            [LocaleController::class, 'select']);


Route::group(['middleware' => ['initialization','guest']], function() {

    Route::get('/', function () {
        return redirect('/sign-in');
    });

    Route::get('/sign-in',                            [SignInControllerView::class,               'index'])->name("sign-in");
    Route::post('/sign-in',                           [UserController::class,                     'authenticate']);

    Route::get('/sign-up',                            [SignUpControllerView::class,               'index']);
    Route::post('/sign-up',                           [UserController::class,                     'signUp']);

    Route::get('/sign-in/{provider}',                 [SignInSocialiteControllerView::class,      'redirectToProvider']);
    Route::get('/sign-in/{provider}/callback',        [SignInSocialiteControllerView::class,      'handleProviderCallback']);

    Route::get('/password-forgot',                    [PasswordForgotControllerView::class,       'index']);
    Route::post('/password-forgot',                   [UserController::class,                     'passwordForgot']);

    Route::get('/password-reset/{token}',             [PasswordResetControllerView::class,        'index'])->name('password.reset');
    Route::post('/password-reset',                    [UserController::class,                     'passwordReset'])->name('password.update');

});


Route::group(['middleware' => ['initialization','auth']], function() {

    Route::get('/organization-select',                [OrganizationSelectControllerView::class, 'index']);
    Route::get('/organization-select/{id}',           [OrganizationSelectControllerView::class, 'select']);

    /*Route::get('/', function () {
        if(!session('Auth::organization')){
            return redirect('/organization-select');
        }
        else{
            return "";
        }
    });*/
    Route::get('/',                                    [DashboardControllerView::class,          'index']);
    Route::get('/account/settings',                    [AccountSettingsControllerView::class,    'index']);


    //ADMIN ROUTES
    Route::get('/admin',                               [DashboardAdminControllerView::class,     'index']);
    Route::get('/admin/users',                         [UserControllerView::class,               'index']);

    //CONSTRUVIAS ROUTES
    Route::get('/admin/workgroups',                    [WorkgroupMainBoxesController::class,     'view_admin']);

});

/*
Route::get('/password-reset/{token}', function ($token) {
    return view('auth.password-reset-change', ['token' => $token]);
})->middleware('guest')->name('password.reset');
*/

//Route::get('/organization-select',                    [OrganizationSelectControllerView::class, 'index']);
//Route::get('/organization-select/{id}',               [OrganizationSelectControllerView::class, 'select']);
/*
Route::get('/organization-select', function () {
        return view('auth.organization-select');
    });
*/

Route::get('/auth-user', function () {
    //App::setLocale("es");
    dd(App::getLocale());
    dd(Auth()->user());
    //dd(Auth()->user()->organization);
    //dd(session('Auth::organization'));
    //dd(Auth()->user()->organization());
});



