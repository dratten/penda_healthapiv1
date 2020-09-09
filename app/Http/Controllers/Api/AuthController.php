<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['email','password']);

        if (!$token=auth()->attempt($creds))
        {
            return response()->json([
                'success' => False,
                'message' => "Invalid credentials"
            ]);
        }
        return response()->json([
            'success' => False,
            'user' => Auth::user()
        ]);
    }

    
    public function register(Request $request)
    {
        $encpass = Hash::make($request->password);
        $user = new User;
        try {
            $user->fname = $request->fname;
            $user->sname = $request->sname;
            $user->email = $request->email;
            $user->photo = $request->photo;
            $user->password = $encpass;
            $user->save();
            return $this->login($request);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => "Logout success"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => " ".$e
            ]);
        }
    }
}
