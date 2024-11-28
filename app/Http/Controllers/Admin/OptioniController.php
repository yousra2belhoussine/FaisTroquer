<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptioniFormRequest;
use App\Http\Requests\Blog\OptionFormRequest;
use App\Models\Optioni;
use Illuminate\Http\Request;

class OptioniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.optionis.index", [
            'optionis' => Optioni::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $optioni = new Optioni();
        return view('admin.optionis.form', [
            'optioni' =>  $optioni,
            // 'loptions' =>  Loption::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptioniFormRequest $request, Optioni $optioni)
    {
        $optioni = new Optioni();
        $optioni->name = $request->input('name');
        $optioni->save();

        return to_route('admin.optioni.index')->with('success', 'L\'option a bien été créé');
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
    public function edit(Optioni $optioni)
    {
        return view('admin.optionis.form', [
            'optioni' =>  $optioni,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptioniFormRequest $request, Optioni $optioni)
    {
        $optioni->update($request->validated());
        $optioni->save();

        return to_route('admin.optioni.index')->with('success', 'L\'option a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Optioni $optioni)
    {
        $optioni->delete();
        return to_route('admin.optioni.index')->with('success', 'L\'option a bien été supprimé');
    }
}
