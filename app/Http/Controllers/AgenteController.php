<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Http\Requests\StoreAgenteRequest;
use App\Http\Requests\UpdateAgenteRequest;

class AgenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = Agente::all();
        return response()->json($lista);
    }


    public function store(StoreAgenteRequest $request)
    {
        $agente = Agente::create($request->only(['nome', 'matricula']));
        return response()->json($agente);

    }
 
    public function show(Agente $agente)
    {
        return response()->json($agente);
    }
    
    public function update(UpdateAgenteRequest $request, Agente $agente)
    {
        $agente->update($request->only(['nome', 'matricula']));
        return response()->json($agente);
    }
    
    public function destroy(Agente $agente)
    {
        $agente = $agente->delete();
        return response()->json($agente);
    }
}
