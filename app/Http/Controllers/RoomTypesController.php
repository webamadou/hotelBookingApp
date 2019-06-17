<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\Request;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = RoomType::all();

        return view('roomtypes.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtypes.create');
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

        $roomTypes = RoomType::create(['name' => $validatedData['name']]);

        return redirect('/dashboard/roomtype')->with('success', 'A new Room Type has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomType = RoomType::find($id);

        return view('roomtypes.show', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomType = RoomType::find($id);
        return view('roomtypes.edit', compact('roomType'));
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
        $roomType = RoomType::find($id);
        $roomType->update($request->all());

        return redirect('dashboard/roomtype/'.$id)->with('success','Room Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomType = RoomType::find($id);
        if($roomType)
            {$roomType->delete();}

        return redirect('dashboard/roomtype')->with('success','Room type deleted');
    }
}
