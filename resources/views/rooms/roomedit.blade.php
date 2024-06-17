@extends('layout.main')

@section('content')
    <h3>Edit Data Kamar</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('rooms') }}'">
                Kembali
            </button>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('rooms.update', $rooms->idKamar) }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                @csrf
                <div class="row mb-3">
                    <label for="idKamar" class="col-sm-2 col-form-label">Id Kamar</label>
                    <div class="col-sm-4">
                        <input disabled type="text" class="form-control-form-control-sm" id="idKamar" name="idKamar" value="{{ $rooms->idKamar }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-cotrol form-control-sm" name="tipe" id="tipe"  value="{{ $rooms->tipe }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-cotrol form-control-sm" name="harga" id="harga"  value="{{ $rooms->harga }}">
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