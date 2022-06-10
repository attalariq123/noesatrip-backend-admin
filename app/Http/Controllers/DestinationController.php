<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::paginate();
        return view('menu.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $file = $r->hasFile('thumbnail');
        if ($file) {
            $new_file = $r->file('thumbnail');
            $file_path = $new_file->store('destination_img', 'public');
            // dd(asset('/storage/'.$file_path));
        }

        $destination = Destination::create([
            'kode' => $r->code,
            'name' => $r->name,
            'description' => $r->description,
            'price' => $r->price,
            'city' => $r->city,
            'image_path' => "http://localhost:8000/storage/$file_path",
        ]);

        return redirect()->route('destinations.index');
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
        $destination = Destination::find($id);
        return view('menu.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $file = $r->hasFile('thumbnail');
        if ($file) {
            $new_file = $r->file('thumbnail');
            $file_path = $new_file->store('destination_img', 'public');
        }

        $destination = Destination::where('id', $id)->update([
            'kode' => $r->code,
            'name' => $r->name,
            'description' => $r->description,
            'price' => $r->price,
            'city' => $r->city,
            'image_path' => $file_path,
        ]);

        return redirect()->route('destinations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);

        $destination->delete();

        return redirect()->route('destinations.index');
    }
}
