<?php

namespace App\Repositories;

use App\Http\Requests\Auth\AuthRequest;
use App\Interfaces\AuthInterfaces;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthRepositories implements AuthInterfaces
{
    protected $userModel;
    use HttpResponseTraits;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function register(AuthRequest $request)
    {
        try {
            $password = '123';
            $data = new $this->userModel;
            $data->name = htmlspecialchars($request->input('name'));
            $data->email = $request->input('email');
            $data->password = Hash::make($password);
            $data->save();

            $token = $data->createToken('auth_token')->plainTextToken;
            return $this->success([
                'data' => $data,
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'message' => 'Unauthorization'
                ]);
            } else {
                $user = $this->userModel->where('email', $request['email'])->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'message' => 'Success login',
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer'
                ]);
            }
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
