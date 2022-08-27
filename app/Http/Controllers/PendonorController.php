<?php

namespace App\Http\Controllers;

use App\Models\Pendonor;
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
        $pendonor = Pendonor::all();
        return view('pendonor', compact(['pendonor']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

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
            $pendonor = Pendonor::create([
                'id_users' => $request->input('id_users'),
                'name' => $request->input('name'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'nohp' => $request->input('nohp'),
                'goldarah' => $request->input('goldarah'),
                'beratbadan' => $request->input('beratbadan'),
                'tekanandarah' => $request->input('tekanandarah'),
                'kadarhb' => $request->input('kadarhb'),
                'tanggal_donor' => $request->input('tanggal_donor'),
            ]);
            if ($pendonor) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Data Pendonor Berhasil Ditambahkan',
                        'data' => $pendonor
                    ],
                    201
                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Pendonor gagal ditambahkan',
                    ],
                    400
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendonor  $pendonor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendonor = Pendonor::find($id);
        if (is_null($pendonor)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $pendonor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendonor  $pendonor
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendonor $pendonor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendonor  $pendonor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendonor $pendonor)
    {
        // $pendonor = Pendonor::find($id);
        // $validator = Validator::make($request->all(), [
        //     'id_users' => 'required',
        //     'name' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'nohp' => 'required',
        //     'goldarah' => 'required',
        //     'beratbadan' => 'required',
        //     'tekanandarah' => 'required',
        //     'kadarhb' => 'required',
        //     'tanggal_donor' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(
        //         [
        //             'success' => false,
        //             'message' => 'Semua kolom wajib diisi',
        //             'data' => $validator->errors(),
        //         ],
        //         401
        //     );
        // } else {
        //     $pendonor = Pendonor::update([
        //         'id_users' => $request->input('id_users'),
        //         'name' => $request->input('name'),
        //         'tempat_lahir' => $request->input('tempat_lahir'),
        //         'tanggal_lahir' => $request->input('tanggal_lahir'),
        //         'jenis_kelamin' => $request->input('jenis_kelamin'),
        //         'alamat' => $request->input('alamat'),
        //         'nohp' => $request->input('nohp'),
        //         'goldarah' => $request->input('goldarah'),
        //         'beratbadan' => $request->input('beratbadan'),
        //         'tekanandarah' => $request->input('tekanandarah'),
        //         'kadarhb' => $request->input('kadarhb'),
        //         'tanggal_donor' => $request->input('tanggal_donor'),
        //     ]);
        //     if ($pendonor) {
        //         return response()->json(
        //             [
        //                 'success' => true,
        //                 'message' => 'Data Pendonor Berhasil Ditambahkan',
        //                 'data' => $pendonor
        //             ],
        //             201
        //         );
        //     } else {
        //         return response()->json(
        //             [
        //                 'success' => false,
        //                 'message' => 'Pendonor gagal ditambahkan',
        //             ],
        //             400
        //         );
        //     }
        // }
        $pendonor->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "berhasil",
            'post' => $pendonor
        ]);
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendonor  $pendonor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendonor = Pendonor::whereId($id)->first();
        $pendonor->delete();
        if ($pendonor) {
            return response()->json([
                'success' => true,
                'message' => 'Produk Berhasil dihapus!',
            ], 200);
        }
    }
}
