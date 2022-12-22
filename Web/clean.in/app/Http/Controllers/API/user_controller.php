<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class user_controller extends Controller
{
    public function index()
    {
        $user = user::all();

        if($user) {
            return response()->json([
            'status' => 200,
            'message' => 'berhasil',
            'data' => $user
            ]);

            } else {
            return response()->json([
            'status' => 400, 
            'message' =>'gagal',
            ]);
            }

    }

    public function store(Request $request)
    {

        try {
            //code
            $user = new user;
            $user->name_user = $request->name_user;
            $user->email = $request->email;
            $user->password= $request->password;
            $user->no_telp = $request->no_telp;
            $user->save();
    
            return response()->json([
                'status' => 200, //berhasil
                'message' => 'berhasil',
                'data'=> $user
            ]);

            } catch (\Exception $e) {
            return response()->json([
            'status' => 400, 
            'message' =>'gagal',
            ]);
            }
    }

    public function show($id)
    {
        $user = user::find($id);

        
        if($user) {
            return response()->json([
            'status' => 200,
            'message' => 'berhasil',
            'data' => $user
            ]);

            } else {
            return response()->json([
            'status' => 400, 
            'message' =>'gagal',
            ]);
            }
        

    }

    public function update(Request $request, $id)
    {
        
        try {
            //code
            $user = user::find($id);
            $user->name_user = $request->name_user;
            //$user->email = $request->email;
            $user->password= $request->password;
            $user->no_telp = $request->no_telp;
            $user->save();

            return response()->json([
                'status' => 200, //berhasil
                'message' => 'berhasil',
                'data'=> $user
            ]);

            } catch (\Exception $e) {
            return response()->json([
            'status' => 400, 
            'message' =>'gagal',
            ]);
            }    
    }

    public function destroy($id)
    {
        $user = user::find($id);

        if($user) {
            $user->delete();
            return response()->json([
            'status' => 200,
            'message' => 'berhasil',
            'data' => $user
            ]);

            } else {
            return response()->json([
            'status' => 400, 
            'message' =>'gagal',
            ]);
            }

    }

}
