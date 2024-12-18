<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
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
        return view('items.item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;

        $filename = $request->file('file');

        $finalName = time() . "." . $filename->getClientOriginalExtension();

        $request->file->move(public_path('uploads'), $finalName);

        if ($request->foodType == ["Select..."]) {
            return back()->with('error', 'Please select the food type.');
        } else {
            $item->food_type = $request->foodType;
        }

        $request->validate([
            'name' => ['required', 'min:6', 'max:30', 'string'],
            'description' => ['required', 'min:10', 'max:300', 'string'],
            'price' => ['required', 'min:2', 'integer']
        ]);

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $finalName;
        $item->save();

        return back()->with('message', 'Item added succefully');
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
