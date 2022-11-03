<?php

namespace App\Http\Controllers;

use App\Models\Stokdarah;
use Illuminate\Http\Request;

class StokdarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stokdarah = Stokdarah::all();
        return view('stokdarah.index', compact('stokdarah'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stokdarah.create');
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
            'goldarah_a' => 'required',
            'goldarah_b' => 'required',
            'goldarah_ab' => 'required',
            'goldarah_o' => 'required',
        ]);

        Stokdarah::create($validatedData);

        return redirect()->route('stokdarah.index')
            ->with('success', 'Stok Darah created successfully.');
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
        $stokdarah = Stokdarah::find($id);
        return view('stokdarah.edit', compact('stokdarah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stokdarah $stokdarah)
    {
        $validatedData = $request->validate([
            'goldarah_a' => 'required',
            'goldarah_b' => 'required',
            'goldarah_ab' => 'required',
            'goldarah_o' => 'required',
        ]);

        
        $stokdarah->update($validatedData);
        return redirect()->route('stokdarah.index')
            ->with('success', 'Stok Darah Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stokdarah $stokdarah)
    {
        $stokdarah->delete();

        return redirect()->route('stokdarah.index')
            ->with('success', 'Stok Darah deleted successfully');
    }
}
