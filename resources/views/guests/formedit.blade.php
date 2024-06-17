@extends('layout.main')

@section('content')
    <h3>Edit Data Tamu</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('guests') }}'">
                Kembali
            </button>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guests.update', $guests->idTamu) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="row mb-3">
                    <label for="txid" class="col-sm-2 col-form-label">Id Tamu</label>
                    <div class="col-sm-4">
                        <input disabled type="text" class="form-control form-control-sm" id="txid" name="txid" value="{{ $guests->idTamu }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Tamu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="{{ $guests->nama }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <select class="form-select form-select-sm" name="jenisKelamin" id="jenisKelamin">
                            <option value="" selected>-Pilih-</option>
                            <option value="M" {{ ($guests->jenisKelamin=='M') ? 'selected' : '' }}>Pria</option>
                            <option value="F" {{ ($guests->jenisKelamin=='F') ? 'selected' : '' }}>Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="noTelp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-cotrol form-control-sm" name="noTelp" id="noTelp"  value="{{ $guests->noTelp }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" class="form-control form-control-sm" id="alamat" cols="20" rows="10">{{ $guests->alamat }}</textarea>
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