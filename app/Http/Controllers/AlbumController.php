<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function viewAlbum($id) {
        $task = DB::table('albums')
        ->join('bands','albums.bands_id','albums.id')
        ->where('albums.id',$id)
        ->select('albums.*','bands.name as band_name')
        ->first();


        return view('albums.view_album', compact('album'));
    }

    public function addAlbum(){
        $bands = DB::table('bands')->get();
        return view('albums.add_albums', compact('bands'));
    }

    public function createAlbum(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'photo' => 'image',
        'release_date' => 'required|date',
        'bands_id' => 'required|exists:bands,id'
    ]);

    $photo = null;

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('albumPhotos', 'public');
    }

    Album::insert([
        'name' => $request->name,
        'photo' => $photo,
        'release_date' => $request->release_date,
        'bands_id' => $request->bands_id
    ]);

    return redirect()->route('bands.show', $request->bands_id)->with('message', 'Album added successfully');
}
}
