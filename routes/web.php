<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\ManageController;
use App\Http\Controllers\admin\SignageController;
use App\Http\Controllers\admin\PlaylistController;
use App\Http\Controllers\admin\TermController;

    Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');

    Route::group(['prefix' => 'admin'],function(){
    Route::get('/login',[UserController::class,'login']);
    Route::post('/login',[UserController::class,'post_login'])->name('admin.login');

    Route::get('/',[AdminController::class,'index'])->name('admin.home');
    Route::get('user/add',[UsersController::class,'add']);
    Route::post('/user/store',[UsersController::class,'store'])->name('admin.user.store');
    Route::get('/user/list',[UsersController::class,'user_list'])->name('admin.user.list');
    Route::get('user/{id}/active',[UsersController::class,'active'])->name('admin.user.active');
    Route::get('user/{id}/deactive',[UsersController::class,'deactive'])->name('admin.user.deactive');
    Route::get('/user/{id}/edit',[UsersController::class,'user_edit'])->name('admin.user.edit');
    Route::get('/user/{id}/delete',[UsersController::class,'delete'])->name('admin.user.delete');
    Route::get('/user/{id}/update',[UsersController::class,'update'])->name('admin.user.update');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('profile_update/{id}/',[AdminController::class,'profile_update'])->name('admin.profile_update');
});
//SignageList........../
    Route::controller(SignageController::class)->prefix('admin')->as('admin.')->group(function(){
    Route::get('signage/add',[SignageController::class,'add']);
    Route::get('signage/list',[SignageController::class,'signage_list'])->name('signage.list');
    Route::post('signage/store',[SignageController::class,'store'])->name('signage.store');
    Route::get('/signage/{id}/edit',[SignageController::class,'signage_edit'])->name('signage.edit');
    Route::post('/signage/{id}/update',[SignageController::class,'signage_update'])->name('signage.update');
    Route::get('/signage/{id}/delete',[SignageController::class,'signage_delete'])->name('signage.delete'); 
    Route::get('/signage/{id}/live',[SignageController::class,'live'])->name('signage.live'); 
    Route::get('/signage/{id}/offline',[SignageController::class,'offline'])->name('signage.offline');
    Route::get('/signage/{id}/active',[SignageController::class,'active'])->name('signage.active');
    Route::get('/signage/{id}/deactive',[SignageController::class,'deactive'])->name('signage.deactive');
    Route::get('/signage/{id}/edit_schedule',[SignageController::class,'edit_schedule'])->name('signage.edit_schedule');
    Route::post('/signage/{id}/edit_update',[SignageController::class,'edit_update'])->name('signage.edit_update');
    Route::get('/signage/{id}/preview_signage',[SignageController::class,'preview_signage'])->name('signage.preview_signage');
});
//PlayList............/
    Route::controller(PlaylistController::class)->prefix('admin')->as('admin.')->group(function(){
    Route::get('/playlist/add',[PlaylistController::class,'add'])->name('playlist.add');
    Route::get('/playlist/list',[PlaylistController::class,'play_list'])->name('playlist.list');
    Route::post('/playlist/store', [PlaylistController::class, 'store'])->name('playlist.store');
    Route::get('/playlist/{id}/edit',[PlaylistController::class,'list_edit'])->name('playlist.edit');
    Route::get('/playlist/{id}/delete',[PlaylistController::class,'list_delete'])->name('playlist.delete');
    Route::post('/playlist/{id}/update',[PlaylistController::class,'update'])->name('playlist.update');
    Route::get('/media/{id}/list',[PlaylistController::class,'media_list'])->name('media.list');
    Route::get('/media/{id}/delete',[PlaylistController::class,'play_delete'])->name('media.delete');
});
//Term & Conditions......../
    Route::controller(TermController::class)->prefix('admin')->as('admin.')->group(function(){
    Route::get('term&condition/add',[TermController::class,'add']);
    Route::get('/term&condition/term_condition',[TermController::class,'term_list'])->name('term&condition.term_condition');
    Route::post('term&condition/store',[TermController::class,'store'])->name('term&condition.store');
    Route::get('/term&condition/{id}/edit',[TermController::class,'term_edit'])->name('term&condition.edit');
    Route::get('/term&condition/{id}/delete',[TermController::class,'term_delete'])->name('term&condition.delete');
    Route::post('/term&condition/{id}/update',[TermController::class,'term_update'])->name('term&condition.update');
});