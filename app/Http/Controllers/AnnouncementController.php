<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('pages.announcements.input', ['data' => new Announcement]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'required','mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,7z,jpg,jpeg,png,gif,bmp,svg|max:2048',
            'date_of_use' => 'required',
            'date_of_end' => 'required',
        ]);

        $announcement = new Announcement;
        $announcement->user_id = auth()->user()->id;
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file->move($destinationPath, $name);
            $announcement->file = $name;
        }
        $announcement->date_of_use = $request->date_of_use;
        $announcement->date_of_end = $request->date_of_end;
        $announcement->save();

        return redirect()->route('dashboard')->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function show(Announcement $announcement)
    {
        //
    }

    public function edit(Announcement $announcement)
    {
        return view('pages.announcements.input', ['data' => $announcement]);
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,7z,jpg,jpeg,png,gif,bmp,svg|max:2048',
            'date_of_use' => 'required',
            'date_of_end' => 'required',
        ]);

        $announcement->user_id = auth()->user()->id;
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file->move($destinationPath, $name);
            $announcement->file = $name;
        }
        $announcement->date_of_use = $request->date_of_use;
        $announcement->date_of_end = $request->date_of_end;
        $announcement->save();

        return redirect()->route('dashboard')->with('success', 'Berhasil mengubah pengumuman');
    }

    public function destroy(Announcement $announcement)
    {
        unlink(public_path('/files/'.$announcement->file));
        $announcement->delete();
        return redirect()->route('dashboard')->with('success', 'Berhasil menghapus pengumuman');
    }
}
