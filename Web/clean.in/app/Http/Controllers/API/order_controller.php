<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;


class order_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = order::all();
        if($order) {
            return response()->json([
            'status' => 200,
            'message' => 'berhasil',
            'data' => $order
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
            $order = new order;
            $order->id_user = $request->id_user;
            $order->id_paket = $request->id_paket;
            $order->alamat = $request->alamat;
            $order->berat= $request->berat;
            $order->status = $request->status;
            $order->total_harga = $request->total_harga;
            $order->save();
    
            return response()->json([
                'status' => 200, //berhasil
                'message' => 'berhasil',
                'data'=> $order
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
        $order = order::find($id);

        if($order) {
        return response()->json([
        'status' => 200,
        'message' => 'berhasil',
        'data' => $order
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
            $order = order::find($id);
      
            $order = new order;
            $order->id_user = $request->id_user;
            $order->id_paket = $request->id_paket;
            $order->alamat = $request->alamat;
            $order->berat= $request->berat;
            $order->status = $request->status;
            $order->total_harga = $request->total_harga;
            $order->save();
    
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
        $order = order::find($id);

        if($order) {
            $order->delete();
            return response()->json([
            'status' => 200,
            'message' => 'berhasil',
            'data' => $order
            ]);

            } else {
            return response()->json([
            'status' => 400, 
            'message' =>'gagal',
            ]);
            }
    }
}
