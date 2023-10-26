<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// ++++++++++++++
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Subscriber;
use App\Models\User;
// use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;



// ++++++++++++++++++++


class SubscriberAuthController extends Controller
{


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string','max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Subscriber::create([
            'name' => $validatedData['name'],
            'user_name' => $validatedData['user_name'],
            'status' =>'0',

            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token]);
    }





    public function login(Request $request)
{

    // غلط راجع عليه عدلو
    $credentials = $request->validate([
        'user_name' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::guard('api-subscriber')->attempt(['name' => $request->name,'password' => $request->password])) {
        $token = Auth::guard('api-subscriber')->user->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token]);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}

public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out']);
}




}
