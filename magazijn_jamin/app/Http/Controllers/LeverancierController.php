<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;

class LeverancierController extends Controller
{
    public function index()
    {
        $leveranciers = Leverancier::all();

        return view('leverancier.index', compact('leveranciers'));
    }

    public function create()
    {
        return view('leverancier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Naam' => 'required|string|max:60',
            'Contactpersoon' => 'required|string|max:60',
            'Leveranciernummer' => 'required|string|max:11',
            'Mobiel' => 'required|string|max:11',
            'IsActief' => 'required|boolean',
            'Opmerkingen' => 'nullable|string|max:255',
            'DatumAangemaakt' => 'required|date',
            'DatumGewijzigd' => 'required|date',
        ]);

        Leverancier::create($request->all());

        return redirect()->route('leverancier.index')
            ->with('success', 'Leverancier created successfully.');
    }

    public function show($id)
    {
        $leverancier = Leverancier::find($id);
        return view('leverancier.show', compact('leverancier'));
    }

    public function edit($id)
    {
        $leverancier = Leverancier::find($id);
        return view('leverancier.edit', compact('leverancier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Naam' => 'required|string|max:60',
            'Contactpersoon' => 'required|string|max:60',
            'Leveranciernummer' => 'required|string|max:11',
            'Mobiel' => 'required|string|max:11',
            'IsActief' => 'required|boolean',
            'Opmerkingen' => 'nullable|string|max:255',
            'DatumAangemaakt' => 'required|date',
            'DatumGewijzigd' => 'required|date',
        ]);

        $leverancier = Leverancier::find($id);
        $leverancier->update($request->all());

        return redirect()->route('leverancier.index')
            ->with('success', 'Leverancier updated successfully');
    }

    public function destroy($id)
    {
        $leverancier = Leverancier::find($id);
        $leverancier->delete();

        return redirect()->route('leverancier.index')
            ->with('success', 'Leverancier deleted successfully');
    }
}
