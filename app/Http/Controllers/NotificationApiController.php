<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Notification::all();
        return response()->json(
            [
                'success' => true,
                'messaage' => 'Data Notifikasi Berhasil Ditampilkan',
                'data' => $notification
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
            'name' => 'required',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'kebutuhan_darah' => 'required',
            'goldarah' => 'required',
            'resus_darah' => 'required',
            'kontak' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Semua Kolom Wajib Diisi',
                    'data' => $validator->errors(),
                ],
                401
            );
        } else {
            $notification = Notification::create([
                'name' => request('name'),
                'umur' => request('umur'),
                'alamat' => request('alamat'),
                'kebutuhan_darah' => request('kebutuhan_darah'),
                'goldarah' => request('goldarah'),
                'resus_darah' => request('resus_darah'),
                'kontak' => request('kontak'),
            ]);

            if ($notification) {
                return response()->json(
                    [
                        'success' => true,
                        'messaage' => 'Data Notifikasi Berhasil Ditambahkan',
                        'data' => $notification
                    ],
                    201
                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Notifikasi Gagal Disimpan',

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
        $notification = Notification::find($id);
        if (is_null($notification)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $notification
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
    public function update(Request $request, Notification $notification)
    {
        $notification->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "berhasil",
            'post' => $notification
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
        $notification = Notification::whereId($id)->first();
        $notification->delete();
        if ($notification) {
            return response()->json([
                'success' => true,
                'message' => 'Produk Berhasil dihapus!',
            ], 200);
        }
    }
}
