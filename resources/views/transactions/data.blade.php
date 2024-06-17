@extends('layout.main')

@section('content')
    <h3>Data Transaksi</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('transactions.create') }}" type="button" class="btn btn-sm btn-primary" >
                <i style="font-size:14px" class="fa">&#xf055;</i> Tambah Transaksi
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
                        <th>Id Transaksi</th>
                        <th>Tamu</th>
                        <th>Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Total Harga</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->idTransaksi }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->tipe }}</td>
                            <td>{{ $row->tglMasuk}}</td>
                            <td>{{ $row->tglKeluar}}</td>
                            <td>{{ $row->totalHarga }}</td>
                            <td>
                                <a href={{ route('transactions.edit', $row->idTransaksi) }} class="btn btn-sm btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form onsubmit="return  deleteData()" style="display: inline" method="POST" action="{{ route('transactions.destroy', $row->idTransaksi) }}">
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
            pesan = confirm('data transaksi akan dihapus?');
            if(pesan) return true;
            else return false;
        }
    </script>
@endsection