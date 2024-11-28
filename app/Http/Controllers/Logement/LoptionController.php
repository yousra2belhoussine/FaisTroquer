<?php

namespace App\Http\Controllers\Logement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Logement\LoptionFormRequest;
use App\Models\Loption;
use Illuminate\Http\Request;

class LoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("logement.loptions.index", [
            'loptions' => Loption::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loption = new Loption();
        return view('logement.loptions.form', [
            'loption' =>  $loption
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoptionFormRequest $request)
    {
        $loption = new Loption();
        $loption->name = $request->input('name');
        $loption->save();
        return to_route('loption.loption.index')->with('success', 'L article a bien été créé');
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
    public function edit(Loption $loption)
    {
        return view('logement.loptions.form', [
            'loption' =>  $loption,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoptionFormRequest $request, Loption $loption)
    {
        $loption->update($request->validated());
        $loption->save();

        return to_route('loption.loption.index')->with('success', 'L\'option a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Loption $loption)
    {
        $loption->delete();
        return to_route('loption.loption.index')->with('success', 'L article a bien été supprimé');
    }
}
