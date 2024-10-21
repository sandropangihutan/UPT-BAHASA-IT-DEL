<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\RequestInventory;
use App\Http\Controllers\Controller;

class RequestInventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware('Admin')->only('verification');
    }
    public function index()
    {
        $request_inventories = RequestInventory::paginate(10);
        return view('pages.request_inventory.main', compact('request_inventories'));
    }

    public function create()
    {
        $inventories = Inventory::all();
        return view('pages.request_inventory.input', ['data' => new RequestInventory, 'inventories' => $inventories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
        ]);

        $request_inventory = new RequestInventory;
        $request_inventory->inventory_id = $request->inventory_id;
        $request_inventory->user_id = auth()->user()->id;
        $request_inventory->date_start = $request->date_start;
        $request_inventory->date_end = $request->date_end;
        $request_inventory->description = $request->description;
        $request_inventory->save();

        return redirect()->route('request-inventories.index')->with('success', 'Request Inventory berhasil ditambahkan');
    }

    public function show(RequestInventory $requestInventory)
    {
        //
    }

    public function edit(RequestInventory $request_inventory)
    {
        $inventories = Inventory::all();
        return view('pages.request_inventory.input', ['data' => $request_inventory, 'inventories' => $inventories]);
    }

    public function update(Request $request, RequestInventory $request_inventory)
    {
        //dd($request->all());
        $request->validate([
            'inventory_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
        ]);

        $request_inventory->inventory_id = $request->inventory_id;
        $request_inventory->date_start = $request->date_start;
        $request_inventory->date_end = $request->date_end;
        $request_inventory->description = $request->description;
        $request_inventory->update();

        return redirect()->route('request-inventories.index')->with('success', 'Request Inventory berhasil di edit');
    }

    public function destroy(RequestInventory $requestInventory)
    {

        $requestInventory->delete();
        return redirect()->route('request-inventories.index')->with('success', 'Inventory berhasil dihapus');
    }

    public function verification(Request $request, RequestInventory $requestInventory)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $requestInventory->status = $request->status;
        $requestInventory->update();

        return redirect()->route('request-inventories.index')->with('success', 'Request Inventory berhasil diverifikasi');
    }
}
