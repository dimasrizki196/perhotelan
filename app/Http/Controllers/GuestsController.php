<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Guests;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests=DB::table('guests as gs') 
                        ->select('gs.*')
                        ->get();
        return view ('guests.data', compact('guests'));
    }

    /**
     * Show the room for creating a new resource.
     */
    public function store(Request $request)
    {
        $guests = new Guests();
        $guests->idTamu = $request->idTamu;
        $guests->nama = $request->nama;
        $guests->jenisKelamin = $request->jenisKelamin;
        $guests->noTelp = $request->noTelp;
        $guests->alamat = $request->alamat;
        $guests->save();

        return redirect()->route('guests.index')->with('msg', 'Data Tamu berhasil ditambahkan');
    }

    public function create(Request $request)
    {
        return view('guests.formadd');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guests $guests, $idTamu)
    {
        $data =$guests->find($idTamu);
        return view('guests.fromedit')->with([
            'idTamu' => $idTamu,
            'nama' => $data->nama,
            'jenisKelamin' => $data->jenisKelamin,
            'noTelp' => $data->noTelp,
            'alamat' => $data->alamat,
        ]);
    }

    public function edit($idTamu)
    {
        $guests=DB::table('guests as gs') 
                        ->select('gs.*')
                        ->where('gs.idTamu', $idTamu)
                        ->first();
        return view('guests.formedit', compact('guests'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guests = Guests::findOrFail($id);
        $guests->nama = $request->nama;
        $guests->jenisKelamin = $request->jenisKelamin;
        $guests->noTelp = $request->noTelp;
        $guests->alamat = $request->alamat;
        $guests->update();

        return redirect('guests')->with('msg', 'Data tamu '.$guests->idTamu.', '.$guests->nama.' berhasih diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guests $guests, $idTamu)
    {
        $data = $guests->find($idTamu);
        $data->delete();
        return redirect('guests')->with('msg', 'Data '.$data->nama.' berhasil dihapus');
    }
}
