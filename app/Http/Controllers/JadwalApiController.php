<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pendonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Pendonor Berhasil diambil',
                'data' => $jadwal
            ],
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_stand' => 'required',
            'waktu' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'picture' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Semua kolom wajib diisi',
                    'data' => $validator->errors(),
                ],
                401
            );
        } else {
            $jadwal = Jadwal::create([
                'name_stand' => $request->input('name_stand'),
                'waktu' => $request->input('waktu'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'picture' => $request->input('picture'),

            ]);
            if ($jadwal) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Data History Berhasil Ditambahkan',
                        'data' => $jadwal
                    ],
                    201
                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Data History gagal ditambahkan',
                    ],
                    400
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        if (is_null($jadwal)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $jadwal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "berhasil",
            'post' => $jadwal
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::whereId($id)->first();
        $jadwal->delete();
        if ($jadwal) {
            return response()->json([
                'success' => true,
                'message' => 'Produk Berhasil dihapus!',
            ], 200);
        }
    }
}
