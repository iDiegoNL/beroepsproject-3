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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/testmail', function () {
    $data = App\Order::find(1);

    return new App\Mail\OrderPlaced($data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Producten
Route::get('/producten', 'ProductController@categories')->name('producten');
Route::get('/producten/{categorie?}/{cid?}', 'ProductController@category')->name('category');
Route::get('/producten/{categorie?}/{cid?}/{subcategorie}/{sid}', 'ProductController@subcategory')->name('subcategory');
Route::get('/product/{naam}/{ean}', 'ProductController@show')->name('product');
// /Producten

// Klantenprofiel
Route::get('/profiel', 'ProfileController@index')->name('klantenprofiel.index');
Route::post('/profiel', 'ProfileController@update')->name('klantenprofiel.update');
// /Klantenprofiel

// Cart
Route::get('/winkelwagen', 'CartController@index')->name('cart');
Route::post('/winkelwagen', 'CartController@add')->name('cart.add');
Route::post('/winkelwagen/update', 'CartController@update')->name('cart.update');
Route::delete('/winkelwagen', 'CartController@destroy')->name('cart.destroy');

// Clear the cart
Route::get('/clearcart', function () {
    Cart::clearCartConditions();
    Cart::clear();
    echo 'ok';
});
// /Cart

// Afrekenen
Route::get('/afrekenen/adres', 'AfrekenController@adres')->name('afrekenen.adres')->middleware('cartcheck');
Route::post('/afrekenen/adres', 'AfrekenController@storeAdres')->name('afrekenen.adres.store')->middleware('cartcheck');

Route::get('/afrekenen/bezorgmoment', 'AfrekenController@bezorgMoment')->name('afrekenen.bezorgmoment')->middleware('cartcheck');
Route::get('/afrekenen/bezorgmoment/{dag}', 'AfrekenController@confirmation')->name('afrekenen.confirmation')->middleware('cartcheck');

Route::get('/afrekenen/confirmed/{dag}', 'AfrekenController@order')->name('afrekenen.order')->middleware('cartcheck');
Route::get('/afrekenen/factuur/{id}', 'AfrekenController@testZooi')->name('afrekenen.factuur')->middleware('cartcheck');
// /Afrekenen

// Admin Dashboard
Route::get('/admin', 'DashboardController@home')->name('dashboard.home');

// Producten
Route::get('/admin/producten', 'admin\ProductController@index')->name('dashboard.producten.overzicht');
Route::get('/admin/producten/nieuw', 'admin\ProductController@create')->name('dashboard.producten.nieuw');
Route::post('/admin/producten/nieuw', 'admin\ProductController@store')->name('dashboard.producten.store');
Route::get('/admin/producten/destroy/{id}', 'admin\ProductController@destroy')->name('dashboard.producten.destroy');
// /Producten

// Categorieën
Route::get('/admin/categorieen', 'admin\CategoryController@index')->name('dashboard.categorieen.overzicht');
Route::get('/admin/categorieen/nieuw', 'admin\CategoryController@create')->name('dashboard.categorieen.nieuw');
Route::post('/admin/categorieen/nieuw', 'admin\CategoryController@store')->name('dashboard.categorieen.store');
// /Categorieën

// Subcategorieën
Route::get('/admin/subcategorieen', 'admin\SubCategoryController@index')->name('dashboard.subcategorieen.overzicht');
Route::get('/admin/subcategorieen/nieuw', 'admin\SubCategoryController@create')->name('dashboard.subcategorieen.nieuw');
Route::post('/admin/subcategorieen/nieuw', 'admin\SubCategoryController@store')->name('dashboard.subcategorieen.store');
// /Subcategorieën

// Aanbiedingen
Route::get('/admin/aanbiedingen', 'admin\AanbiedingenController@index')->name('dashboard.aanbiedingen.overzicht');
Route::get('/admin/aanbiedingen/nieuw', 'admin\AanbiedingenController@create')->name('dashboard.aanbiedingen.nieuw');
Route::post('/admin/aanbiedingen/nieuw', 'admin\AanbiedingenController@store')->name('dashboard.aanbiedingen.store');
// /Aanbiedingen
// /Admin dashboard

// API
Route::get('/api/products', 'admin\DatatablesController@products')->name('datatables.products');
// /API