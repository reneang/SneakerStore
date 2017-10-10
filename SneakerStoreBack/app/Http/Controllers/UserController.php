<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\User;


class UserController extends Controller
{
    function SignUp(Request $req){
        try {
            
            $this->validate($req, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = new User;
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = bcrypt($req->input('password'));
            $user->address = "";
            $user->phone_number = "";

            $user->save();

            $token = JWTAuth::fromUser($user);
            return response()->json(['message' => 'Succesfully Create User', 'token' => $token], 200);
        }
        catch(\Exception $e){
            //return "Gagal";
            return response()->json(['message' => 'Failed to create user, exception:' + $e], 500); 
        }
    }

    function SignIn(Request $request){
        // use Tymon\JWTAuth\Exceptions\JWTException;
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        //return response()->json(compact('token'));
        return response()->json(['token' => $token], 200);
    }
}
