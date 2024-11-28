<?php

namespace App\Http\Controllers\Logement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Logement\LogementFormRequest;
use App\Models\Logement;
use App\Models\Loption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("logement.logements.index", [
            'logements' => Logement::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $logement = new Logement();
        $logement->fill([
            'surface' => 400,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => "Casablanca",
            'postal_code' => 29876,
            'sold' => false,
        ]);
        return view('logement.logements.form', [
            'logement' =>  $logement,
            'loptions' =>  Loption::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LogementFormRequest  $request)
    {
        $logement = new Logement();
        $logement->title = $request->input('title');
        $logement->description = $request->input('description');
        $logement->surface = $request->input('surface');
        $logement->description = $request->input('description');
        $logement->rooms = $request->input('rooms');
        $logement->bedrooms = $request->input('bedrooms');
        $logement->floor = $request->input('floor');
        $logement->price = $request->input('price');
        $logement->city = $request->input('city');
        $logement->address = $request->input('address');
        $logement->postal_code = $request->input('postal_code');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/immobilier');
            $filename = explode('/immobilier', $path);
            $logement->image = $filename[1];
        }
        $logement->save();

        return to_route('admin.immobilier.index')->with('success', 'L article a bien été créé');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logement $logement)
    {
        return view('logement.logements.form', [
            'logement' =>  $logement,
            'loptions' =>  Loption::pluck('name', 'id')

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LogementFormRequest $request, Logement $logement)
    {

        $logement->update($request->validated());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/logement');
            $filename = explode('/logement', $path);
            $logement->image = $filename[1];
        }
        $logement->save();

        return to_route('logement.logement.index')->with('success', 'L\'article a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logement $logement)
    {
        $logement->delete();
        return to_route('logement.logement.index')->with('success', 'L article a bien été supprimé');
    }
}
