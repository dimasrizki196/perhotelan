@extends('layout.main')

@section('content')
    <h3>Edit Data Transaksi</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('transactions') }}'">
                Kembali
            </button>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('transactions.update', $transactions->idTransaksi) }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                @csrf
                <div class="row mb-3">
                    <label for="idTransaksi" class="col-sm-2 col-form-label">Id Transaksi</label>
                    <div class="col-sm-4">
                        <input disabled type="text" class="form-control form-control-sm" id="idTransaksi" name="idTransaksi" value="{{ $transactions->idTransaksi }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="idTamu" class="col-sm-2 col-form-label">Tamu</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="idTamu" id="idTamu">
                            <option value="{{ $transactions->idTamu }}">{{ $transactions->nama }}</option>
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
                            <option value="{{ $transactions->idKamar }}">{{ $transactions->tipe }} - {{ $transactions->harga }}</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->idKamar }}">{{ $room->tipe }} - {{ $room->harga }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tglMasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control form-control-sm" id="tglMasuk" name="tglMasuk" value="{{ $transactions->tglMasuk }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tglKeluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control form-control-sm" id="tglKeluar" name="tglKeluar" value="{{ $transactions->tglKeluar }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="totalHarga" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control form-control-sm" id="totalHarga" name="totalHarga" value="{{ $transactions->totalHarga }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btm-sm btn-success">
                            Perbarui
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection