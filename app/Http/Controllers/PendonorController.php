<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Pendonor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendonor = Pendonor::latest()->paginate(5);
        return view('pendonor.index', compact('pendonor'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $member = Member::all();
        return view('pendonor.create', compact('member'));
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
            'id_users' => 'required',
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'goldarah' => 'required',
            'beratbadan' => 'required',
            'tekanandarah' => 'required',
            'kadarhb' => 'required',
            'tanggal_donor' => 'required',
        ]);

        Pendonor::create($validatedData);

        return redirect()->route('pendonor.index')
            ->with('success', 'Pendonor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendonor = Pendonor::find($id);
        $member = Member::all();
        return view('pendonor.edit', compact('pendonor','member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendonor $pendonor)
    {
        $validatedData = $request->validate([
            'id_users' => 'required',
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'goldarah' => 'required',
            'beratbadan' => 'required',
            'tekanandarah' => 'required',
            'kadarhb' => 'required',
            'tanggal_donor' => 'required',
        ]);

        $pendonor->update($validatedData);
        return redirect()->route('pendonor.index')
            ->with('success', 'Pendonor created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendonor $pendonor)
    {
        $pendonor->delete();

        return redirect()->route('pendonor.index')
            ->with('success', 'Pendonor deleted successfully');
    }
}
