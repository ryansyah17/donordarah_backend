<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Notification::all();
        return view('notifikasi.index', compact('notification'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kebutuhan_darah' => 'required',
            'goldarah' => 'required',
            'resus_darah' => 'required',
            'kontak' => 'required',

        ]);

        Notification::create($validatedData);

        return redirect()->route('notification.index')
            ->with('success', 'Notification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);
        return view('notifikasi.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kebutuhan_darah' => 'required',
            'goldarah' => 'required',
            'resus_darah' => 'required',
            'kontak' => 'required',

        ]);

        $notification->update($validatedData);
        return redirect()->route('notification.index')->with('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notification.index')
            ->with('success', 'Notification deleted successfully');
    }
}
