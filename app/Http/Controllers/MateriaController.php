<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

/**
 * Class MateriaController
 * @package App\Http\Controllers
 */
class MateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('security');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::paginate();

        return view('materia.index', compact('materias'))
            ->with('i', (request()->input('page', 1) - 1) * $materias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materia = new Materia();
        return view('materia.create', compact('materia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Materia::$rules);

        $materia = Materia::create($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = Materia::find($id);

        return view('materia.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);

        return view('materia.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Materia $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        request()->validate(Materia::$rules);

        $materia->update($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $materia = Materia::find($id)->delete();

        return redirect()->route('materias.index')
            ->with('success', 'Materia eliminada correctamente');
    }
}
