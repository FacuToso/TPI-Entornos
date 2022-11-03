<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Materia;
use App\Models\Inscripcione;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::paginate();

        return view('consulta.index', compact('consultas'))
            ->with('i', (request()->input('page', 1) - 1) * $consultas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta = new Consulta();
        $materias = Materia::pluck('nombre', 'id');
        $users = User::pluck('name', 'id');
        return view('consulta.create', compact('consulta','materias','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Consulta::$rules);

        $consulta = Consulta::create($request->all());
        

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::find($id);
        $inscripciones = Inscripcione::where('id_consulta', $id)->get();
        return view('consulta.show', compact('consulta','inscripciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $materias = Materia::pluck('nombre', 'id');
        // get auth user information
        $user = auth()->user();
        // get users only with the specified role
        $users = User::where('role', 'DOCENTE')->pluck('name', 'id');
        // $users = User::pluck('name', 'id');

        return view('consulta.edit', compact('consulta','materias','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        request()->validate(Consulta::$rules);
        $materias = Materia::pluck('nombre', 'id');
        $users = User::where('role', 'DOCENTE')->pluck('name', 'id');

        $consulta->update($request->all());

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta updated successfully');
    }

    public function all(){
        $consultas = Consulta::all();
        return view('consulta.all', compact('consultas'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id)->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta deleted successfully');
    }

}
