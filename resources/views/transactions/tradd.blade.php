@extends('layout.main')

@section('content')
    <h3>Data Transaksi Baru</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('transactions') }}'">
                Kembali
            </button>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="idTransaksi" class="col-sm-2 col-form-label">Id Transaksi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" id="idTransaksi" name="idTransaksi" value="{{ old('idTransaksi') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="idTamu" class="col-sm-2 col-form-label">Tamu</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="idTamu" id="idTamu">
                            <option value="">--pilih Tamu--</option>
                            @foreach ($guests as $guest)
                                <option value="{{ $guest->idTamu }}">{{ $guest->nama }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="idKamar" class="col-sm-2 col-form-label">Kamar</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="idKamar" id="idKamar">
                            <option value="">--pilih Kamar--</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->idKamar }}">{{ $room->tipe }} - {{ $room->harga }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tglMasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control form-control-sm" id="tglMasuk" name="tglMasuk" value="{{ old('tglMasuk') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tglKeluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control form-control-sm " id="tglKeluar" name="tglKeluar" value="{{ old('tglKeluar') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="totalHarga" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control form-control-sm " id="totalHarga" name="totalHarga" value="{{ old('totalHarga') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btm-sm btn-success">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection