<?php

namespace App\Http\Controllers;

use App\Models\Stokdarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StokdarahApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stokdarah = Stokdarah::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Pendonor Berhasil diambil',
                'data' => $stokdarah
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
            'goldarah_a' => 'required',
            'goldarah_b' => 'required',
            'goldarah_ab' => 'required',
            'goldarah_o' => 'required',

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
            $stokdarah = Stokdarah::create([
                'goldarah_a' => $request->input('goldarah_a'),
                'goldarah_b' => $request->input('goldarah_b'),
                'goldarah_ab' => $request->input('goldarah_ab'),
                'goldarah_o' => $request->input('goldarah_o'),


            ]);
            if ($stokdarah) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Data History Berhasil Ditambahkan',
                        'data' => $stokdarah
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
        $stokdarah = Stokdarah::find($id);
        if (is_null($stokdarah)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $stokdarah
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
    public function update(Request $request, Stokdarah $stokdarah)
    {
        $stokdarah->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "berhasil",
            'post' => $stokdarah
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
        $stokdarah = Stokdarah::whereId($id)->first();
        $stokdarah->delete();
        if ($stokdarah) {
            return response()->json([
                'success' => true,
                'message' => 'Produk Berhasil dihapus!',
            ], 200);
        }
    }
}
