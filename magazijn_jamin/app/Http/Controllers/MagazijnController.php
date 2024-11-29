<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazijn;

class MagazijnController extends Controller
{
    public function index()
    {
        $magazijn = Magazijn::all();
        return view('magazijn.index', compact('magazijn'));
    }

    public function create()
    {
        return view('magazijn.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductId' => 'required',
            'VerpakkingsEenheid' => 'required',
            'AantalAanwezig' => 'required',
            'IsActief' => 'required',
            'Opmerkingen' => ' ',
            'DatumAangemaakt' => ' ',
            'DatumGewijzigd' => ' '
        ]);

        Magazijn::create($request->all());

        return redirect()->route('magazijn.index')
            ->with('success', 'Magazijn created successfully.');
    }

    public function show($id)
    {
        $magazijn = Magazijn::find($id);
        return view('magazijn.show', compact('magazijn'));
    }

    public function edit($id)
    {
        $magazijn = Magazijn::find($id);
        return view('magazijn.edit', compact('magazijn'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductId' => 'required',
            'VerpakkingsEenheid' => 'required',
            'AantalAanwezig' => 'required',
            'IsActief' => 'required',
            'Opmerkingen' => ' ',
            'DatumAangemaakt' => ' ',
            'DatumGewijzigd' => ' '
        ]);

        $magazijn = Magazijn::find($id);
        $magazijn->update($request->all());

        return redirect()->route('magazijn.index')
            ->with('success', 'Magazijn updated successfully');
    }

    public function destroy($id)
    {
        $magazijn = Magazijn::find($id);
        $magazijn->delete();

        return redirect()->route('magazijn.index')
            ->with('success', 'Magazijn deleted successfully');
    }

   
}
