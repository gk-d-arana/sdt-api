<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('main_sections/', [App\Http\Controllers\MainSectionController::class, 'index']);
Route::get('main_section/{main_section_id}/sections/', [App\Http\Controllers\SectionController::class, 'index']);
Route::get('section/{section_id}/products/', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('latest_products/', [App\Http\Controllers\ProductController::class, 'latest_products']);
Route::get('carousel_images/', [App\Http\Controllers\CarouselImagesController::class, 'index']);
