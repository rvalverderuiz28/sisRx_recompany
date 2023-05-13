<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estados.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'nombre' => 'required'
        ]);

        $estado = Estado::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => '1'
        ]);

        return redirect()->route('estados.index')->with('info', 'registrado');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // return view('estados.show', compact('estado'));

        if (!$request->estado_id) {
            $html='';
        } else {
            $data = Estado::select('id', 
                    'nombre', 
                    'descripcion'
                    )
            ->where('estado','1')
            ->where('id',$request->estado_id)
            ->get();

            $html=$data;
        }
        return response()->json(['html' => $html]);

    }

    public function showId(Request $request)
    {
        // return view('estados.show', compact('estado'));

        if (!$request->estado_id) {
            $html='';
        } else {
            $data = Estado::select('id', 
                    'nombre', 
                    'descripcion'
                    )
            ->where('estado','1')
            ->where('id',$request->estado_id)
            ->get();

            $html=$data;
        }
        return response()->json(['html' => $html]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estado $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estado $estado)
    {
        $request->validate([            
            'nombre' => 'required'
        ]);

        $estado->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('estados.index')->with('info', 'actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyid(Request $request)
    {
        //VERIFICAR QUE EXISTE DATO
        if (!$request->hiddenID) {
            $html='';
        } else {
            $html='';
            $estado_id=$request->hiddenID;
            
            $estado = Estado::where('id', $estado_id)->first();    
            $estado->update([            
                'estado' => '0'
            ]);
        }
        return response()->json(['html' => $html]);
    }
}
