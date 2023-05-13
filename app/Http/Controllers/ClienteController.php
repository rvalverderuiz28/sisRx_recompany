<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roles = Role::get();
        $tipos = [
            "RUC" => 'RUC',
            "DNI" => 'DNI',
            "CE" => 'CE',
            "PASAPORTE" => 'PASAPORTE'
        ];

        return view('clientes.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'numero_documento' => 'required|unique:clientes'
        ]);
// return $request;
        $cliente = Cliente::create([
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'razon_social' => $request->razon_social,
            'direccion' => $request->direccion,
            'contacto' => $request->contacto,
            'celular' => $request->celular,
            'correo' => $request->correo,
            'estado' => '1'
        ]);

        return redirect()->route('clientes.index')->with('info', 'registrado');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $tipos = [
            "RUC" => 'RUC',
            "DNI" => 'DNI',
            "CE" => 'CE',
            "PASAPORTE" => 'PASAPORTE'
        ];

        return view('clientes.edit', compact('cliente', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([            
            'numero_documento' => 'required'
        ]);

        $cliente->update([
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'razon_social' => $request->razon_social,
            'direccion' => $request->direccion,
            'contacto' => $request->contacto,
            'celular' => $request->celular,
            'correo' => $request->correo
        ]);

        return redirect()->route('clientes.index')->with('info', 'actualizado');
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
            $cliente_id=$request->hiddenID;
            
            $cliente = Cliente::where('id', $cliente_id)->first();    
            $cliente->update([            
                'estado' => '0'
            ]);
        }
        return response()->json(['html' => $html]);
    }
}
