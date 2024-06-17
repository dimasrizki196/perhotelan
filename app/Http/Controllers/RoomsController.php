<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms=DB::table('rooms as rm') 
                        ->select('rm.*')
                        ->get();
        return view ('rooms.data', compact('rooms'));
    }

    /**
     * Show the room for creating a new resource.
     */
    public function store(Request $request)
    {
        $rooms = new Rooms();
        $rooms->idKamar = $request->idKamar;
        $rooms->tipe = $request->tipe;
        $rooms->harga = $request->harga;
        $rooms->save();

        return redirect()->route('rooms.index')->with('msg', 'Data Kamar berhasil ditambahkan');
    }

    public function create(Request $request)
    {
        return view('rooms.roomadd');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $rooms, $idKamar)
    {
        $data =$rooms->find($idKamar);
        return view('rooms.roomedit')->with([
            'idKamar' => $idKamar,
            'tipe' => $data->tipe,
            'harga' => $data->harga
        ]);
    }

    public function edit($idKamar)
    {
        $rooms=DB::table('rooms as rm') 
                        ->select('rm.*')
                        ->where('rm.idKamar', $idKamar)
                        ->first();
        return view('rooms.roomedit', compact('rooms'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rooms = Rooms::findOrFail($id);
        $rooms->tipe = $request->tipe;
        $rooms->harga = $request->harga;
        $rooms->update();

        return redirect('rooms')->with('msg', 'Data kamar '.$rooms->idKamar.', '.$rooms->tipe.' berhasih diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $rooms, $idKamar)
    {
        $data = $rooms->find($idKamar);
        $data->delete();
        return redirect('rooms')->with('msg', 'Data '.$data->tipe.' berhasil dihapus');
    }
}
