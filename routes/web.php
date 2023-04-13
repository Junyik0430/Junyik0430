<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SalesController;            
use App\Http\Controllers\ProductController;   
use App\Http\Controllers\UserController;          

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => ['auth', 'verified']], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/suggestForm', [PageController::class, 'suggestForm'])->name('suggestForm');
	Route::post('/sendMail', [PageController::class, 'sendMail'])->name('sendmail');

	//Route::get('/contacts.create', [ContactController::class, 'getUser'])->name('page.getUser');

	//contacts
	Route::get('/contacts.index', [ContactController::class, 'show'])->name('contacts.index');
	Route::get('/contacts.create', [ContactController::class, 'create'])->name('contact.create');
	Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
	Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
	Route::get('/contacts.{id}', [ContactController::class, 'edit'])->name('contact.edit');
	Route::post('/contacts/update/{id}', [ContactController::class, 'update'])->name('contact.update');
	Route::get('/contact.import', [ContactController::class, 'importContacts'])->name('contact.import');
    Route::post('/contact.upload', [ContactController::class, 'uploadContacts'])->name('contact.upload');

	//category
	Route::get('/category.index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category.create', [CategoryController::class, 'create'])->name('category.create');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category.{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit', [CategoryController::class, 'store'])->name('category.store');

	//sales
	Route::get('/sales.index', [SalesController::class, 'index'])->name('sales.index');
	Route::get('/sales.create', [SalesController::class, 'create'])->name('sales.create');
	Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');
	Route::get('/sales.import', [SalesController::class, 'importSales'])->name('sales.import');
	Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
	Route::get('/sales.{id}', [SalesController::class, 'edit'])->name('sales.edit');
	Route::get('/sales/cancelOrder/{id}', [SalesController::class, 'cancelOrder'])->name('sales.cancelOrder');
	Route::post('/sales/update/{id}', [SalesController::class, 'update'])->name('sales.update');
    Route::post('/sales.upload', [SalesController::class, 'uploadSales'])->name('sales.upload');
	
	//product
	Route::get('/products.index', [ProductController::class, 'index'])->name('products.index');
	Route::get('/products.create', [ProductController::class, 'create'])->name('products.create');
	Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
	Route::get('/products.import', [ProductController::class, 'importproducts'])->name('products.import');
	Route::post('/products', [ProductController::class, 'store'])->name('products.store');
	Route::get('/products.{id}', [ProductController::class, 'edit'])->name('products.edit');
	Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products.upload', [ProductController::class, 'uploadproducts'])->name('products.upload');

	//User
	Route::get('/users.index', [UserController::class, 'index'])->name('user.index');
	Route::get('/users.create', [UserController::class, 'create'])->name('user.create');
	Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
	Route::get('/users.import', [UserController::class, 'importproducts'])->name('user.import');
	Route::post('/users', [UserController::class, 'store'])->name('user.store');
	Route::get('/users.{id}', [UserController::class, 'edit'])->name('user.edit');
	Route::post('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/users.upload', [UserController::class, 'uploadproducts'])->name('user.upload');


	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});