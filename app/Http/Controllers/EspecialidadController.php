<?php

namespace App\Http\Controllers;

use App\Models\Eps;
use App\Models\Especialidad;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.especialidades.index')->only('index');
        $this->middleware('can:admin.especialidades.destroy')->only('destroy');
        $this->middleware('can:admin.especialidades.create')->only('create','store');
        $this->middleware('can:admin.especialidades.edit')->only('edit','update'); 
    }
    use RegistersUsers;
    public function index()
    {
        $especialidades = Especialidad::with(['medico'])->paginate(7);
        return view('especialidades.index',compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::pluck('nombre', 'id');;
        return view('especialidades.create',compact('medicos'));
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
        'nombre' => ['required', 'string', 'max:255'],
        'id_medico' => ['required'],
        
    ]);
    
        Especialidad::create($request->all());
        return redirect()->route('admin.especialidades.index')->with('success','La especialidad se creo con exito');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidad $especialidade)
    {
        $medicos = Medico::pluck('nombre', 'id');;
        return view('especialidades.edit',compact('especialidade','medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidad $especialidade)
    {
        //
        $request->validate(['nombre'=>'required']);
        $especialidade->update($request->all());
        return redirect()->route('admin.especialidades.index')->with('info','La especialidad se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidad $especialidade)
    {
        $especialidade->delete();
        return redirect()->route('admin.especialidades.index')->with('success','La especialidad se elimino con exito');
    }
}
