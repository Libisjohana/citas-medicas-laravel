<?php

namespace App\Http\Controllers;

use App\Models\Eps;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.eps.index')->only('index');
        $this->middleware('can:admin.eps.destroy')->only('destroy');
        $this->middleware('can:admin.eps.create')->only('create','store');
        $this->middleware('can:admin.eps.edit')->only('edit','update'); 
    }
    public function index()
    {
        $eps = Eps::where('activo',1)->paginate(7);
        return view('eps.index',compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre'=>'required']);
        Eps::create($request->all());
        return redirect()->route('admin.eps.index')->with('success','La eps se creo con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function edit(Eps $ep)
    {
        
        return view('eps.edit',compact('ep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eps $ep)
    {
        //
        $request->validate(['nombre'=>'required']);
        $ep->update($request->all());
        return redirect()->route('admin.eps.index')->with('info','La eps se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eps  $eps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eps $ep)
    {
        $ep->delete();
        return redirect()->route('admin.eps.index')->with('success','La eps se elimino con exito');
    }
}
