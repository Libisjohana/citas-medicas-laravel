<?php

namespace App\Http\Controllers;

use App\Models\Eps;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.medicos.index')->only('index');
        $this->middleware('can:admin.medicos.destroy')->only('destroy');
        $this->middleware('can:admin.medicos.create')->only('create','store');
        $this->middleware('can:admin.medicos.edit')->only('edit','update'); 
    }
    use RegistersUsers;
    public function index()
    {
        $medicos = Medico::paginate(7);
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'hora_inicio' => ['required'],
            'hora_salida' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ])->assignRole('Medico');
        Medico::create([
            'nombre' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'telefono' => $request->input('telefono'),
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_salida' => $request->input('hora_salida'),
            'id_usuario' => $user->id,
        ]);
        return redirect()->route('admin.medicos.index')->with('success', 'El medicos se creo con exito');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $medicos
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {

        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $medicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        //
        $request->validate(['nombre' => 'required']);
        $medico->update($request->all());
        return redirect()->route('admin.medicos.index')->with('info', 'El medicos se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $medicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();
        return redirect()->route('admin.medicos.index')->with('success', 'El medicos se elimino con exito');
    }
}
