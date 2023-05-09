<?php

namespace App\Http\Controllers;

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
                        $btn = $btn.'<a href="" data-target="#modal-delete" data-toggle="modal" data-delete="'.$usuarios->id.'"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Anular</button></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
}
