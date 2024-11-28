<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blogs.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
    public function All()
    {
        $properties = Property::all();
        return view('blogs.all', compact('properties'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        // dd();
        return view('blogs.properties.form', [
            'property' =>  $property,
            'options' =>  Option::pluck('category', 'id'),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {

        $article = new Property();
        $article->options()->sync($request->validated('category'));
        $article->titre = $request->input('titre');
        $article->auteur = $request->input('auteur');
        $article->contenu = $request->input('contenu');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images');
            $filename = explode('/images', $path);
            $article->photo = $filename[1];
        }
        $article->save();
        return to_route('blogs.property.index')->with('success', 'L article a bien été créé');
    }





    public function show(Property $property)
    {

        return view('blogs.properties.show', compact('property'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('blogs.properties.form', [
            'property' =>  $property,
            'options' =>  Option::pluck('category', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {

        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images');
            $filename = explode('/images', $path);
            $property->photo = $filename[1];
        }
        $property->save();

        return to_route('blogs.property.index')->with('success', 'L\'article a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('blogs.property.index')->with('success', 'L article a bien été supprimé');
    }
}
