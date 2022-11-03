<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Materia;
use App\Models\Inscripcione;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class InscripcioneController
 * @package App\Http\Controllers
 */
class InscripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = Inscripcione::paginate();

        return view('inscripcione.index', compact('inscripciones'))
            ->with('i', (request()->input('page', 1) - 1) * $inscripciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscripcione = new Inscripcione();
        $users = User::pluck('name', 'id');
        // $consultas = Consulta::pluck( 'tipo', 'id');
        // $consultas = Consulta::pluck('id_materia', 'id_profesor', 'fecha', 'tipo', 'lugar', 'id');
        $consultas = Consulta::all();

        // $consultas = $consultas->map(function ($fecha, $key) {
        //     return $fecha . ' - ' . $key;
        // });
        return view('inscripcione.create', compact('inscripcione','users','consultas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inscripcione::$rules);

        $inscripcione = Inscripcione::create($request->all());

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscripcione = Inscripcione::find($id);

        return view('inscripcione.show', compact('inscripcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscripcione = Inscripcione::find($id);
        $users = User::pluck('name', 'id');
        // $consultas = Consulta::all();
        $consultas = Consulta::pluck('nombre', 'id');

        return view('inscripcione.edit', compact('inscripcione','users','consultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inscripcione $inscripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcione $inscripcione)
    {
        request()->validate(Inscripcione::$rules);

        $inscripcione->update($request->all());

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscripcione = Inscripcione::find($id)->delete();

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcione deleted successfully');
    }
}
