<?php

use Illuminate\Support\Facades\Route;
use App\Models\PageContents;
use App\Models\Pages;
use App\Models\Modules;
use App\Models\Products;
use App\Models\Categories;

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

$controller_path = 'App\Http\Controllers';


// Admin - Home
Route::get('/admin', function(){
    return view('admin.home.home');
});

// Karina Page
Route::get('/moscow', function(){
    return view('shop.karina');
});
Route::get('/home', function(){
    return view('shop.home');
});
Route::get('/login', function(){
    return view('shop.login');
});
Route::get('/register', function(){
    return view('shop.register');
});
Route::get('/application', function(){
    return view('shop.application');
});
Route::get('/product', function(){
    return view('shop.product');
});
Route::get('/opencart', function(){
    return view('shop.bag');
});
Route::get('/order', function(){
    return view('shop.order');
});
Route::get('/onecategory', function(){
    return view('shop.onecategory');
});
Route::get('/cabinet', function(){
    return view('shop.cabinet');
});

// Admin - Page
Route::get('/admin/page-list', function(){
    $pages = Pages::all();
    return view('admin.page.page-list', ['pages'=>$pages]);
})->name('pages');
Route::get('/admin/page-add', function(){
    $category = Categories::all();
    return view('admin.page.page-add', ['categories'=>$category]);
})->name('pages');
Route::post('/admin/page-add', $controller_path . '\admin\Page@createPage');
Route::get('/admin/page-edit/{pageId}', function($pageId){
    $category = Categories::all();
    $contents = PageContents::where('page_id', $pageId)->get();
    return view('admin.page.page-edit', ['categories'=>$category, 'contents'=>$contents]);
})->name('pages');
Route::post('/admin/page-edit/{pageId}', $controller_path.'\admin\Page@editPage');

// Admin - Module
Route::get('/admin/module-list', function(){
    $modules = Modules::all();
    return view('admin.module.module-list', ['modules'=>$modules]);
})->name('modules');

// Site - Home
Route::get('/', function () {
    $page_content = PageContents::join('category', 'content', '=', 'category.id')->where('page_id', 1)->orderBy('sort', 'ASC')->get();
    $product = Products::all();
    return view('shop.home', ['page_contents'=>$page_content, 'products'=>$product]);
});