<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/pokemons', [HomeController::class, "index"])->name('api.index');
Route::get('/pokemons/{id}', [HomeController::class, "searchPokemon"])->name('api.searchPokemon');
