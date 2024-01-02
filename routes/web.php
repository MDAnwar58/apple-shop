<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenAuthenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// page routes
Route::get('/', [HomeController::class, 'HomePage']);
Route::get('/ByBrandPage', [BrandController::class, 'ByBrandPage']);
Route::get('/ByCategoryPage', [CategoryController::class, 'ByCategoryPage']);
Route::get('/Details', [ProductController::class, 'Details']);
Route::get('/Wish-list', [ProductController::class, 'WishListPage'])->middleware(TokenAuthenticate::class);

// authentication page routes
Route::get('/Login', [UserController::class, 'LoginPage']);
Route::get('/Verify', [UserController::class, 'VerifyPage']);
Route::get('/Register', [UserController::class, 'RegisterPage']);

// Brand List
Route::get('/BrandList', [BrandController::class, 'BrandList']);
Route::post('/BrandStore', [BrandController::class, 'BrandStore']);

// Category List
Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);
Route::post('/CategoryStore', [CategoryController::class, 'CategoryStore']);
// product list 
Route::post('/ProductStore', [ProductController::class, 'ProductStore']);
Route::get('/ListProductByCategory/{id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}', [ProductController::class, 'ListProductByRemark']);
// Slider
Route::post('/StoreProductSlider', [ProductController::class, 'StoreProductSlider']);
Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider']);
// Product Details
Route::post('/StoreProductDetails', [ProductController::class, 'StoreProductDetails']);
Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}', [ProductController::class, 'ListReviewByProduct']);

// Policy
Route::get('/PolicyPage', [PolicyController::class, 'PolicyPage']);
Route::post('/PolicyTypeStore', [PolicyController::class, 'PolicyTypeStore']);
Route::get('/PolicyByType/{type}', [PolicyController::class, 'PolicyByType']);

// User Auth
Route::get('/UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{OTP}', [UserController::class, 'VerifyLogin']);
Route::get('/logout', [UserController::class, 'UserLogout']);


// user profile
Route::post('/CreateProfile', [ProfileController::class, 'CreateProfile'])->middleware(TokenAuthenticate::class);
Route::get('/ReadProfile', [ProfileController::class, 'ReadProfile'])->middleware(TokenAuthenticate::class);

// Create Product Review
Route::post('/CreateProductReview', [ProductController::class, 'CreateProductReview'])->middleware(TokenAuthenticate::class);

// product wish list
Route::get('/ProductWishList', [ProductController::class, 'ProductWishList'])->middleware(TokenAuthenticate::class);
Route::get('/CreateWishList/{product_id}', [ProductController::class, 'CreateWishList'])->middleware(TokenAuthenticate::class);
Route::get('/RemoveWishList/{product_id}', [ProductController::class, 'RemoveWishList'])->middleware(TokenAuthenticate::class);


// product cart
Route::post('/CreateCartList', [ProductController::class, 'CreateCartList'])->middleware(TokenAuthenticate::class);
Route::get('/CartList', [ProductController::class, 'CartList'])->middleware(TokenAuthenticate::class);
Route::get('/DeleteCartList', [ProductController::class, 'DeleteCartList'])->middleware(TokenAuthenticate::class);

// invoice
Route::get('/InvoiceCreate', [InvoiceController::class, 'InvoiceCreate'])->middleware(TokenAuthenticate::class);
Route::get('/InvoiceList', [InvoiceController::class, 'InvoiceList'])->middleware(TokenAuthenticate::class);
Route::get('/InvoiceProductList/{invoice_id}', [InvoiceController::class, 'InvoiceProductList'])->middleware(TokenAuthenticate::class);


// payment
Route::post('/PaymentSuccess', [InvoiceController::class, 'PaymentSuccess']);
Route::post('/PaymentCancel', [InvoiceController::class, 'PaymentCancel']);
Route::post('/PaymentFail', [InvoiceController::class, 'PaymentFail']);