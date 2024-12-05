<?php

namespace App\Http\Controllers;

use App\Models\Pepper;
use App\Http\Requests\StorePepperRequest;
use App\Http\Requests\UpdatePepperRequest;
use Illuminate\Support\Facades\Storage;

class PepperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peppers = Pepper::all();
        return view('peppers.index', [
            'peppers' => $peppers,
            'randomPeppers' => $peppers->random(4)
        ]);
    }

    public function index2()
    {
        $peppers = Pepper::all();
        return view('peppers.all_peppers', ['peppers' => $peppers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peppers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePepperRequest $request)
    {
        $input = $request->all();

        // Obsługa przesyłania obrazu
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('img', 'public');
            $input['img'] = $imagePath;
        }

        // Tworzenie nowego rekordu
        Pepper::create($input);

        return redirect()->route('peppers.all_peppers')->with('success', 'Nowa papryka została dodana.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('peppers.show', [
            'pepper' => Pepper::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pepper $pepper)
    {
        return view('peppers.edit', ['pepper' => $pepper]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePepperRequest $request, Pepper $pepper)
    {
        $input = $request->all();

        // Obsługa przesyłania obrazu
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('img', 'public');
            $input['img'] = $imagePath;

            // Usuwanie poprzedniego obrazu
            if ($pepper->img && Storage::disk('public')->exists($pepper->img)) {
                Storage::disk('public')->delete($pepper->img);
            }
        }

        // Aktualizacja rekordu
        $pepper->update($input);

        return redirect()->route('peppers.show', $pepper->id)->with('success', 'Papryka została zaktualizowana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pepper $pepper)
    {
        // Usuwanie obrazu z systemu plików
        if ($pepper->img && Storage::disk('public')->exists($pepper->img)) {
            Storage::disk('public')->delete($pepper->img);
        }

        // Usuwanie rekordu z bazy danych
        $pepper->delete();

        return redirect()->route('peppers.all_peppers')->with('success', 'Papryka została usunięta.');
    }
}
