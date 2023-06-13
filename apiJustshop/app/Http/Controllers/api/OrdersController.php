<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\orderitam;
use App\Models\orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //suppose you have orders table which has user id
      $order_data=  orders::create([
          "user_id"      => $request->user_id,
          "state"        => $request->state,
          "address"      => $request->address,
        ]);

        foreach($request->orders as $order)
        {
          //suposse you have orders table which has user id
           orderitam::create([
            "orders_id"       => $order_data->id,
             "products_id" =>     $order['products_id'],
             "quantity" => $order['quantity'],
            "size" => $order['size'],

           ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}