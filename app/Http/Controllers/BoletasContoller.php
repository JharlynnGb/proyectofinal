<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloque;
use App\Models\Grados;
use App\Models\Seccion;
use App\Models\bimestres;
use App\Models\Boletas;
use App\Models\estudiantes;
use App\Models\User;
use App\Models\profesores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BoletasContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //esta clase lista mis bloques primaria y secundaria 

    public function index(Request $request)
    {

        $grados = Grados::all();
        $secciones = Seccion::all();
        $bimestres = bimestres::all();
        $bloques = Bloque::all();

        $bloqueSeleccionado = $request->get('bloques');
        $gradoSeleccionado = $request->get('grados');
        $seccionSeleccionada = $request->get('secciones');
        $busqueda = $request->get('busqueda');

        $estudiantes = Estudiantes::query();

        if ($bloqueSeleccionado != 0) {
            $estudiantes->where('Bloque', $bloqueSeleccionado);
        }

        if ($gradoSeleccionado != 0) {
            $estudiantes->where('Grado', $gradoSeleccionado);
        }

        if ($seccionSeleccionada != 0) {
            $estudiantes->where('Seccion', $seccionSeleccionada);
        }

        if (!empty($busqueda)) {
            $estudiantes->where(function ($query) use ($busqueda) {
                $query->where('dni', 'like', "%$busqueda%")
                    ->orWhere('Nombres', 'like', "%$busqueda%")
                    ->orWhere('Apellidos', 'like', "%$busqueda%");
            });
        }

        $estudiantes = $estudiantes->get();

        return view('pages.Boletas.bloques', compact('grados', 'secciones', 'bimestres', 'bloques', 'estudiantes'));
    }


    public function verBoleta()
    {
        // Obtén el usuario logueado
        $user = Auth::user();

        // Encuentra el estudiante asociado a ese usuario
        $estudiante = Estudiantes::where('User_id', $user->id)->first();

        if ($estudiante) {
            // Accede a las boletas asociadas a ese estudiante
            $boletas = $estudiante->boletas;

            return view('pages.Boletas.user-boletas', compact('boletas'));
        }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idEstudiantes = $request->input('selected_estudiantes', []);
        $idBimestres = $request->input('idBimestre', []);
        $boletas = $request->file('Boleta');

        // Verifica si los arreglos no sean null antes de contarlos
        if (!$idEstudiantes || !$idBimestres || !$boletas) {
            return back()->with('error', 'Los datos no están disponibles o no coinciden (marque el check)');
        }

        // Verifica si los arreglos tienen la misma cantidad de elementos
        if (count($idEstudiantes) !== count($idBimestres) || count($idEstudiantes) !== count($boletas)) {
            return back()->with('error', 'Los datos no coinciden (marque el check)');
        }

        // Obtén el profesor actualmente autenticado
        $user = Auth::user();
        if (!$user) {
            return back()->with('error', 'Debe estar autenticado como profesor');
        }

        $profesor = Profesores::where('User_id', $user->id)->first();
        if (!$profesor) {
            return back()->with('error', 'Usted no cuenta con el rol de Docente');
        }

        // Obtiene el ID del profesor
        $idProfesor = $profesor->id;

        foreach ($idEstudiantes as $key => $idEstudiante) {
            $boleta = $boletas[$key];

            if (!$boleta) {
                return back()->with('error', 'Falta un archivo de boleta');
            }

            // Valida los datos para un estudiante a la vez
            $validator = Validator::make([
                'idEstudiante' => $idEstudiante,
                'idBimestre' => $idBimestres[$key],
                'Boleta' => $boleta,
            ], [
                'idEstudiante' => 'required|integer',
                'idBimestre' => 'required|integer',
                'Boleta' => 'required|file|mimes:pdf',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Almacena la boleta en el sistema de archivos y la registra en la base de datos
            $nombreArchivo = $boleta->getClientOriginalName();
            $boleta->storeAs('public/boletas', $nombreArchivo);

            $boleta = new Boletas();
            $boleta->idEstudiante = $idEstudiante;
            $boleta->idProfesor = $idProfesor;
            $boleta->idBimestre = $idBimestres[$key];
            $boleta->Boleta = $nombreArchivo;
            $boleta->save();
        }

        return back()->with('succes', 'El registro fue exitoso');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
