<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(10);
        return view('pages.galleries.main', compact('galleries'));
    }

    public function create()
    {
        return view('pages.galleries.input', ['data' => new Gallery]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:galleries',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $gallery->image = $name;
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil ditambahkan');
    }

    public function show(Gallery $gallery)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
        return view('pages.galleries.input', ['data' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $gallery->image = $name;
        }
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil diubah');
    }

    public function destroy(Gallery $gallery)
    {
        unlink(public_path('/images/'.$gallery->image));
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Gallery berhasil dihapus');
    }
}
