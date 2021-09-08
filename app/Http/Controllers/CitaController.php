<?php

namespace App\Http\Controllers;

use App\Models\Cita;

use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Paciente;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.citas.index')->only('index');
        $this->middleware('can:admin.citas.destroy')->only('destroy');
        $this->middleware('can:admin.citas.create')->only('create','store');
        $this->middleware('can:admin.citas.edit')->only('edit','update'); 
    }
    use RegistersUsers;
    public function index()
    {   
        
        $user = Auth::user();
        $role = $user->roles()->first()->name;

        if($role == 'Paciente'){
            $paciente = Paciente::where('id_usuario',$user->id)->first();
           
            $citas = Cita::with(['paciente','especialidad'])->where('cod_paciente',$paciente->id)->paginate(7);
        }else if($role == 'Medico'){
            $medico = Medico::where('id_usuario',$user->id)->first();
            $especialidad = Especialidad::where('id_medico',$medico->id)->first();
            $citas = Cita::with(['paciente','especialidad'])->where('id_especialidad',$especialidad->id)->paginate(7);
        }else{
            
            $citas = Cita::with(['paciente','especialidad'])->paginate(7);
        }
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::pluck('nombre', 'id');
        return view('citas.create', compact('especialidades'));
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
            'fecha' => ['required',  'unique:citas'],
           
            'id_especialidad' => ['required'],
        ]);
        $user = Auth::user();
        $paciente = Paciente::where('id_usuario', $user->id)->first();
        Cita::create([
            'fecha' => $request->input('fecha'),
            'id_especialidad' => $request->input('id_especialidad'),
            'cod_paciente' => $paciente->id,

        ]);
        return redirect()->route('admin.citas.index')->with('success', 'La citas se creo con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        $especialidades = Especialidad::pluck('nombre', 'id');
        return view('citas.edit', compact('cita', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
        $request->validate(['nombre' => 'required']);
        $cita->update($request->all());
        return redirect()->route('admin.citas.index')->with('info', 'La citas se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('admin.citas.index')->with('success', 'La citas se elimino con exito');
    }
}
