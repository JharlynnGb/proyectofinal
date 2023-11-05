<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profesores;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docente = profesores::all();
        return view('pages.docente-managment',compact('docente'));
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
        'FechaNacimiento' => 'required',
    ]);

      // Obtener el primer nombre desde la columna 'Nombres'
      $nombresArray = explode(' ', $data['Nombres']); 
      $primerNombre = $nombresArray[0]; // Tomar el primer elemento del array

    // Crear un nuevo usuario con rol "Docente"
    $user = new User();
    $user->username = $primerNombre;
    $user->correo=$data['Correo']; // Puedes utilizar el correo como nombre de usuario
    //$user->password =bcrypt($data['dni']);
    $user->password =$data['dni']; // Usar el DNI como contraseña
    $user->rol = 'Docente'; // Asignar el rol

    // Guardar el nuevo usuario
    $user->save();

    // Crear un nuevo docente asociado al usuario
    $data['User_id'] = $user->id;
    profesores::create($data);

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
        $docente=profesores::find($id);
        $docente->update($request->all());

        return back()->with('succes', 'los datos se actualizaron satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    
     public function destroy($id)
     {
         // Busca el estudiante por su ID
         $docente = profesores::find($id);
 
         if (!$docente) {
             return back()->with('error', 'docente no encontrado');
         }
 
         User::where('id', $docente->User_id)->delete();
         // Elimina al usuario asociado
 
         // Finalmente, elimina al estudiante
         $docente->delete();
 
         return response()->json(['message' => 'docente y registros asociados eliminados con éxito']);
     }

}
