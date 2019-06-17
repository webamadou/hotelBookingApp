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

        return view('roomcapacity.index', compact('roomCapacities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomcapacity.create');
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

        return redirect('/dashboard/roomcapacity')->with('success','A new Room Capacity has been saved');
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

        return view('roomcapacity.show', compact('roomCapacity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomCapacity = RoomCapacity::find($id);
        return view('roomcapacity.edit', compact('roomCapacity'));
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

        return redirect('dashboard/roomcapacity/'.$id)->with('success','Room Capacity Updated');
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
        if($roomCapacity)
            {$roomCapacity->delete();}

        return redirect('dashboard/roomcapacity')->with('success','Room Capacity Deleted');
    }
}
