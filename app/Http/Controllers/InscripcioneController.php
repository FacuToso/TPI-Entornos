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

    public function __construct()
    {
        $this->middleware('security')->only('index');
        $this->middleware('security')->only('create');
        $this->middleware('security')->only('edit');
        $this->middleware('alumno');
    }

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

    public function misInscripciones($id)
    {
        // retrive inscripciones by alumno id
        $inscripciones = Inscripcione::where('id_alumno', $id)->paginate();
        // $inscripciones = Inscripcione::paginate();

        return view('inscripcione.index', compact('inscripciones'));
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
        $consultas = Consulta::pluck( 'nombre', 'id');

        // if id exist in the url, then we are editing
        // if ($id) {
        //     $consultas = Consultas::where('id', $id)->first();
        // }
        // else {
        //     $consultas = Consulta::pluck( 'nombre', 'id');
        // }


        // $consultas = Consulta::pluck('id_materia', 'id_profesor', 'fecha', 'tipo', 'lugar', 'id');
        // $consultas = Consulta::all();

        // $consultas = $consultas->map(function ($fecha, $key) {
        //     return $fecha . ' - ' . $key;
        // });
        return view('inscripcione.create', compact('inscripcione','users','consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function createAlum($id)
    {
        $inscripcione = new Inscripcione();
        // retrive current auth user id
        $user = auth()->user();
        $users = User::where('id', $user->id)->pluck('name', 'id');
        $consultas = Consulta::where('id', $id)->pluck( 'nombre', 'id'); 

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

        if (auth()->user()->role == 'ADMIN') {
            return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcion actualizada correctamente');
        }
        else{     
            return redirect()->route('misinscripciones', auth()->user()->id)
            ->with('success', 'Inscripcion actualizada correctamente');
        }
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

        if (auth()->user()->role == 'ADMIN') {
            return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcion actualizada correctamente');
        }
        else{     
            return redirect()->route('misinscripciones', auth()->user()->id)
            ->with('success', 'Inscripcion actualizada correctamente');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscripcione = Inscripcione::find($id)->delete();

        if (auth()->user()->role == 'ADMIN') {
            return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripcion eliminada correctamente');
        }
        else{     
            return redirect()->route('misinscripciones', auth()->user()->id)
            ->with('success', 'Inscripcion eliminada correctamente');
        }
    }
}
