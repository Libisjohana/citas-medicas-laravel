<?php

namespace App\Http\Controllers;

use App\Models\Eps;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.pacientes.index')->only('index');
        $this->middleware('can:admin.pacientes.destroy')->only('destroy');
        $this->middleware('can:admin.pacientes.create')->only('create','store');
        $this->middleware('can:admin.pacientes.edit')->only('edit','update'); 
    }
    use RegistersUsers;
    public function index()
    {
        $pacientes = Paciente::with(['eps'])->paginate(7);
     
        return view('pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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
        'apellido' => ['required', 'string',  'max:255', ],
        'telefono' => ['required', 'string',  'max:255', ],
        'hora_inicio' => ['required'],
        'hora_salida' => ['required'],
        'password' => ['required', 'string', 'min:8', 'confirmed']
    ]);
     $user =   User::create([
             'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
  ]);
        Paciente::create([
        'nombre'=>$request->input('name'),
        'apellido'=>$request->input('apellido'),
        'telefono'=>$request->input('telefono'),
        'hora_inicio'=>$request->input('hora_inicio'),
        'hora_salida'=>$request->input('hora_salida'),
        'id_usuario'=>$user->id
        ]);
        return redirect()->route('admin.pacientes.index')->with('success','La pacientes se creo con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        
        return view('pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
        $request->validate(['nombre'=>'required']);
        $paciente->update($request->all());
        return redirect()->route('admin.pacientes.index')->with('info','La pacientes se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('admin.pacientes.index')->with('success','La pacientes se elimino con exito');
    }
}
