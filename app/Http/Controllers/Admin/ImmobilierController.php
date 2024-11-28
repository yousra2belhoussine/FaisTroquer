<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImmobilierFormRequest;
use App\Models\Immobilier;
use App\Models\Optioni;
use Illuminate\Http\Request;

class ImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.immobiliers.index", [
            'immobiliers' => Immobilier::orderBy('created_at', 'desc')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $immobilier = new Immobilier();
        $immobilier->fill([
            'surface' => 400,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => "Casablanca",
            'postal_code' => 29876,
            'sold' => false,
        ]);
        return view('admin.immobiliers.form', [
            'immobilier' =>  $immobilier,
            'optionis' => Optioni::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImmobilierFormRequest $request, Immobilier $immobilier)
    {
        $immobilier = new Immobilier();
        $immobilier->title = $request->input('title');
        $immobilier->description = $request->input('description');
        $immobilier->surface = $request->input('surface');
        $immobilier->description = $request->input('description');
        $immobilier->rooms = $request->input('rooms');
        $immobilier->bedrooms = $request->input('bedrooms');
        $immobilier->floor = $request->input('floor');
        $immobilier->price = $request->input('price');
        $immobilier->city = $request->input('city');
        $immobilier->address = $request->input('address');
        $immobilier->postal_code = $request->input('postal_code');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/immobilier');
            $filename = explode('/immobilier', $path);
            $immobilier->image = $filename[1];
        }
        $immobilier->save();

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
    public function edit(Immobilier $immobilier)
    {
        return view('admin.immobiliers.form', [
            'immobilier' =>  $immobilier,
            'optionis' => Optioni::pluck('name', 'id'),




        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImmobilierFormRequest $request, Immobilier $immobilier)
    {

        $immobilier->update($request->validated());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/immobilier');
            $filename = explode('/immobilier', $path);
            $immobilier->image = $filename[1];
        }
        $immobilier->save();

        return to_route('admin.immobilier.index')->with('success', 'L\'article a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Immobilier $immobilier)
    {
        $immobilier->delete();
        return to_route('admin.immobilier.index')->with('success', 'L article a bien été supprimé');
    }
}
