<?php
  
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\UserController;
  
  Route::get('display-user', [UserController::class, 'index'])->name('user.index');
  Route::post('display-user', [UserController::class, 'updateIP'])->name('user.updateIP');