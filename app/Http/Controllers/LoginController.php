<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('username', 'password');

            if (!$request->username && !$request->password) {
                return redirect('login')->with('error_message', 'Introduzca su usuario y contraseña');
            } elseif (!$request->username) {
                return redirect('login')->with('error_message', 'Introduzca su usuario');
            } elseif (!$request->password) {
                return redirect('login')->with('error_message', 'Introduzca su contraseña');
            }

            $user = User::where('username', $credentials['username'])->first();
            if ($user) {
                // if ($user->active == 1) {
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect('/');
                } else {
                    return redirect('login')->with('error_message', 'Credenciales incorrectas');
                }
                // } else {
                //     return redirect('login')->with('error_message', 'Usuario inactivo');
                // }
            } else {
                return redirect('login')->with('error_message', 'Usuario inexistente');
            }
        } catch (\Exception $e) {
            return redirect('login')->with('error_message', 'Error en el inicio de sesión');
        }
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->to('/');
    }

    // function to login with laravel sanctum token, this is for api
    public function loginWithToken(Request $request)
    {
        try {
            if (!Auth::attempt($request->only('username', 'password'))) {
                return response([
                    'message' => 'Credenciales invalidas'
                ], 401);
            }

            $user = User::where('username', $request->username)->firstOrFail();

            // Revoke all previous tokens
            $user->tokens()->delete();

            // Create a new token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response([
                'message' => "Bienvenido " . $user->name,
                'accessToken' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => 'Error en el inicio de sesión'
            ], 500);
        }
    }

    // function to logout with laravel sanctum token, this is for api
    public function logoutWithToken(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response([
                'message' => 'Sesion cerrada'
            ]);
        } catch (\Exception $e) {
            return response([
                'message' => 'Error al cerrar sesion'
            ]);
        }
    }
}
