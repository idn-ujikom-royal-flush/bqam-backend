<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::latest()->paginate(10);

        return view('admin.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/events', $image->hashName());

        // $image = $request->file('image')->store('newss');
        // $image = Storage::putFile('image', $request->file('image'));

        // save to DB
        Event::create([
            'title'         => $request->title,
            'image'         => $image->hashName(),
            'description'   => $request->description
        ]);

        return redirect()->route('event.index')->with([
            Alert::success('Success', 'Message Success')
        ]);
        return $image;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = News::findOrFail($id);

        return view('admin.news.show', compact(
            'news'
        ));
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
}
