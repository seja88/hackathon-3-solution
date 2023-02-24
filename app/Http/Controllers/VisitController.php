<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function store(Request $request, $animalId)
    {
        $this->validate($request, [
            'happened_at' => 'required|date'
        ]);

        $visit = new Visit;

        $visit->happened_at = date('Y-m-d H:i:s', strtotime($request->input('happened_at')));
        $visit->animal_id = $animalId;
        $visit->report = $request->input('report');

        $visit->save();

        session()->flash('success_message', 'Success!');

        return redirect()->route('animal.show', $animalId);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'happened_at' => 'required|date'
        ]);

        $visit = Visit::findOrFail($id);

        $visit->happened_at = date('Y-m-d H:i:s', strtotime($request->input('happened_at')));
        $visit->report = $request->input('report');

        $visit->save();

        session()->flash('success_message', 'Success!');

        return redirect()->route('animal.show', $visit->animal->id);
    }
}
