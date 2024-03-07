<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $gallery =  Galleries::latest()->paginate('3');

        return view('admin.gallery.index', compact('gallery'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.gallery.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //pli, ini b mage nya pake s, soalnya di table nya gw bikin pake s == 'images'


        $this->validate($request, [
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'title'       => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/galleriess', $image->hashName());

        Galleries::create([
            'image'=> $image->hashName(),
            'title'=> $request->title,
        ]);
        return redirect()->route('gallery.index')->with([
            Alert::success('Success', 'Message Success')
        ]);
        return $image;

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
        $gallery = Galleries::findOrFail($id);
        Storage::disk('local')->delete('public/galleries/' . basename($gallery->image));
        $gallery->delete();

        return redirect()->route('gallery.index')->with([
            Alert::success('Success', 'Berhasil dihapus')
        ]);
    }
}
