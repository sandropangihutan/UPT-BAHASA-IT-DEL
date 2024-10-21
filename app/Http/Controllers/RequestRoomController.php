<?php

namespace App\Http\Controllers;

use App\Models\RequestRoom;
use Illuminate\Http\Request;

class RequestRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware('Admin')->only('verification');
    }
    public function index()
    {
        $request_rooms = RequestRoom::paginate(10);
        return view('pages.request_room.main', compact('request_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.request_room.input', ['data' => new RequestRoom]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
        ]);

        $request_room = new RequestRoom;
        $request_room->user_id = auth()->user()->id;
        $request_room->date_start = $request->date_start;
        $request_room->date_end = $request->date_end;
        $request_room->description = $request->description;
        $request_room->save();

        return redirect()->route('request-rooms.index')->with('success', 'Request Room berhasil ditambahkan');
    }

    public function show(RequestRoom $request_room)
    {
        //
    }

    public function edit(RequestRoom $request_room)
    {
        return view('pages.request_room.input', ['data' => $request_room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestRoom  $requestRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestRoom $request_room)
    {
        $request->validate([
            'date_start' => 'required',
            'date_end' => 'required',
            'description' => 'required',
        ]);

        $request_room->date_start = $request->date_start;
        $request_room->date_end = $request->date_end;
        $request_room->description = $request->description;
        $request_room->save();

        return redirect()->route('request-rooms.index')->with('success', 'Request Room berhasil diubah');
    }

    public function destroy(RequestRoom $request_room)
    {
        $request_room->delete();
        return redirect()->route('request-rooms.index')->with('success', 'Inventory berhasil dihapus');
    }

    public function verification(Request $request, RequestRoom $request_room)
    {
        $request->validate(['status' => 'required']);

        $request_room->status = $request->status;
        $request_room->save();

        return redirect()->route('request-rooms.index')->with('success', 'Request Room berhasil diverifikasi');
    }
}
