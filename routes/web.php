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

Auth::routes();



Route::get('/home/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# Main Sections Routes:

Route::get('/admin/main_sections/', [App\Http\Controllers\MainSectionAdminController::class, 'index'])->name('main_sections');
Route::post('/admin/main_sections/', [App\Http\Controllers\MainSectionAdminController::class, 'store'])->name('add_main_section.store');
Route::post('/admin/main_section/{id}/update', [App\Http\Controllers\MainSectionAdminController::class, 'update'])->name('edit_main_section.update');
Route::get('/admin/main_section/{id}/', [App\Http\Controllers\MainSectionAdminController::class, 'show'])->name('main_section-details.show');
Route::post('/admin/main_section/{id}/', [App\Http\Controllers\MainSectionAdminController::class, 'destroy'])->name('delete_main_section.destroy');

# Sections Routes

Route::get('/admin/sections/', [App\Http\Controllers\SectionAdminController::class, 'index'])->name('sections');
Route::post('/admin/sections/', [App\Http\Controllers\SectionAdminController::class, 'store'])->name('add_section.store');
Route::post('/admin/section/{id}/update', [App\Http\Controllers\SectionAdminController::class, 'update'])->name('edit_section.update');
Route::get('/admin/section/{id}/', [App\Http\Controllers\SectionAdminController::class, 'show'])->name('section-details.show');
Route::post('/admin/section/{id}/', [App\Http\Controllers\SectionAdminController::class, 'destroy'])->name('delete_section.destroy');


#Product Routes

Route::get('/admin/products/', [App\Http\Controllers\ProductAdminController::class, 'index'])->name('products');
Route::post('/admin/products/', [App\Http\Controllers\ProductAdminController::class, 'store'])->name('add_product.store');
Route::post('/admin/product/{id}/update', [App\Http\Controllers\ProductAdminController::class, 'update'])->name('edit_product.update');
Route::get('/admin/product/{id}/', [App\Http\Controllers\ProductAdminController::class, 'show'])->name('product-details.show');
Route::post('/admin/product/{id}/', [App\Http\Controllers\ProductAdminController::class, 'destroy'])->name('delete_product.destroy');


#Carousel Images Routes

Route::get('/admin/carousel_images/', [App\Http\Controllers\CarouselImagesAdminContoller::class, 'index'])->name('carousel_images');
Route::post('/admin/carousel_images/', [App\Http\Controllers\CarouselImagesAdminContoller::class, 'store'])->name('add_carousel_image.store');
Route::post('/admin/carousel_image/{id}/', [App\Http\Controllers\CarouselImagesAdminContoller::class, 'destroy'])->name('delete_carousel_image.destroy');




Route::get('/update', function () {
    echo exec("git fetch --all");
    echo exec("git reset --hard origin/main");
    echo exec("git pull");
});

Route::get('/pull', function () {
    echo exec("git pull");
});

Route::get('/migrate_db', function () {
    Artisan::call('migrate:fresh');
});

Route::get('/seed_db', function () {
    Artisan::call('db:seed');
});
