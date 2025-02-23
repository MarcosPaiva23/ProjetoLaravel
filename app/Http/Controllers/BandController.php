<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bands()
    {
        $bands = $this->getAllBandsFromDB();

        return view('bands.bands',compact('bands'));
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

    protected function getAllBandsFromDB(){
        $bands = DB::table('bands')
                ->get();

             return $bands;
    }

    public function createBand(Request $request){
        if (auth()->user()->access_level != 2) {
            return redirect()->back()->with('error', 'Only admins can add bands.');
        }
    $request->validate([
        'name' => 'required|string',
        'photo'=> 'image',
        'albums' => 'required|integer'
    ]);

    $photo = null;

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('bandPhotos', 'public');
    }

    Band::insert([
        'name' => $request->name,
        'photo' => $photo,
        'albums' => $request->albums
    ]);

    return redirect()->route('bands.show')->with('message', 'Banda adicionada com sucesso');
}

    public function addBand(){
        return view('bands.add_bands');
    }

    public function deleteBands($id){
        if (auth()->user()->access_level != 2) {
            return redirect()->back()->with('error', 'Only admins can delete bands.');
        }
        DB::table('bands')
        -> where ('id',$id)
        -> delete();

        return back();
    }

    public function editBand($id) {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        $band = DB::table('bands')->where('id', $id)->first();
        return view('bands.edit_band', compact('band'));
    }

    public function updateBand(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:50',
            'photo' => 'nullable|numeric',
            'albums' => 'nullable|numeric',
        ]);

        DB::table('bands')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'photo' => $request->photo,
                'albums' => $request->albums,
            ]);

        return redirect()->route('bands.show')->with('message', 'Band updated sucessfully');
    }
}
