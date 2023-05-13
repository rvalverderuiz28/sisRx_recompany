<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class DatatableController extends Controller
{
    public function usuarios(){
        $usuarios = User::select('id', DB::raw("CONCAT('nombre',' ','apellido_paterno',' ','apellido_materno') AS nombres"),
                                                'direccion', 
                                                'dni', 
                                                'sexo', 
                                                'rol', 
                                                DB::raw('DATE_FORMAT(fecha_contratacion, "%d/%m/%Y") as fecha_contratacion'),
                                                DB::raw('DATE_FORMAT(fecha_nacimiento, "%d/%m/%Y") as fecha_nacimiento'),
                                                'email',
                                                'estado')
                                            ->where('estado', '1')
                                            ->get();

        //return datatables()->collection($categoria_herramientas)->toJson();

        return Datatables::of($usuarios)
                    ->addIndexColumn()
                    ->addColumn('action', function($usuarios){    
                        $btn='<a href="'.route('users.show', $usuarios).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a> ';
                        $btn=$btn.'<a href="'.route('users.edit', $usuarios->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$usuarios->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Desactivar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function clientes(){
        $clientes = Cliente::select('id', 
                                    DB::raw("CONCAT('tipo_documento',': ','numero_documento') AS documento"),
                                    'razon_social', 
                                    'direccion', 
                                    'contacto', 
                                    'celular',
                                    'correo',
                                    DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as fecha_creacion'),
                                    'estado')
                                ->where('estado', '1')
                                ->get();

        //return datatables()->collection($categoria_herramientas)->toJson();

        return Datatables::of($clientes)
                    ->addIndexColumn()
                    ->addColumn('action', function($clientes){    
                        $btn='<a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a> ';//'.route('clientes.show', $clientes).'
                        $btn=$btn.'<a href="'.route('clientes.edit', $clientes->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$clientes->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function estados(){
        $estados = Estado::select('id', 
                                'nombre',
                                'descripcion',
                                DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as fecha_creacion'),
                                'estado')
                            ->where('estado', '1')
                            ->get();

        //return datatables()->collection($categoria_herramientas)->toJson();

        return Datatables::of($estados)
                    ->addIndexColumn()
                    ->addColumn('action', function($estados){    
                        // $btn='<a href="'.route('estados.show', $estados).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a> ';
                        $btn = '<a href="" data-target="#modal-show" data-toggle="modal" data-opcion="'.$estados->id.'"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button></a> ';
                        $btn=$btn.'<a href="'.route('estados.edit', $estados->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        // $btn = $btn.'<a href="" data-target="#modal-update" data-toggle="modal" data-update="'.$estados->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Editar</button></a>';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$estados->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

}
