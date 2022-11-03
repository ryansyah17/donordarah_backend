<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::latest()->paginate(5);
        return view('member.index', compact('member'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'goldarah' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'roles' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Member::create($validatedData);

        return redirect()->route('member.index')
            ->with('success', 'Member created successfully.');
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
        $member = Member::find($id);
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'goldarah' => 'required',
            'alamat' => 'required',
            'roles' => 'required',
            // 'password' => 'required',
        ]);

        // $password = $request->post('password');
        // if ($password !== null) {
        //     $validatedData['password'] = Hash::make($password);
        // }

        $member->update($validatedData);
        return redirect()->route('member.index')
            ->with('success', 'Member created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index')
            ->with('success', 'Member deleted successfully');
    }
}
