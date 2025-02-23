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

    public function getAllAlbunsFromDB(){
        $albums = DB::table('albums')
        ->join('bands', 'albums.bands_id', '=', 'bands.id')
        ->select('albums.*', 'bands.name as band')
        ->get();
        return $albums;
    }

    public function viewAlbum(string $id) {
        $bands = DB::table('bands')
        ->where('id',$id)
        ->first();

        $albums = DB::table('albums')
        ->join('bands','bands.id','=','albums.bands_id')
        ->where('bands.id',$id)
        ->select('albums.*')
        ->get();


        return view('albums.view_album', compact('bands','albums'));
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

    DB::table('albums')
        ->where('id',$id)
        ->insert ([
        'name' => $request->name,
        'photo' => $photo,
        'release_date' => $request->release_date,
        'bands_id' => $request->bands_id
    ]);

    return redirect()->route('bands.show', $request->bands_id)->with('message', 'Album added successfully');
}

public function deleteAlbums($id){
    DB::table('albums')
    -> where ('id',$id)
    -> delete();

    return back();
}

public function editAlbum($id) {
    $albums = DB::table('albums')
    ->where('id', $id)
    ->first();
    $bands = DB::table('bands')->get();
    return view('albums.edit_album', compact('albums','bands'));
}

public function updateAlbum(Request $request, $id) {
    $request->validate([
        'name' => 'required|string',
        'photo' => 'image',
        'release_date' => 'required|date',
        'bands_id' => 'required|exists:bands,id'
    ]);

    DB::table('albums')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'photo' => $request->photo,
            'release_date' =>$request->release_date,
            'albums' => $request->albums
        ]);

    return redirect()->route('bands')->with('message', 'Band updated sucessfully');
}
}
