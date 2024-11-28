<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\OptionFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blogs.options.index', [
            'options' => Option::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Option();
        return view('blogs.options.form', [
            'option' =>  $property,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {

        $option = new Option();
        $option->category = $request->input('category');

        $option->save();
        return to_route('blogs.option.index')->with('success', 'La catégorie a bien été créé');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('blogs.options.form', [
            'option' =>  $option,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {

        $option->update($request->validated());
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images');
            $filename = explode('/images', $path);
            $option->photo = $filename[1];
        }
        $option->save();

        return to_route('blogs.option.index')->with('success', 'La catégorie a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('blogs.option.index')->with('success', 'La catégorie a bien été supprimé');
    }
}
