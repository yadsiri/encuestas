<?php

namespace App\Http\Controllers;
use App\Models\Encuesta;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encuestas = Encuesta::all();
        return view('encuestas.index', compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('encuestas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);
    
        Encuesta::create($request->all());
    
        return redirect()->route('encuestas.index')
                         ->with('success', 'Encuesta creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encuesta = Encuesta::find($id);
        return view('encuestas.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encuesta = Encuesta::find($id);
        return view('encuestas.edit', compact('encuesta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);
    
        $encuesta = Encuesta::find($id);
        $encuesta->update($request->all());
    
        return redirect()->route('encuestas.index')
                         ->with('success', 'Encuesta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
    
        return redirect()->route('encuestas.index')
                         ->with('success', 'Encuesta eliminada con éxito');
    }
}
