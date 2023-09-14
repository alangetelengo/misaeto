<?php

use Illuminate\Support\Facades\Route;
use Modules\Commerce\Http\Controllers\CommandeClientController;
use Modules\Commerce\Http\Controllers\ProduitController;

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

Route::prefix('commerce')->group(function() {
    Route::get('/', 'CommerceController@index');
});

Route::prefix('produit')->group(function() {
    Route::get('/', [ProduitController::class,'index'])->name('produit.index');
    Route::get('edit/{id}', [ProduitController::class,'edit'])->name('produit.edit');
    Route::put('update/{id}', [ProduitController::class,'update'])->name('produit.update');
    // Route::post('storecommandeClient', [ProduitController::class,'storeCommandeClient'])->name('produit.commande.store.client');
    Route::get('create', [ProduitController::class,'create'])->name('produit.create');
    Route::post('store', [ProduitController::class,'store'])->name('produit.store');
});


Route::prefix('commandeClient')->group(function(){
    Route::get('/', [CommandeClientController::class,'index'])->name('commandeClient.index');
    Route::get('show/{id}', [CommandeClientController::class,'show'])->name('commandeClient.show');
    Route::get('create', [CommandeClientController::class,'create'])->name('commandeClient.create');
    Route::post('store', [CommandeClientController::class,'store'])->name('commandeClient.store');
});
