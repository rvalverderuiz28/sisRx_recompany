<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('proyectos.index');
    }

    public function misproyectos()
    {
        return view('proyectos.misproyectos');
    }

    public function proyectosejecucion()
    {
        return view('proyectos.proyectosejecucion');
    }

    public function proyectosterminados()
    {
        return view('proyectos.proyectosterminados');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::select('id', 
                                'tipo_documento',
                                'numero_documento',
                                'razon_social', 
                                'direccion', 
                                'contacto', 
                                'celular',
                                'correo',
                                DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as fecha_creacion'),
                                'estado')
                            ->where('estado', '1')
                            ->get();

        $users = User::pluck('nombre', 'id');

        $estados = Estado::pluck('nombre', 'id');
        
        return view('proyectos.create', compact('clientes', 'users', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'nombre' => 'required'
        ]);

        $proyecto = Proyecto::create([
            'nombre' => $request->nombre,
            'cliente_id' => $request->cliente_id,
            'user_id' => $request->user_id,
            'estado_id' => '1',
            'presupuesto' => $request->presupuesto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => '1'
        ]);

        return redirect()->route('proyectos.index')->with('info', 'registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showId(Request $request)
    {
        // return view('estados.show', compact('estado'));
        if (!$request->proyecto_id) {
            $html='';
        } else {
            $data = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
                    ->join('users as u', 'proyectos.user_id', 'u.id')
                    ->join('estados as e', 'proyectos.estado_id', 'e.id')
                    ->select('proyectos.id', 
                        'proyectos.nombre',
                        'c.razon_social as clientes',
                        'u.nombre as users',
                        'e.nombre as condicion',
                        'proyectos.presupuesto',
                        DB::raw('DATE_FORMAT(proyectos.fecha_inicio, "%d/%m/%Y") as fecha_inicio'),
                        DB::raw('DATE_FORMAT(proyectos.fecha_fin, "%d/%m/%Y") as fecha_fin'),
                        DB::raw('DATE_FORMAT(proyectos.created_at, "%d/%m/%Y") as fecha_creacion'),
                        'proyectos.estado')
            ->where('proyectos.estado','1')
            ->where('proyectos.id',$request->proyecto_id)
            ->get();

            $html=$data;
        }
        return response()->json(['html' => $html]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $clientes = Cliente::select('id', 
                                'tipo_documento',
                                'numero_documento',
                                'razon_social', 
                                'direccion', 
                                'contacto', 
                                'celular',
                                'correo',
                                DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as fecha_creacion'),
                                'estado')
                            ->where('estado', '1')
                            ->get();

        $users = User::pluck('nombre', 'id');

        $estados = Estado::pluck('nombre', 'id');

        return view('proyectos.edit', compact('proyecto', 'clientes', 'users', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([            
            'nombre' => 'required'
        ]);

        $proyecto->update([
            'nombre' => $request->nombre,
            'cliente_id' => $request->cliente_id,
            'user_id' => $request->user_id,
            'estado_id' => $request->estado_id,
            'presupuesto' => $request->presupuesto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin            
        ]);

        return redirect()->route('proyectos.index')->with('info', 'actualizado');
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
            $proyecto_id=$request->hiddenID;
            
            $proyecto = Proyecto::where('id', $proyecto_id)->first();    
            $proyecto->update([            
                'estado' => '0'
            ]);
        }
        return response()->json(['html' => $html]);
    }
}
