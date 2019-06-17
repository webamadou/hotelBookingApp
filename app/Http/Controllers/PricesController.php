<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;
use App\RoomType;
use App\RoomCapacity;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();

        return view('price.index', compact('prices'));
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
        return view ('price.create', compact('roomType','roomCapacity'));
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
            'price_value' => 'required',
            'roomType_id' => 'nullable',
            'roomCapacity_id' => 'nullable',
            'price_type' => 'required',
        ]) ;
        #dd($request->file('image'));

        $price = new Price();
        $price->name = $validatedData['name'];
        $price->roomType_id = $validatedData['roomType_id'];
        $price->roomCapacity_id = $validatedData['roomCapacity_id'];
        $price->price_value = $validatedData['price_value'];
        $price->price_type = $validatedData['price_type'];
        $price->price_range_start = $request->price_range_start;
        $price->price_range_end = $request->price_range_end;

        $price->save();
        return redirect('dashboard/price')->with('success', 'A New Price has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = Price::find($id);

        return view('price.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::find($id);
        $roomType = RoomType::pluck('name', 'id');
        $roomCapacity = RoomCapacity::pluck('name', 'id');
        return view ('price.edit', compact('price','roomType','roomCapacity'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'price_value' => 'required',
            'roomType_id' => 'nullable',
            'roomCapacity_id' => 'nullable',
            'price_type' => 'required',
        ]) ;

        $price = Price::find($id);
        $price->name = $validatedData['name'];
        $price->roomType_id = $validatedData['roomType_id'];
        $price->roomCapacity_id = $validatedData['roomCapacity_id'];
        $price->price_value = $validatedData['price_value'];
        $price->price_type = $validatedData['price_type'];
        $price->price_range_start = $request->price_range_start;
        $price->price_range_end = $request->price_range_end;

        $price->save();
        return redirect('dashboard/price/'.$id)->with('success', 'Price has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id);
        if($price) {
            $price->delete();
        }

        return redirect('dashboard/price')->with('success', 'Price has been deleted Successfully');
    }
}
