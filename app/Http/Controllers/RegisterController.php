<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
{
    try {
        if (auth()->user()->role !== 'admin') {
            return response()->json([
                'error' => 'No autorizado para crear usuarios.'
            ], 403);
        }

        // Obtén los datos validados
        $validatedData = $request->validated();

        // Hashea la contraseña si está presente
        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        // Crea el nuevo usuario
        $userCreated = User::create($validatedData);
        return response()->json([
            'message' => 'Usuario creado correctamente',
            'user' => $userCreated
        ], 201);

    } catch (\Illuminate\Database\QueryException $e) {
        // Error de base de datos
        return response()->json([
            'error' => 'Error en la base de datos: ' . $e->getMessage()
        ], 500);
    } catch (\Exception $e) {
        // Otros errores
        return response()->json([
            'error' => 'Ocurrió un error: ' . $e->getMessage()
        ], 500);
    }
}

    
}
