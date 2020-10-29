<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Hotel::latest()->paginate(20);
        return view('hotels.index',compact('records'));
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
        $hotel = Hotel::findOrFail($id);
        return view('hotels.show',compact('hotel'));
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
        $record = Hotel::findOrFail($id);
        $record->delete();
        return back();
    }

    public function activate($id){
        $record = Hotel::findOrFail($id);
        $record->update(['is_activate' => 1]);
        flash()->success("Success");
        return back();
    }

    public function deactivate($id){
        $record = Hotel::findOrFail($id);
        $record->update(['is_activate' => 0]);
        flash()->success("Success");
        return back();
    }

    public function normal($id){
        $record = Hotel::findOrFail($id);
        $record->update(['section' => 'normal']);
        flash()->success("Success");
        return back();
    }

    public function in_page($id){
        $record = Hotel::findOrFail($id);
        $record->update(['section' => 'inPage']);
        flash()->success("Success");
        return back();
    }

    public function popular($id){
        $record = Hotel::findOrFail($id);
        $record->update(['popular' => 'popular']);
        flash()->success("Success");
        return back();
    }

    public function un_popular($id){
        $record = Hotel::findOrFail($id);
        $record->update(['popular' => 'unpopular']);
        flash()->success("Success");
        return back();
    }

}
