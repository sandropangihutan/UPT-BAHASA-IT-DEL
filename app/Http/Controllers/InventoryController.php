<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::paginate(10);
        return view('pages.inventories.main', compact('inventories'));
    }

    public function create()
    {
        return view('pages.inventories.input', ['data' => new Inventory]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:inventories',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $inventory = new Inventory;
        $inventory->name = $request->name;
        $inventory->description = $request->description;
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $inventory->image = $name;
        $inventory->save();

        return redirect()->route('inventories.index')->with('success', 'Inventory berhasil ditambahkan');
    }

    public function show(Inventory $inventory)
    {
        //
    }

    public function edit(Inventory $inventory)
    {
        $inventories = Inventory::all();
        return view('pages.inventories.input', ['data' => $inventory]);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        $inventory->name = $request->name;
        $inventory->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $inventory->image = $name;
        }
        $inventory->save();

        return redirect()->route('inventories.index')->with('success', 'Inventory berhasil diubah');
    }

    public function destroy(Inventory $inventory)
    {
        unlink(public_path('/images/'.$inventory->image));
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Inventory berhasil dihapus');
    }
}
