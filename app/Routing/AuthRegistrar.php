<?php
namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\Registrar;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

class AuthRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar):void
    {
        Route::middleware('web')->group(function () {
            
            // Route::controller(SignInController::class)->group(function(){

            //     Route::get('/login', 'page')->name('login');

            //     Route::post('/login', 'handle')->name('login.handle');
            
            //     Route::delete('/logout', 'logOut')->name('logOut');
            
            
            // });

            // Route::controller(ForgotPasswordController::class)->group(function(){

            //     Route::get('/forgot-password', 'page')->middleware('guest')->name('password.forgot');
            
            //     Route::post('/forgot-password', 'handle')->name('password.forgot.handle');
            // });

            // Route::controller(ResetPasswordController::class)->group(function(){

            //     Route::get('/reset-password/{token}', 'page')->middleware('guest')->name('password.reset');
            
            //     Route::post('/reset-password', 'handle')->name('password.reset.handle');

            // });
            

        });
        
    }
} 