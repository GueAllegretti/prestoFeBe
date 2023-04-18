<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

//rotta pubblica
Route::get('/', [PublicController::class, 'home'])->name('home'); //rotta per home
Route::get('/category/{category}/announcements', [PublicController::class, 'filtered'])->name('announcement.filtered'); //rotta per annunci filtrati
Route::get('/search', [PublicController::class, 'search'])->name('search'); //rotta per annunci cercati
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale'); //rotta traduzione locale

//rotta utente loggato
Route::get('/userList/{user}', [AnnouncementController::class, 'listByUser'])->name('userList'); //rotta per profilo utente
Route::get('/auth/join', [PublicController::class, 'join'])->name('auth.join');
Route::post('/auth/contactUs', [PublicController::class, 'contactUs'])->name('auth.contactUs'); //rotta per lavora con noi

//rotte annunci
Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index'); //rotta per tutti gli annunci
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create'); //rotta per creare annuncio
Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');

Route::post('/announcement/images/upload', [AnnouncementController::class, 'imageUpload'])->name('announcement.imageUpload'); //rotta per aggiungere immagini
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'imageRemove'])->name('announcement.imageRemove'); //rotta per rimuovere immagini
Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.getImages'); //rotta per mantenere immagini durante la validation

Route::get('/announcement/show/{announcement}/{title?}', [AnnouncementController::class, 'show'])->name('announcement.show'); //rotta per dettaglio annunci
Route::get('/announcement/edit/{announcement}', [AnnouncementController::class, 'edit'])->name('announcement.edit'); //rotta per modifica annunci
Route::put('/announcement/update/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update'); //rotta per salva modifica annunci
Route::delete('/announcement/destroy/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy'); //rotta per cancella annunci

//rotta revisor
Route::get('/revisor/home', [RevisorController::class, 'home'])->name('revisor.home');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::get('/revisor/refused', [RevisorController::class, 'refused'])->name('revisor.refused');
