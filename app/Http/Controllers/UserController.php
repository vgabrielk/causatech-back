<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Repositories\UserRepositoryEloquent;
use App\Rules\MobilePhoneRule;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function register(UserRequest $request): JsonResponse
    {
        try {
            $role = $request->role;

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tenant_id' => null,
            ]);

            $user->tenant_id = $user->id;
            $user->assignRole('admin');
            $user->save();


            return response()->json($user->load('roles'), 201);

        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Erro ao registrar usuário', [
                'message' => $e->getMessage(),
                'email' => $request->email
            ]);

            return response()->json([
                'error' => 'Erro ao registrar usuário.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(10);
        $user->load('roles');
        return $user;

    }
    public function show(Request $request)
    {
        try {
            $user = User::where('id', $request->user()->id)->firstOrFail();
            $user->load('roles');

            return response()->json($user);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuário não encontrado.'], 404);
        } catch (\Exception $e) {
            \Log::error('Erro ao buscar usuário', [
                'message' => $e->getMessage(),
                'user_id' => optional($request->user())->id,
            ]);

            return response()->json(['error' => 'Erro ao buscar usuário.', $e->getMessage()], 500);
        }
    }
}
