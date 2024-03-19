<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string',
                'email'=>'required|string|unique:users',
                'password'=>'required|string',
                'c_password' => 'required|same:password'
            ]);
    
            $user = new User([
                'name'  => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
            ]);
    
            if($user->save()){
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->plainTextToken;
    
                return response()->json([
                'message' => 'Successfully created user!',
                'accessToken'=> $token,
                ],201);
            }
            else{
                return response()->json(['error'=> 'Registering error occupied!']);
            }
        }

    
public function login(Request $request)
{
    $request->validate([
    'email' => 'required|string|email',
    'password' => 'required|string',
    'remember_me' => 'boolean'
    ]);

    $credentials = request(['email','password']);
    if(!Auth::attempt($credentials))
    {
    return response()->json([
        'message' => 'Unauthorized'
    ],401);
    }

    $user = $request->user();
    $tokenResult = $user->createToken('Personal Access Token');
    $token = $tokenResult->plainTextToken;

    return response()->json([
    'accessToken' =>$token,
    'token_type' => 'Bearer',
    ]);
}

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
