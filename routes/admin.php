<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'index'])
    ->middleware('can:admin.home')
    ->name('admin.home');

Route::resource('/categories', CategoryController::class)
    ->except('show')
    ->names('admin.categories');

Route::resource('/tags', TagController::class)
    ->except('show')
    ->names('admin.tags');

Route::resource('/posts', PostController::class)->names('admin.posts');

Route::resource('/users', UserController::class)
    ->only('index','edit','update', 'destroy')
    ->names('admin.users');

Route::resource('/roles', RoleController::class)
->names('admin.roles');




