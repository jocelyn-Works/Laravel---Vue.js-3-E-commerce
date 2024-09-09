<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// order
use App\Http\Controllers\OrderController;
// categoriy
use App\Http\Controllers\CategoryController;
// custom
use App\Http\Controllers\CustomProductController;
//Jocelyn
use App\Http\Controllers\ProductController;
// auth
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminUser;

// AUTH USER
// crée un user puis generer un token
Route::post('/register', [AuthController::class, 'register']);
// veirfier que l'user exist et generer un token
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// recuperer les infos de l'utilisateur actuellement connecter en verifiant sont token
Route::get('/me', [AuthController::class, 'actualUser'])->middleware('auth:sanctum');


// AUTH ADMIN
// crée un admin puis generer un token
Route::post('/adminRegister', [AuthController::class, 'adminRegister'])->middleware('auth:sanctum', AdminUser::class);

// category
Route::post('/category', [CategoryController::class, 'insertCategory'])->middleware('auth:sanctum', AdminUser::class);
Route::put('/category/{id}', [CategoryController::class, 'modifCategory'])->middleware('auth:sanctum', AdminUser::class);
Route::patch('/category/{id}', [CategoryController::class, 'updateColumnCategory'])->middleware('auth:sanctum', AdminUser::class);
Route::delete('/category/{id}', [CategoryController::class, 'deleteCategory'])->middleware('auth:sanctum', AdminUser::class);

//Users***************************************************************************************************************
Route::prefix('User')->controller(UserController::class)->group(function () {
    // Tous les users avec leurs categories = /product
    Route::get('/', 'usershow');

    // Recuperer un utilisateur par son id
    Route::get('/{id}',  'userShowid');

    // Modifier un utilisateur par son id
    Route::put('/update/{id}', 'updateUser')->middleware('auth:sanctum');

    // crée un users
    Route::post('/post',  'postUser');

    // supprimer un user
    Route::delete('delete/{id}', 'deleteUser')->middleware('auth:sanctum', AdminUser::class);


    // recupère un user avec ses toutes ces commandes
    Route::get('/{id}/Orders/', 'getOrdersByUserId')->middleware('auth:sanctum', AdminUser::class);

});//*******************************************************************************************************************

// produits
Route::prefix('product')->controller(ProductController::class)->group(function () {
   // Tous les produits avec leurs categories = /product
   Route::get('/',  'product')->name('product.index');

   // Un produit par son id  avec sa categorie= /product/id
   Route::get('/{id}', 'productShow')->name('product.show');

   // categorie avec ces produits = /product/categorie/id
   Route::get('/categorie/{id}',  'categorieProduct')->name('product.categorie');

   // crée un  product
   Route::post('/add',   'newProduct')->name('product.new')->middleware('auth:sanctum', AdminUser::class);

   // modifier un  product
   Route::patch('/update/{id}',  'updateProduct')->name('product.update')->middleware('auth:sanctum', AdminUser::class);

   // suprimer un produit
   Route::delete(('/delete/{id}'),  'deleteProduct')->name('product.delete')->middleware('auth:sanctum', AdminUser::class);
});

// orders
Route::get('/order', [OrderController::class, 'displayOrderList'])->middleware('auth:sanctum', AdminUser::class);
Route::get('/order/{id}', [OrderController::class, 'displaySingleOrder'])->middleware('auth:sanctum');
Route::post('/order', [OrderController::class, 'addOrder'])->middleware('auth:sanctum');
Route::put('/order/{id}', [OrderController::class, 'updateOrder'])->middleware('auth:sanctum');
Route::delete('/order/{id}', [OrderController::class, 'deleteOrder'])->middleware('auth:sanctum');
Route::get('/getOrders/{id}',[OrderController::class, 'getUser'])->middleware('auth:sanctum', AdminUser::class);
Route::get('/getProducts/{id}',[OrderController::class, 'getProducts'])->middleware('auth:sanctum', AdminUser::class);
Route::get('/getCustomProducts/{id}',[OrderController::class, 'getCustomProducts'])->middleware('auth:sanctum', AdminUser::class);


// CUSTOME PRODUCT
Route::get('customproducts', [CustomProductController::class, 'ShowCustomProducts']);
Route::get('customproduct/{id}', [CustomProductController::class, 'ShowCustomProduct']);
Route::post('customproduct', [CustomProductController::class, 'CreateCustomProducts']);
Route::put('customproduct/{id}', [CustomProductController::class, 'ModifCustomProducts']);
Route::patch('customproduct/{id}', [CustomProductController::class, 'ModifColumnCustomProduct']);
Route::delete('customproduct/{id}', [CustomProductController::class, 'DeleteCustomProduct']);

