<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Cars;
use App\Http\Resources\CarResource;
use Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make( $request->all(), [
            'title' => 'required',
            'manufacturer_id' => 'required',
            'description' => 'required',
        ]);

        if( $validator->fails() ) {
            return response()->json( $validator->errors(), Response::HTTP_BAD_REQUEST );
        }

        $car = new Cars();
        $car->title = $request->get( 'title' );
        $car->manufacturer_id = $request->get( 'manufacturer_id' );
        $car->description = $request->get( 'description' );

        if( $car->save() ) {
            // return response()->json( [ 'data' => $car ], Response::HTTP_CREATED );
            return new CarResource( $car );
        }

        return response()->json( [ 'error' => 'Something went wrong' ], Response::HTTP_INTERNAL_SERVER_ERROR );
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
