<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        //validate
        $fields = $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|unique:users,email', // ยูนีคจากตาราง user คอลัม email ไม่ให้ซ้ำ
            'password' => 'required|string|confirmed',
            'tel' => 'required|string',
            'role' => 'required|integer'
        ]);

        //add data table User
        $users = User::create([
            'fullname' => $fields['fullname'],
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'tel' => $fields['tel'],
            'role' => $fields['role']
        ]);

        //create token
        $token = $users->createToken('my-device')->plainTextToken;

        $response = [
            'user' => $users,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function login(Request $request) {
        //validate
        $fields = $request->validate([
            'email' => 'required|string', // ยูนีคจากตาราง user คอลัม email ไม่ให้ซ้ำ
            'password' => 'required|string',
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();

        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'รหัสผ่านไม่ถูกหรืออีเมลไม่ถูกต้อง'
            ]);
        }else{

            //ลบ token อันเก่า
            $user->tokens()->delete();
            //create token
            $token = $user->createToken('my-device')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response, 201);
        }




    }


}
