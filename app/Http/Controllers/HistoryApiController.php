<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Validator;

class HistoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = History::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data History Berhasil diambil',
                'data' => $history,
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
            'id_users' => 'required',
            'id_pendonor' => 'required',
            'donorke' => 'required',
            'picture' => 'required',
            'lokasi' => 'required',
            'tanggal_donor' => 'required',
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
            $history = History::create([
                'id_users' => $request->input('id_users'),
                'id_pendonor' => $request->input('id_pendonor'),
                'donorke' => $request->input('donorke'),
                'picture' => $request->input('picture'),
                'lokasi' => $request->input('lokasi'),
                'tanggal_donor' => $request->input('tanggal_donor'),
            ]);
            if ($history) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Data History Berhasil Ditambahkan',
                        'data' => $history
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
        $history = History::find($id);
        if (is_null($history)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $history
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
    public function update(Request $request, History $history)
    {
        $history->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "berhasil",
            'post' => $history
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
        $history = History::whereId($id)->first();
        $history->delete();
        if ($history) {
            return response()->json([
                'success' => true,
                'message' => 'history Berhasil dihapus!',
            ], 200);
        }
    }
}
