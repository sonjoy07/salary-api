<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
                ]);
        }
        $token_validity = 24 * 60;
        $this->guard()->factory()->setTTL($token_validity);
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->responseWithToken($token);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
    }
    public function logout(){
        $this->guard()->logout();
        return response()->json(['status'=>true,'message'=>'User Logged out Successfully']);
    }
    public function profile(){
        echo 'kaj kore na';
        return response()->json($this->guard()->user());
    }
    public function refresh(){
        return $this->responseWithToken($this->guard()->refresh());
    }

    public function responseWithToken($token){
        return response()->json([
            'token'=>$token,
            'token_type'=>'bearer',
            'token_validity'=> auth()->factory()->getTTL() * 60,
        ]);
    }
    protected function guard(){
        return Auth::guard();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
