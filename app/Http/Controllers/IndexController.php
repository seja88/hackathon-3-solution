<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $searchString = $request->input('search_string');

        $query = Animal::query()
            ->select('animals.*')
            ->with('owner')
            ->with('image');

        if (isset($searchString)) {
            $query
                ->leftJoin('owners', 'animals.owner_id', 'owners.id')
                ->where('animals.name', 'like', $searchString .'%')
                ->orWhere('owners.surname', 'like', $searchString .'%');
        }

        $animals = $query
            ->orderBy('animals.name', 'asc')
            ->paginate(10);

        return view('index', compact('searchString', 'animals'));
    }
}
