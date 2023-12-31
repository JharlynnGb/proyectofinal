<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloque;
use App\Models\Boletas;
use App\Models\estudiantes;
use App\Models\Grados;
use App\Models\Seccion;
use App\Models\User;
use App\Models\bimestres;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $grados = Grados::all();
        $secciones = Seccion::all();
        $bloques = Bloque::all();

        $bloqueSeleccionado = $request->get('bloques');
        $gradoSeleccionado = $request->get('grados');
        $seccionSeleccionada = $request->get('secciones');
        $busqueda = $request->get('busqueda');

        $estudiantes = Estudiantes::query()
            ->with('grados', 'secciones', 'bloques') // Carga las relaciones
            ->when($bloqueSeleccionado != 0, function ($query) use ($bloqueSeleccionado) {
                return $query->where('Bloque', $bloqueSeleccionado);
            })
            ->when($gradoSeleccionado != 0, function ($query) use ($gradoSeleccionado) {
                return $query->where('Grado', $gradoSeleccionado);
            })
            ->when($seccionSeleccionada != 0, function ($query) use ($seccionSeleccionada) {
                return $query->where('Seccion', $seccionSeleccionada);
            })
            ->when(!empty($busqueda), function ($query) use ($busqueda) {
                return $query->where(function ($subquery) use ($busqueda) {
                    $subquery->where('dni', 'like', "%$busqueda%")
                        ->orWhere('Nombres', 'like', "%$busqueda%")
                        ->orWhere('Apellidos', 'like', "%$busqueda%");
                });
            })
            ->get();

        return view('pages.estudiante-managment', compact('estudiantes', 'secciones', 'bloques', 'grados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'dni' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Correo' => 'required|email',
            'Telefono' => 'required',
            'Direccion' => 'required',
            'Bloque' => 'required',
            'Grado' => 'required',
            'Seccion' => 'required',
            'FechaNacimiento' => 'required',
        ]);


        // Obtener el primer nombre desde la columna 'Nombres'
        $nombresArray = explode(' ', $data['Nombres']);
        $primerNombre = $nombresArray[0]; // Tomar el primer elemento del array

        // Crear un nuevo usuario con rol "estudiante"
        $user = new User();
        $user->username = $primerNombre;
        $user->correo = $data['Correo']; // Puedes utilizar el correo como nombre de usuario
        $user->password = $data['dni']; // Usar el DNI como contraseña
        $user->rol = 'Estudiante'; // Asignar el rol

        // Guardar el nuevo usuario
        $user->save();

        // Crear un nuevo docente asociado al usuario
        $data['User_id'] = $user->id;
        estudiantes::create($data);

        return back()->with('succes', 'Los datos se registraron sin problemas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $estudiante = estudiantes::find($id);
        $estudiante->update($request->all());

        return back()->with('succes', 'los datos se actualizaron satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca el estudiante por su ID
        $estudiante = estudiantes::find($id);

        if (!$estudiante) {
            return back()->with('error', 'Estudiante no encontrado');
        }

        // Elimina todas las boletas asociadas al estudiante
        Boletas::where('idEstudiante', $estudiante->id)->delete();

        // Elimina al usuario asociado
        User::where('id', $estudiante->User_id)->delete();

        // Finalmente, elimina al estudiante
        $estudiante->delete();

        return response()->json(['message' => 'Estudiante y registros asociados eliminados con éxito']);
    }
}
