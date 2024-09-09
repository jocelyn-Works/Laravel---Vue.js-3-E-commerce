<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DasboardController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\CustomAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\SwaggerController;





Route::get('/', function () {
    return view('welcome');
});


#customer
Route::get('/customer', [UserController::class, 'customershow']);

Route::get('/customer/{id}', [UserController::class, 'customershowid']);

#categorie
Route::get('/categories', [CategoryController::class, 'showCategories']);

Route::get('/category/{id}', [CategoryController::class, 'showCategory']);

Route::get('/test/{id}',  [UserController::class, 'test']);


//  ----------------     Admin ---------------------------- //
Route::prefix('Admin')->group(function () {

    Route::get('/' , [DasboardController::class, 'dashboard'])->name('dashboard');
// Product //
    Route::get('/product' , [ProductAdminController::class, 'productAdmin'])->name('productAdmin');
    Route::get('/product/new' , [ProductAdminController::class, 'newProduct'])->name('newProductAdmin');
// Categories //
    Route::get('/categories', [CategoryAdminController::class, 'bladeCategories'])->name('bladeCategories');
    Route::get('/category/{id}', [CategoryAdminController::class, 'bladeUpdateCategory'])->name('bladeUpdateCategory');
    Route::post('/category/{id}', [CategoryAdminController::class, 'bladeUpdateCategory'])->name('bladeUpdateCategory');

    Route::get('/category/{id}', [CategoryAdminController::class, 'bladeDeleteCategory'])->name('bladeDeleteCategory');

    Route::post('/category', [CategoryAdminController::class, 'bladeCreateCategory'])->name('bladeCreateCategory');
    
    Route::get('/search', [CategoryAdminController::class, 'searchCategory'])->name('searchCategory');

// Orders //
    Route::get('/orders', [OrderAdminController::class, 'bladeOrde});rs'])->name('bladeOrders');

    Route::get('/orders/{id}', [OrderAdminController::class, 'bladeUpdateOrder'])->name('bladeUpdateOrder');
    Route::post('/orders/{id}', [OrderAdminController::class, 'bladeUpdateOrder'])->name('bladeUpdateOrder');

    Route::get('/orders/{id}', [OrderAdminController::class, 'bladeDeleteOrder'])->name('bladeDeleteOrder');

    Route::post('/orders', [OrderAdminController::class, 'bladeCreateOrder'])->name('bladeCreateOrder');

    Route::get('/searchOrder', [OrderAdminController::class, 'searchOrders'])->name('searchOrders');    
    
    // User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserAdminController::class, 'userShow'])->name('userShow');

        Route::get('/delete/{id}', [UserAdminController::class, 'userDelete'])->name('userDelete');
        //Route::post('/post', [UserAdminController::class, 'userP});ost'])->name('userPost');

        Route::get('/post', [UserAdminController::class, 'userPost'])->name('userPost');
        Route::post('/create', [UserAdminController::class, 'userCreate'])->name('userCreate');
        Route::get('/create', [UserAdminController::class, 'userCreate']);

        Route::get('/Edit/{id}', [UserAdminController::class, 'userEdit'])->name('userEdit');
        Route::put('/put/{id}', [UserAdminController::class, 'userPut'])->name('userPut');
        //Route::get('/patch/{id}', [UserAdminController::class, 'userPatch']);


    Route::prefix('product')->group(function () {
        // Tous les Produit //
        Route::get('/', [ProductAdminController::class, 'productAdmin'])->name('productAdmin');
        // ---------------------------------------------------------------------------------------------- //
        Route::get('/search' ,[ProductAdminController::class, 'searchProduct'])->name('searchProduct' );
           // ---------------------------------------------------------------------------------------------- //
        // Ajout d'un Produit 
        Route::get('/new', [ProductAdminController::class, 'Product'])->name('product');
        Route::post('/', [ProductAdminController::class, 'newProduct'])->name('newProduct');
        
        // Modifier un produit //
        Route::get('/{id}', [ProductAdminController::class, 'getOneProduct'])->name('getOneProduct');;
        Route::put('/update/{id}', [ProductAdminController::class, 'updateProduct'])->name('updateProduct');
     
        // suprimer un produit //
        Route::delete('/delete/{id}', [ProductAdminController::class, 'deleteProduct'])->name('deleteProduct');
        
    });

    Route::prefix('custom')->group(function () {
        // ----------------       Wheel   -------------------------------------------------------------//
        Route::get('/whell', [CustomAdminController::class, 'wheelCustom'])->name('wheelCustom');
        Route::get('/whell/new', [CustomAdminController::class, 'newWheelView'])->name('newWheelView');
        Route::post('/', [CustomAdminController::class, 'newWheel'])->name('newWheel');
        

        Route::get('/whell/{id}', [CustomAdminController::class, 'getProductWheel'])->name('getProductWheel');

        Route::put('/whell/update/{id}', [CustomAdminController::class, 'updateWheel'])->name('updateWheel');

        Route::delete('/whell/delete/{id}', [CustomAdminController::class, 'deleteWheel'])->name('deleteWheel');
//--------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------Pedales--------------------------------------------------------//

        Route::get('/pedal', [CustomAdminController::class, 'pedalCustom'])->name('pedalCustom');
//*************************************************supprimer une pedale****************************************************
        Route::delete('/pedal/delete/{id}', [CustomAdminController::class, 'deletePedal'])->name('deletePedal');
//*************************************************Creer une pedale*********************************************************
        Route::get('/pedal/post', [CustomAdminController::class, 'pedalPost'])->name('pedalPost');
        Route::get('/pedal/create', [CustomAdminController::class, 'newPedal'])->name('newPedal');
        Route::post('/pedal/create', [CustomAdminController::class, 'newPedal']);

//**********************************************modifier une pedale********************************************************
        Route::get('/pedal/{id}', [CustomAdminController::class, 'pedalPut'])->name('pedalPut');;
        Route::put('/pedal/update/{id}', [CustomAdminController::class, 'updatePedal'])->name('updatePedal');

//--------------------------------------------------------------------------------------------------------------------//

        Route::get('/propulsion', [CustomAdminController::class, 'propulsion'])->name('propulsion');

        Route::delete('propulsion/delete/{id}', [CustomAdminController::class, 'deletePropulsion'])->name('deletePropulsion');
//-------------------------------------------------Porte bagage------------------------------------------------------------//

        Route::get('/porteBagages', [CustomAdminController::class, 'porteBagages'])->name('porteBagages');

        Route::post('/porteBagages/create', [CustomAdminController::class, 'porteBagagesCreate'])->name('porteBagagesCreate');
        Route::get('/porteBagages/create', [CustomAdminController::class, 'porteBagagesCreate'])->name('porteBagagesCreate');

        Route::post('/porteBagages/update/{id}', [CustomAdminController::class, 'porteBagagesUpdate'])->name('porteBagagesUpdate');
        Route::delete('porteBagages/delete/{id}', [CustomAdminController::class, 'deletePorteBagage'])->name('deletePorteBagage');

        //--------------------------------------------------------------------------------------------------------------------//


        Route::get('/propulsion/new', [CustomAdminController::class, 'newPropulsionView'])->name('newPropulsionView');
        Route::post('/newPropulsion', [CustomAdminController::class, 'newPropulsion'])->name('newPropulsion');

        Route::get('/propulsion/{id}', [CustomAdminController::class, 'getPropulsion'])->name('getPropulsion');
        Route::put('/propulsion/update/{id}', [CustomAdminController::class, 'updateWheel'])->name('updateWheel');


        Route::delete('propulsion/delete/{id}', [CustomAdminController::class, 'deletePropulsion'])->name('deletePropulsion');
//--------------------------------------------------------------------------------------------------------------------//



        Route::get('/guidon', [CustomAdminController::class, 'guidon'])->name('guidon');

        Route::get('/guidon/new', [CustomAdminController::class, 'newHandleView'])->name('newHandleView');
        Route::post('/', [CustomAdminController::class, 'newHandle'])->name('newHandle');

        Route::get('/guidon/{id}', [CustomAdminController::class, 'getGuidon'])->name('getGuidon');
        Route::put('/guidon/update/{id}', [CustomAdminController::class, 'updateGuiudon'])->name('updateGuiudon');



        Route::delete('guidon/delete/{id}', [CustomAdminController::class, 'deleteguidon'])->name('deleteguidon');
//--------------------------------------------------------------------------------------------------------------------//

        Route::get('/poignee', [CustomAdminController::class, 'poignee'])->name('poignee');


        Route::get('/poigne/new', [CustomAdminController::class, 'newPoigneView'])->name('newPoigneView');
        Route::post('/', [CustomAdminController::class, 'newPoigne'])->name('newPoigne');

        Route::get('/poigne/{id}', [CustomAdminController::class, 'getPoigne'])->name('getPoigne');
        Route::put('/poigne/update/{id}', [CustomAdminController::class, 'updatepoigne'])->name('updatepoigne');

        Route::delete('poignee/delete/{id}', [CustomAdminController::class, 'deletepoignee'])->name('deletepoignee');
//--------------------------------------------------------------------------------------------------------------------//

        Route::get('/cadre', [CustomAdminController::class, 'cadre'])->name('cadre');
        Route::delete('cadre/delete/{id}', [CustomAdminController::class, 'deleteCadre'])->name('deleteCadre');

    });
   
// Categories //
    Route::get('/categories', [CategoryAdminController::class, 'bladeCategories'])->name('bladeCategories');

    Route::get('/category/{id}', [CategoryAdminController::class, 'bladeUpdateCategory'])->name('bladeUpdateCategory');
    Route::post('/category/{id}', [CategoryAdminController::class, 'bladeUpdateCategory'])->name('bladeUpdateCategory');

    Route::get('/category/{id}', [CategoryAdminController::class, 'bladeDeleteCategory'])->name('bladeDeleteCategory');

    Route::post('/category', [CategoryAdminController::class, 'bladeCreateCategory'])->name('bladeCreateCategory');
    
    Route::get('/search', [CategoryAdminController::class, 'searchCategory'])->name('searchCategory');

// Orders //
    Route::get('/orders', [OrderAdminController::class, 'bladeOrders'])->name('bladeOrders');

    Route::get('/orders/{id}', [OrderAdminController::class, 'bladeUpdateOrder'])->name('bladeUpdateOrder');
    Route::post('/orders/{id}', [OrderAdminController::class, 'bladeUpdateOrder'])->name('bladeUpdateOrder');

    Route::get('/orders/{id}', [OrderAdminController::class, 'bladeDeleteOrder'])->name('bladeDeleteOrder');

    Route::post('/orders', [OrderAdminController::class, 'bladeCreateOrder'])->name('bladeCreateOrder');

    Route::get('/searchOrder', [OrderAdminController::class, 'searchOrders'])->name('searchOrders');    



    // User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserAdminController::class, 'userShow'])->name('userShow');

        Route::get('/delete/{id}', [UserAdminController::class, 'userDelete'])->name('userDelete');
        //Route::post('/post', [UserAdminController::class, 'userPost'])->name('userPost');

        Route::get('/post', [UserAdminController::class, 'userPost'])->name('userPost');
        Route::post('/create', [UserAdminController::class, 'userCreate'])->name('userCreate');
        Route::get('/create', [UserAdminController::class, 'userCreate']);

        Route::get('/Edit/{id}', [UserAdminController::class, 'userEdit'])->name('userEdit');
        Route::put('/put/{id}', [UserAdminController::class, 'userPut'])->name('userPut');
        //Route::get('/patch/{id}', [UserAdminController::class, 'userPatch']);
        Route::get('/search', [UserAdminController::class, 'searchUser'])->name('searchUser');
    });
});
//Swagger//
});
Route::get('/api/doc', [SwaggerController::class, 'SwaggerShow']);
//Route::post('/api/doc', [SwaggerController::class, 'SwaggerShow']);




