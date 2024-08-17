<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
 
    public function login(Request $request)
    {
        //validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = Customer::where('email', $request->email)->first();

        // return $user;
        //invalid credentials check
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        } else {
            //return 1;

            //creating token after matching the credentials 
            $token = $user->createToken('auth-token')->plainTextToken;
            //return $token;

            //json response
            return response()->json([
                'message' => 'Login Successfully',
                'token' => $token,
                'user' => $user
            ]);
        }
    }

    public function register(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'password' => 'required|string|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Retrieve validated data
        $data = $validator->validated();
        $data['password'] = bcrypt($data['password']);

        // Create a new customer
        $user = Customer::create($data);

        return response()->json([
            'message' => 'Registration successful.',
        ], 201);
    } 
}

