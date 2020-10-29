<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;

class HeadersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Header::all();
        return view('headers.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'background' => 'required',
            'hotel' => 'required',
            'country' => 'required',
            'average_price' => 'required'
        ]);
        if($validator->fails()){
            flash()->error($validator->errors()->first());
            return back();
        }

        $record = Header::create($request->all());
        if ($request->hasFile('background')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/headers/'; // upload path
            $background = $request->file('background');
            $extension = $background->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
            $background->move($destinationPath, $name); // uploading file to given path
            $record->background = 'uploads/headers/' . $name;
        }
        $record->save();
        flash()->success("Success");
        return redirect(route('headers.index'));

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
        $model = Header::findOrFail($id);
        return view('headers.edit',compact('model'));
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
        $record = Header::findOrFail($id);
        $record->update($request->all());
        flash()->success("Edited");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Header::findOrFail($id);
        $record->delete();
        return back();
    }
}
