<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('welcome', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'img'=>['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048']

        ]);
        Storage::put('public/img/', $request->file('img'));
        $store = new Photo;
        $store->src = $request->file('img')->hashName();
        // dd($store);
        $store->save();
        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo= Photo::find($id);

        return view('pages.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $update= Photo::find($id);
        if( $request->file('img') != null){
            Storage::delete('public/img/'. $update->src);
            Storage::put('public/img/', $request->file('img'));
            $update->src = $request->file('img')->hashName();
            $update->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dest = Photo::find($id);
        // Storage::delete('public/img/'.$dest->img);

        Storage::disk('public')->delete('img/'.$dest->img);
        $dest ->delete();
        return redirect()->back();

    }


    public function download($id){
        $download= Photo::find($id);

        return Storage::download('public/img/' .$download->src );
    }

}
