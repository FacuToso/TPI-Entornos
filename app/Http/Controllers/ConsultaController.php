<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Materia;
use App\Models\Inscripcione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Inscripciones;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{

    public function __construct()
    {
        $this->middleware('security')->only('index');
        $this->middleware('security')->only('create');
        $this->middleware('docente')->except('all');
        $this->middleware('alumno');
    }

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

    public function sendEmail($id){
       // send the email
        $consulta = Consulta::find($id);
        $inscripciones = Inscripcione::where('id_consulta', $id)->get();
        Mail::to(auth()->user()->email)->send(new Inscripciones($consulta, $inscripciones));

        return redirect()->route('misconsultas', auth()->user()->id)
            ->with('success', 'Mail Enviado correctamente');
    }

    public function misConsultas($id)
    {
        // retrive inscripciones by alumno id
        $consultas = Consulta::where('id_profesor', $id)->paginate();
        // $inscripciones = Inscripcione::paginate();

        return view('consulta.index', compact('consultas'));
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
        $users = User::where('role', 'DOCENTE')->pluck('name', 'id');
        return view('consulta.create', compact('consulta','materias','users'));
    }

    public function createMiConsulta($id)
    {
        $consulta = new Consulta();
        $materias = Materia::pluck('nombre', 'id');
        $users = User::where('id', $id)->pluck('name', 'id');
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
        
        if (auth()->user()->role == 'ADMIN') {
            return redirect()->route('consultas.index')
            ->with('success', 'Consultas created successfully');
        }
        else{     
            return redirect()->route('misconsultas', auth()->user()->id)
            ->with('success', 'Consultas created successfully');
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

        if ( auth()->user()->role == 'ADMIN') {
            $users = User::where('role', 'DOCENTE')->pluck('name', 'id');
        }
        else{
            $users = User::where('id', $user->id)->pluck('name', 'id');
        }

        // $users = User::where('role', 'DOCENTE')->pluck('name', 'id');
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

        if ( auth()->user()->role == 'ADMIN') {
            return redirect()->route('consultas.index')
            ->with('success', 'Consultas updated successfully');
        }
        else{
            return redirect()->route('misconsultas', auth()->user()->id)
            ->with('success', 'Consultas updated successfully');
        }
    }

    public function all(Request $request){
        $search = $request['search'] ?? '';
        if ($search != '') {
            $consultas = Consulta::whereHas('materia', function($query) use ($search){
                $query->where('nombre', 'like', '%'.$search.'%');
            })->paginate();
        }else{
            $consultas = Consulta::all();
        }
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

        if ( auth()->user()->role == 'ADMIN') {
            return redirect()->route('consultas.index')
            ->with('success', 'Consultas deleted successfully');
        }
        else{
            return redirect()->route('misconsultas', auth()->user()->id)
            ->with('success', 'Consultas deleted successfully');
        }
    }

}
