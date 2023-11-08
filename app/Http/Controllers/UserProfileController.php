<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\estudiantes;
use App\Models\profesores;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function show()
    {
        $usuario = auth()->user();
        $estudiante = null;
        $docente = null;
    
        if ($usuario->rol === 'Estudiante') {
            $estudiante = estudiantes::where('User_id', $usuario->id)->first();
        } elseif ($usuario->rol === 'Docente') {
            $docente = profesores::where('User_id', $usuario->id)->first();
        }
    
        return view('pages.user-profile', compact('usuario', 'estudiante', 'docente'));
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
