<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomCapacity;
use App\RoomType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('roomType','roomCapacity')->orderBy('created_at', 'desc')->get();

        return view('rooms.index', compact('rooms'));
        #return $rooms->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = RoomType::pluck('name', 'id');
        $roomCapacity = RoomCapacity::pluck('name', 'id');
        return view ('rooms.create', compact('roomType','roomCapacity'));
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
            'name' => 'required',
            'roomType_id' => 'required',
            'roomCapacity_id' => 'required',
            'image' => 'nullable',
        ]) ;
        #dd($request->file('image'));

        $room = new Room();
        $room->name = $validatedData['name'];
        $room->roomType_id = $validatedData['roomType_id'];
        $room->roomCapacity_id = $validatedData['roomCapacity_id'];
        if($request->file('image') != null){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put('room_images/'.$image->getFilename().'.'.$extension,  File::get($image));
            $room->image = 'room_images/'.$image->getFilename().'.'.$extension;
        } else {
            $room->image = '';
        }

        $room->save();
        #$roomTypes = RoomType::create(['name' => $validatedData['name']]);

        #return response()->json(['STATUS'=>200, 'MESSAGE'=>'Data saved', 'data'=> $room, 'path' => public_path()],200);
        return redirect('dashboard/room')->with('success', 'A New Room has been added');
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
        $room = Room::find($id);
        $roomType = RoomType::pluck('name', 'id');
        $roomCapacity = RoomCapacity::pluck('name', 'id');
        return view ('rooms.edit', compact('room','roomType','roomCapacity'));
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
            'roomType_id' => 'required',
            'roomCapacity_id' => 'required',
            'image' => 'nullable',
        ]);

        $room = Room::find($id);
        $room->name = $request->get('name');
        $room->roomType_id = $request->get('roomType_id');
        $room->roomCapacity_id = $request->get('roomCapacity_id');
        $room->save();

        return redirect('dashboard/room')->with('success', 'Room updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if($room) {
            $room->delete();
        }

        return redirect('dashboard/room')->with('success', 'Room has been deleted Successfully');
    }
}
