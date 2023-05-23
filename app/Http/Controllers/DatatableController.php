<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

class DatatableController extends Controller
{
    public function usuarios(){
        $usuarios = User::select('id', DB::raw("CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno) AS nombres"),
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
                        $btn = '<a href="'.route('users.show', $usuarios).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a> ';
                        $btn = $btn.'<a href="'.route('users.edit', $usuarios->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$usuarios->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Desactivar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function clientes(){
        $clientes = Cliente::select('id', 
                                    DB::raw("CONCAT(tipo_documento,': ',numero_documento) AS documento"),
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
                        $btn = '<a href="'.route('clientes.show', $clientes).'" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</a> ';//'.route('clientes.show', $clientes).'
                        $btn = $btn.'<a href="'.route('clientes.edit', $clientes->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
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
                        $btn = $btn.'<a href="'.route('estados.edit', $estados->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        // $btn = $btn.'<a href="" data-target="#modal-update" data-toggle="modal" data-update="'.$estados->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Editar</button></a>';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$estados->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function proyectos(){
        $proyectos = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
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
                            ->where('proyectos.estado', '1')
                            ->get();

        //return datatables()->collection($categoria_herramientas)->toJson();

        return Datatables::of($proyectos)
                    ->addIndexColumn()
                    ->addColumn('action', function($proyectos){    
                        $btn = '<a href="" data-target="#modal-show" data-toggle="modal" data-opcion="'.$proyectos->id.'"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button></a> ';
                        $btn = $btn.'<a href="'.route('proyectos.edit', $proyectos->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$proyectos->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function misproyectos(){
        $proyectos = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
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
                            ->where('proyectos.user_id', Auth::user()->id)
                            ->where('proyectos.estado', '1')
                            ->get();

        //return datatables()->collection($categoria_herramientas)->toJson();

        return Datatables::of($proyectos)
                    ->addIndexColumn()
                    ->addColumn('action', function($proyectos){    
                        $btn = '<a href="" data-target="#modal-show" data-toggle="modal" data-opcion="'.$proyectos->id.'"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button></a> ';
                        $btn = $btn.'<a href="'.route('proyectos.edit', $proyectos->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$proyectos->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function proyectosejecucion(){
        if(Auth::user()->rol == 'Administrador')
        {
            $proyectos = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
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
                                ->where('e.nombre', 'EN PROCESO')
                                ->where('proyectos.estado', '1')
                                ->get();
        }
        else{
            $proyectos = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
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
                                ->where('e.nombre', 'EN PROCESO')
                                ->where('proyectos.user_id', Auth::user()->id)
                                ->where('proyectos.estado', '1')
                                ->get();
        }

        return Datatables::of($proyectos)
                    ->addIndexColumn()
                    ->addColumn('action', function($proyectos){    
                        $btn = '<a href="" data-target="#modal-show" data-toggle="modal" data-opcion="'.$proyectos->id.'"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button></a> ';
                        $btn = $btn.'<a href="'.route('proyectos.edit', $proyectos->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$proyectos->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function proyectosterminados(){
        if(Auth::user()->rol == 'Administrador')
        {
            $proyectos = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
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
                                ->where('e.nombre', 'TERMINADO')
                                ->where('proyectos.estado', '1')
                                ->get();
        }
        else{
            $proyectos = Proyecto::join('clientes as c', 'proyectos.cliente_id', 'c.id')
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
                                ->where('e.nombre', 'TERMINADO')
                                ->where('proyectos.user_id', Auth::user()->id)
                                ->where('proyectos.estado', '1')
                                ->get();
        }

        return Datatables::of($proyectos)
                    ->addIndexColumn()
                    ->addColumn('action', function($proyectos){    
                        $btn = '<a href="" data-target="#modal-show" data-toggle="modal" data-opcion="'.$proyectos->id.'"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button></a> ';
                        $btn = $btn.'<a href="'.route('proyectos.edit', $proyectos->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a> ';
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$proyectos->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
}
