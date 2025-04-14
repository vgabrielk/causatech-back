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

        $role = $request->role;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role ? $user->assignRole($role, 'api') : $user->assignRole('admin', 'api');


        return response()->json($user, 201);
    }

    public function index()
    {
        $user = User::orderBy('id', 'desc')->paginate(10);
        $user->load('roles');
        return $user;

    }

    public function show(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();
        $user->load('roles');
        return $user;
    }
}
