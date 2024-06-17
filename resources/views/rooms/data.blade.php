@extends('layout.main')

@section('content')
    <h3>Data Kamar</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('rooms.create') }}" type="button" class="btn btn-sm btn-primary">
                <i style="font-size:14px" class="fa">&#xf055;</i> Tambah Data Kamar
            </a>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table table-sm table-steiped table-borderd">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Kamar</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->idKamar }}</td>
                            <td>{{ $row->tipe }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>
                                <a href={{ route('rooms.edit', $row->idKamar) }} class="btn btn-sm btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form onsubmit="return  deleteData()" style="display: inline" method="POST" action="{{ route('rooms.destroy', $row->idKamar) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteData(){
            pesan = confirm('data kamar akan dihapus?');
            if(pesan) return true;
            else return false;
        }
    </script>
@endsection