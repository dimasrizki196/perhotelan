<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Guests;
use App\Models\Rooms;
use App\Http\Requests\StoreTransactionsRequest;
use App\Http\Requests\UpdateTransactionsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $transactions=Transactions::all();
        $transactions=DB::table('transactions as tr') 
                        ->leftJoin('guests as gs', 'gs.idTamu', '=', 'tr.idTamu')
                        ->leftJoin('rooms as rm', 'rm.idKamar', '=', 'tr.idKamar')
                        ->select('tr.*', 'gs.nama', 'rm.tipe')
                        ->get();
        return view ('transactions.data', compact('transactions'));
    }

    /**
     * Show the room for creating a new resource.
     */
    public function store(Request $request)
    {
        $transactions = new Transactions();
        $transactions->idTransaksi = $request->idTransaksi;
        $transactions->idTamu = $request->idTamu;
        $transactions->idKamar = $request->idKamar;
        $transactions->tglMasuk = $request->tglMasuk;
        $transactions->tglKeluar = $request->tglKeluar;
        $transactions->totalHarga = $request->totalHarga;
        $transactions->save();

        return redirect()->route('transactions.index')->with('msg', 'Data Transaksi berhasil ditambahkan');
    }

    public function create(Request $request)
    {
        $guests=Guests::all();
        $rooms=Rooms::all();
        return view('transactions.tradd', compact('guests', 'rooms'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transactions, $idTransaksi)
    {
        $data =$transactions->find($idTransaksi);
        return view('transactions.tredit')->with([
            'idTransaksi' => $idTransaksi,
            'idTamu' => $data->idTamu,
            'idKamar' => $data->idKamar,
            'tglMasuk' => $data->tglMasuk,
            'tglKeluar' => $data->tglKeluar,
            'totalHarga' => $data->totalHarga
        ]);
    }

    public function edit($id)
    {
        $guests=Guests::all();
        $rooms=Rooms::all();
        $transactions=DB::table('transactions as tr') 
                        ->leftJoin('guests as gs', 'gs.idTamu', '=', 'tr.idTamu')
                        ->leftJoin('rooms as rm', 'rm.idKamar', '=', 'tr.idKamar')
                        ->select('tr.*', 'gs.nama', 'rm.tipe', 'rm.harga')
                        ->where('tr.idTransaksi', $id)
                        ->first();
        return view('transactions.tredit', compact('transactions', 'guests', 'rooms'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transactions = Transactions::findOrFail($id);
        $transactions->idTamu = $request->idTamu;
        $transactions->idKamar= $request->idKamar;
        $transactions->tglMasuk = $request->tglMasuk;
        $transactions->tglKeluar = $request->tglKeluar;
        $transactions->totalharga = $request->totalHarga;
        $transactions->update();

        return redirect('transactions')->with('msg', 'Data transaksi '.$transactions->idTransaksi.', '.$transactions->nama.' berhasih diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions, $idTransaksi)
    {
        $data = $transactions->find($idTransaksi);
        $data->delete();
        return redirect('transactions')->with('msg', 'Data '.$data->idTamu.', '.$data->idKamar.' berhasil dihapus');
    }
}
