<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->with(['image'])
                    ->first();

            $remember = $request->remember;
            if($user){
                if(Hash::check($request->password, $user->password)){
                    Auth::attempt($request->only(['email', 'password']), $remember);
                    $token = $user->createToken("API", [], now()->addHours(3));
                    return response()->json([
                        'status' => true, 
                        'message' => 'Se inició sesión con éxito.',
                        'data' => [
                            'token' => $token->plainTextToken,
                            'user' => [$user],
                        ]
                    ], 200);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'La contraseña no coincide con nuestros registros.',
                    ], 401);
                }
            }else{
                if (!$user) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Email or Username does not match with our record.',
                    ], 401);
                }

                if (!Hash::check($request->password, $user->password)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Password does not match with our record.',
                    ], 401);
                }
            }
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = $request->user();
            $user->tokens()->delete();
            Auth::guard('web')->logout();
            session()->regenerateToken();
            return response()->json([
                'status' => true,
                'message'=> 'Se cerró sesión con éxito.'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

