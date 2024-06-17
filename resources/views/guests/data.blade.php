@extends('layout.main')

@section('content')
    <h3>Data Tamu</h3>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('guests.create') }}" type="button" class="btn btn-sm btn-primary">
                <i style="font-size:14px" class="fa">&#xf055;</i> Tambah Data Tamu
            </a>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Id Tamu</th>
                        <th>Nama Tamu</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guests as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->idTamu }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ ($row->jenisKelamin=='M') ? 'Pria' : 'Wanita' }}</td>
                            <td>{{ $row->noTelp }}</td>
                            <td>{{ $row->alamat }}</td>

                                {{-- <td>
                                    <a href="" title="View Trader">
                                        <button class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true">
                                            </i>View
                                        </button>
                                    </a>
                                    <a href="" title="Edit Trader">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true">
                                            </i>Edit
                                        </button>
                                    </a>

                                    <form method="POST" action="" accept-charset="UTF-8" style="display: inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Treder" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                            <i class="fa fa-trash-o" aria-hidden="true">
                                            </i>Delete
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteData(){
            pesan = confirm('data tamu akan dihapus?');
            if(pesan) return true;
            else return false;
        }
    </script>
@endsection