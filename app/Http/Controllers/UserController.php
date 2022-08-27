<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'update']]);
    }

    public function register()
    {
        $validator =  Validator::make(request()->all(), [
            'name' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'goldarah' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'goldarah' => request('goldarah'),
            'alamat' => request('alamat'),
            'password' => Hash::make(request('password')),
        ]);

        if ($user) {
            return response()->json(['message' => 'Successfully logged out']);
        } else {
            response()->json(['message' => 'pendaftaran gagal']);
        }
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'alamat' => 'required',
        //     'jenis_kelamin' => 'required',


        // ]);

        // $data = $request->all();
        // $user = Auth::user();
        // $user->update($data);

        // if ($user) {
        //     return response()->json(['message' => 'Successfully logged out']);
        // } else {
        //     response()->json(['message' => 'pendaftaran gagal']);
        // }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
