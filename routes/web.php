<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarterController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\CsrfController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\GreaterThan18Middleware;
use App\Http\Middleware\MyAuthMiddleware;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Controllers\BladeTemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

    Route::prefix('admin')->group(function(){
        Route::get('/',[AuthController::class,'getLogIn']);
        Route::post('/login',[AuthController::class,'Login']);
        Route::get('/logout',[AuthController::class,'Logout']);

        Route::middleware([MyAuthMiddleware::class,LocaleMiddleware::class])->group(function () {

        Route::get('/page1',[StarterController::class,'getPage1']);
        Route::get('/page2',[StarterController::class,'getPage2']);
        Route::get('/page3',[StarterController::class,'getPage3']);
        Route::get('/page4',[StarterController::class,'getPage4']);
        Route::get('/page5',[StarterController::class,'getPage5']);

        Route::get('/app',[StarterController::class,'getApp']);

        Route::get('/routing/view-only',[RoutingController::class,'getViewOnly']);
        Route::get('/routing/passing-data-to-view',[RoutingController::class,'passingDataToView']);
        Route::get('/routing/route-parameter/{bgColor}/{color}',[RoutingController::class,'routeParameter']);
        Route::get('/routing/dynamic-route',[RoutingController::class,'dynamicRoute']);
        Route::post('/routing/dynamic-route',[RoutingController::class,'submitDynamicRoute']);
        Route::get('/routing/named-route',[RoutingController::class,'namedRoute'])->name('routing.named-route');
        Route::get('/routing/test-middleware',[RoutingController::class,'testMiddleware']);
        Route::post('/routing/post-test-middleware',[RoutingController::class,'postTestMiddleware'])->middleware([GreaterThan18Middleware::class]);

        //csrf
        Route::get('/csrf/lecture1',[CsrfController::class,'lecture1']);
        Route::get('/csrf/lecture2',[CsrfController::class,'lecture2']);
        Route::get('/csrf/lecture3',[CsrfController::class,'lecture3']);
        Route::post('/csrf/create',[CsrfController::class,'create']);
        Route::post('/csrf/get-items',[CsrfController::class,'getItems']);

        //session
        Route::get('/session/lecture',[SessionController::class,'lecture']);
        Route::post('/session/put',[SessionController::class,'put']);
        Route::post('/session/delete/{key}',[SessionController::class,'delete']);
        Route::post('/session/flush',[SessionController::class,'flush']);

        //session {tasks management}
        Route::get('/session/tasks',[SessionController::class,'index']);
        Route::post('/session/tasks',[SessionController::class,'store']);
        Route::put('/session/tasks/{taskId}',[SessionController::class,'update']);
        Route::delete('/session/tasks/{taskId}',[SessionController::class,'destory']);

        //blade-template
        Route::get('/blade-template/component',[BladeTemplateController::class,'getComponent']);
        Route::get('/blade-template/localization',[BladeTemplateController::class,'getLocalization']);
        Route::post('/blade-template/localization',[BladeTemplateController::class,'changeLocalization']);

        //users
        Route::get('/users/reset-password/{id}',[UserController::class,'resetPassword'])->name('users.reset-password');
        Route::put('/users/reset-password/{id}',[UserController::class,'upDatePassword'])->name('users.update-password');
        Route::resource('users',UserController::class);

        //brands
        Route::resource('brands',BrandController::class);

        //categories
        Route::resource('categories',CategoryController::class);

        //items
        Route::resource('items',ItemController::class);

        //orders
        Route::get('/orders/search-items',[OrderController::class,'searchItems'])->name('orders.search-items');
        Route::resource('orders',OrderController::class);
        });
    });

         