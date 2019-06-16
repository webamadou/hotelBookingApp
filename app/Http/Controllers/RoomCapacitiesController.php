<?php

namespace App\Http\Controllers;

use App\RoomCapacity;
use Illuminate\Http\Request;

class RoomCapacitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomCapacities = RoomCapacity::all();

        return $roomCapacities->toJson();
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
        $validatedData = $request->validate([
            'name' => 'required'
        ]) ;

        $roomCapacity = RoomCapacity::create(['name' => $validatedData['name']]);

        return response()->json(['STATUS'=>200, 'MESSAGE'=>'Data saved', 'data'=> $roomCapacity],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomCapacity = RoomCapacity::find($id);

        return $roomCapacity->toJson();
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
        $request->validate([
            'name' => 'required',
        ]);
        $roomCapacity = RoomCapacity::find($id);
        $roomCapacity->update($request->all());

        return response()->json(['STATUS'=>200, 'MESSAGE'=>'Data updated','data' => $roomCapacity], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomCapacity = RoomCapacity::find($id);
        $roomCapacity->delete();
        return response()->json(['STATUS'=>200, 'MESSAGE'=>'Item deleted']);
    }
}
