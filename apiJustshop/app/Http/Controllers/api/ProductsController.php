<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {



            $data = Products::paginate(10);


            // get images for each product and add them to the product object
            foreach ($data as $product) {

                $imagesUrl = array();
                $images= Images::where('products_id', $product->id)->get();

                foreach ($images as $image) {

                    $imagesUrl []    = $image->url;
                }

                if(!isset($imagesUrl)){
                    $product->images = [];
                }else{
                    if (count($imagesUrl) > 0){
                        $product->images = $imagesUrl;

                    }
                    else {
                        $product->images = [];
                    }

                }



                //$product->images = $images;
            }

    // dd($data);

            $response = [
                'total_pages' => $data->lastPage(),
                'count' =>  $data->total(),
                'next' => $data->nextPageUrl(),
                'previous' => $data->previousPageUrl(),
                'results'=> $data->items()
            ];




            // return response()->json($data->items() ,200);
            return response()->json($response ,200);

        //$data = Products::all();

        //$data = Products::with('images')->get();
        // get all products with images and paginate them

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
    public function show( $id)
    {


        $data = Products::whereid($id);

        // get images for each product and add them to the product object

        $data = Products::whereid($id)->first();
            $data->images = [];
            $images= Images::where('products_id', $id)->get();
            if(count($images) > 0){
                foreach ($images as $image) {
                    $imagesUrl [] = $image->url;
                }
                $data->images = $imagesUrl;
            }
            else {
                $data->images = [];
            }








        // return response()->json($data->items() ,200);
        return response()->json($data ,200);
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