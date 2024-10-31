<?php

namespace App\Http\Controllers;

use App\Services\Pokemon\GetPokemon;
use App\Services\Pokemon\ListPokemon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $nameFilter = $request->get('name');
        $pokemons = ListPokemon::execute($nameFilter);

        if ($pokemons === null) {
            return response()->json([
                "message" => "Pokémon not found"
            ], 404);
        }

        return $pokemons;
    }

    public function searchPokemon(Request $request, $id)
    {
        $pokemon = GetPokemon::execute($id);

        if ($pokemon === null) {
            return response()->json([
                "message" => "Pokémon not found"
            ], 404);
        }

        return $pokemon;
    }
}
