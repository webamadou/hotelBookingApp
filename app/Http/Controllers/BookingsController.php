<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Customer;
use App\Room;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at','desc')->get();

        return view('booking.index', compact('bookings'));
    }

    /**
     * Display a listing of the resource base on a given range date.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_booking(Request $request)
    {
        $validatedData = $request->validate([
            'date_start' => 'required',
            'date_end' => 'required',
        ]);
        //dd($validatedData);
        $bookings = Booking::where('date_start', '>=', $validatedData['date_start'] )
            ->where('date_end', '<=', $validatedData['date_end'])
            ->get();

        return view('booking.search', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking = new Booking();

        return view('booking.create', compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $customer = Customer::pluck('email', 'id');
        $room = Room::pluck('name', 'id');

        return view('booking.edit', compact('booking','customer','room'));
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
            'room_id' => 'required',
            'user_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        $room = Booking::find($id);
        $room->room_id = $request->get('room_id');
        $room->user_id = $request->get('user_id');
        $room->date_start = $request->get('date_start');
        $room->date_end = $request->get('date_end');
        $room->save();

        return redirect('dashboard/booking/'.$id)->with('success', 'Booking updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if($booking)
            $booking->delete();

        return redirect('dashboard/booking')->with('success', 'Booking has been deleted Successfully');
    }
}
