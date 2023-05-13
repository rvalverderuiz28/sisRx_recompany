<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([            
            'nombre' => 'required',
            'email' => 'required|unique:users|email',
            'prole_id' => 'required',
            'password' => [
                'required',
                'min:5', // debe tener al menos 6 caracteres
                //'regex:/[a-z]/', // debe contener al menos una letra minúscula
                //'regex:/[A-Z]/', // debe contener al menos una letra mayúscula
                //'regex:/[0-9]/' // debe contener al menos un dígito
            ],
            'confirm_password' => 'required|same:password'
        ]);

        $files = $request->file('imagen');
        $destinationPath = base_path('public/storage/users/');
        
        if(isset($files)){
            $file_name = Carbon::now()->second.$files->getClientOriginalName();
            $files->move($destinationPath , $file_name);
        }
        else{
            $file_name = 'logo.jpeg';
        }
        
        $user = User::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'direccion' => $request->direccion,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'sexo' => $request->sexo,
            'rol' => $request->role_name,
            'fecha_contratacion' => $request->fecha_contratacion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_photo_path' => $file_name,
            'estado' => '1'
        ]);

        $user->roles()->sync($request->role_id);

        return redirect()->route('users.index')->with('info', 'registrado');  
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
    public function edit(User $user)
    {
        $roles = Role::get();
        $sexos = [
            "MASCULINO" => 'MASCULINO',
            "FEMENINO" => 'FEMENINO'
        ];
        
        return view('usuarios.edit', compact('user', 'roles', 'sexos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $files = $request->file('imagen');
        $destinationPath = base_path('public/storage/users/');

        if(isset($files)){
            $file_name = Carbon::now()->second.$files->getClientOriginalName();
            $files->move($destinationPath , $file_name);
        }
        else{
            $file_name = $user->profile_photo_path;
        }

        $user->update([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'direccion' => $request->direccion,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'sexo' => $request->sexo,
            'fecha_contratacion' => $request->fecha_contratacion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'profile_photo_path' => $file_name,
        ]);

        if ($request->prole_id != "" && $request->role_name != "") {
            $user->roles()->sync($request->role_id);

            $user->update([
                'rol' => $request->role_name
            ]);
        }

        return redirect()->route('users.index')->with('info', 'actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyid(Request $request)
    {
        //VERIFICAR QUE EXISTE DATO
        if (!$request->hiddenID) {
            $html='';
        } else {
            $html='';
            $user_id=$request->hiddenID;
            
            $user = User::where('id', $user_id)->first();    
            $user->update([            
                'estado' => '0'
            ]);
        }
        return response()->json(['html' => $html]);
    }

    public function reset(User $user)
    {
        $user->update([
            'password' => bcrypt('123456789')
        ]);

        return redirect()->route('users.index')->with('info', 'reseteado');
    }
}
