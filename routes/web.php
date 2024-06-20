<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Auth;
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




Route::get('/newGroup', function () {
    return view('newgroup');
});

Route::get('/', [App\Http\Controllers\GroupController::class, 'index', ])->name('welcome');

Route::get('/group', [App\Http\Controllers\GroupController::class, 'showGroup'])->name('group.view');

Route::get('/group/updates', [App\Http\Controllers\GroupController::class, 'updates'])->name('group.updates');
Route::get('/group/visit', [App\Http\Controllers\GroupController::class, 'visit'])->name('group.visit');
Route::get('/group/members', [App\Http\Controllers\GroupController::class, 'members'])->name('group.members');

Route::get('/update/updates', [App\Http\Controllers\UpdateController::class, 'updates'])->name('update.updates');

Route::get('/visit/visits', [App\Http\Controllers\VisitController::class, 'visits'])->name('visit.visits');

Auth::routes();

Route::resource('groups', GroupController::class);
Route::resource('updates', UpdateController::class);
Route::resource('visits', VisitController::class);

Route::post('/add-member', [MemberController::class, 'addMember'])->name('addMember');








