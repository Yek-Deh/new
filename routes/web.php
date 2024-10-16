<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

route::get('/', [HomeController::class, 'home'])->name('home');
route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard')->middleware('auth','admin');
route::get('view_category',[AdminController::class,'view_category'])->name('view_category')->middleware('auth','admin');
route::post('add_category',[AdminController::class,'add_category'])->name('add_category')->middleware('auth','admin');
route::get('delete_category/{id}',[AdminController::class,'delete_category'])->name('delete_category')->middleware('auth','admin');
route::get('edit_category/{id}',[AdminController::class,'edit_category'])->name('edit_category')->middleware('auth','admin');
route::post('update_category/{id}',[AdminController::class,'update_category'])->name('update_category')->middleware('auth','admin');

//product
route::get('add_product',[AdminController::class,'add_product'])->name('add_product')->middleware('auth','admin');
route::post('upload_product',[AdminController::class,'upload_product'])->name('upload_product')->middleware('auth','admin');
route::get('view_product',[AdminController::class,'view_product'])->name('view_product')->middleware('auth','admin');
route::delete('delete_product/{id}',[AdminController::class,'delete_product'])->name('delete_product')->middleware('auth','admin');
route::get('edit_product/{slug}',[AdminController::class,'edit_product'])->name('edit_product')->middleware('auth','admin');
route::put('update_product/{id}',[AdminController::class,'update_product'])->name('update_product')->middleware('auth','admin');
route::get('product_details/{id}',[HomeController::class,'product_details'])->name('product_detail');
route::get('shop',[HomeController::class,'shop'])->name('shop');
route::get('why',[HomeController::class,'why'])->name('why');
route::get('testimonial',[HomeController::class,'testimonial'])->name('testimonial');
route::get('contact',[HomeController::class,'contact'])->name('contact');

//cart

route::get('add_to_cart/{id}',[HomeController::class,'add_to_cart'])->middleware(['auth', 'verified'])->name('add_to_cart');
route::get('my_cart',[HomeController::class,'my_cart'])->middleware(['auth', 'verified'])->name('my_cart');
route::delete('remove_from_cart/{id}',[HomeController::class,'remove_from_cart'])->name('remove_from_cart')->middleware(['auth', 'verified']);

//order
route::get('confirm_order',[HomeController::class,'confirm_order'])->name('confirm_order')->middleware(['auth', 'verified']);
route::get('view_orders',[AdminController::class,'view_orders'])->name('view_orders')->middleware('auth','admin');
route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->name('on_the_way')->middleware('auth','admin');
route::get('delivered/{id}',[AdminController::class,'delivered'])->name('delivered')->middleware('auth','admin');
route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->name('print_pdf  ')->middleware('auth','admin');
route::get('my_orders',[HomeController::class,'my_orders'])->middleware(['auth', 'verified'])->name('my_cart');


Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});
