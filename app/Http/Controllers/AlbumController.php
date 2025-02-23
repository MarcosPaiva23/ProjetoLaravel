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

    public function viewAlbums($id) {
        $albums = DB::table('albums')
            ->where('bands_id', $id)
            ->get();

        return view('albums.view_albums', compact('albums'));
    }

    public function addAlbum(){
        $bands = DB::table('bands')->get();
        return view('albums.add_albums', compact('bands'));
    }

    public function createAlbum(Request $request){
        if (auth()->user()->access_level != 2) {
            return redirect()->back()->with('error', 'Only admins can add albums.');
        }
    $request->validate([
        'name' => 'required|string',
        'photo' => 'image|nullable',
        'release_date' => 'required|date',
        'bands_id' => 'required|exists:bands,id'
    ]);


      $band = DB::table('bands')
      ->where('id', $request->bands_id)
      ->first();


    $currentAlbums = DB::table('albums')
      ->where('bands_id', $request->bands_id)
      ->count();


     if ($currentAlbums >= $band->albums) {
      DB::table('bands')
          ->where('id', $request->bands_id)
          ->update(['albums' => $currentAlbums + 1]);
  }

    $photo = null;

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('albumPhotos', 'public');
    }

    DB::table('albums')
        ->insert ([
        'name' => $request->name,
        'photo' => $photo,
        'release_date' => $request->release_date,
        'bands_id' => $request->bands_id
    ]);

    return redirect()->route('bands.show', $request->bands_id)->with('message', 'Album added successfully');
}

public function deleteAlbums($id){
    if (auth()->user()->access_level != 2) {
        return redirect()->back()->with('error', 'Only admins can delete albums.');
    }
    DB::table('albums')
    -> where ('id',$id)
    -> delete();

    return back();
}

public function editAlbum($id) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    $albums = DB::table('albums')
    ->where('id', $id)
    ->first();
    $bands = DB::table('bands')->get();
    return view('albums.edit_album', compact('albums','bands'));
}

public function updateAlbum(Request $request, $id) {
    $request->validate([
        'name' => 'required|string',
        'photo' => 'image|nullable',
        'release_date' => 'required|date',
        'bands_id' => 'required|exists:bands,id'
    ]);

    DB::table('albums')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'photo' => $request->photo,
            'release_date' =>$request->release_date,
            'bands_id' => $request->bands_id
        ]);

    return redirect()->route('bands.show')->with('message', 'Album updated sucessfully');
}
}
