<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\estudiantes;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function show()
    {
        $usuario = auth()->user();
        $estudiante = estudiantes::where('User_id', $usuario->id)->first();
        return view('pages.user-profile', compact('usuario','estudiante'));
    }

    public function updateInfo(Request $request)
    {

        $usuario = auth()->user();
        $estudiante = $usuario->estudiante; // Obtenemos el estudiante asociado al usuario

        $datosUsuario = $request->only(['username', 'email']);
        $datosEstudiante = $request->only(['nombres', 'apellidos', 'direccion', 'telefono']);

        $usuario->update($datosUsuario);
        $estudiante->update($datosEstudiante);

        return back()->with(['succes' => 'Los datos se actualizaron satisfactoriamente', 'estudiante' => $estudiante]);
    }

    public function perfilUpdate(Request $request, $id)
    {
        $user = User::find($id);
        if (!empty($request->input('old_password'))) {
            if (Hash::check($request->input('old_password'), $user->password)) {

                $user->update([
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => $request->input('new_password'),
                ]);

                return back()->with('succes', 'Los datos se actualizaron satisfactoriamente');
            } else {

                return back()->withErrors([
                    'old_password' => 'La contraseña antigua es incorrecta.',
                ]);
            }
        } else {
            $user->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
            ]);
            return back()->with('succes', 'Los datos se actualizaron satisfactoriamente');
        }
    }
}
