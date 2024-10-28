<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
//rotta  homepage associata al Public controller
Route::get('/',[PublicController::class, 'homepage'])->name('homepage');
//rotta da associare al componente _locale per cambio lingua
Route::post('/lingua/{lang}/',[PublicController::class, 'setLanguage'])->name('setLocale');


//rotte della risorsa Articlecontroller
//rotta index in cui sono presenti tutti gli articoli creati
Route::get('/article/index',[ArticleController::class, 'index'])->name('article.index');
//rotta show per il dettaglio dell'articolo
Route::get('/show/article/{article}/',[ArticleController::class, 'show'])->name('article.show');
//rotta per la creazione dell'articolo
Route::get('/create',[ArticleController::class, 'create'])->name('article.create');
//rotta parametrica con gli articoli appartenenti ad ogni categoria
Route::get('/bycategory/{category}/',[ArticleController::class, 'bycategory'])->name('bycategory');

//rotte associate al RevisorController
Route::get('revisor/index',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
//rotta parametrica di accettazione di un articolo nel index revisor
Route::patch('/accept/{article}/',[RevisorController::class, 'accept'])->name('accept');
//rotta parametrica di rifiuto di un articolo nel index revisor
Route::patch('/reject/{article}/',[RevisorController::class, 'reject'])->name('reject');
//rotta per richiesta da parte di un utente di diventare revisore dove la funzione parte da un link nel footer 
Route::get('/revisor/request',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
//rendiamo effettivamente un utente revisore dove la funzione parte al clik di un link presente nella vista become-revisor  
Route::get('/make/revisor/{user}/',[RevisorController::class, 'makeRevisor'])->name('make.revisor');





