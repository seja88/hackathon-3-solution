<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Visit;

class AnimalController extends Controller
{
    public function show($animalId, $visitId = null)
    {
        $animal = Animal::findOrFail($animalId);

        if (isset($visitId)) {
            $visit = Visit::findOrFail($visitId);
        } else {
            $visit = new Visit;
        }

        return view('animal.show', compact('animal','visit'));
    }
}
