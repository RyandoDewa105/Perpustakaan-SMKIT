@extends('adminlte::page')

@section('title', 'Data Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Data Buku</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>Data Buku</span>
                        <a href="#" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#modalTambah">+ Tambah</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped-column  accent-blue table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Tanggal Terbit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($buku as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{  $item->judul }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->tgl_terbit }}</td>
                                    <td><a href="#" class="btn btn-success m-2" data-toggle="modal" data-target="#modalEdit">Edit</a>
                                        <a href="#" class="btn btn-danger" data-target="#modalHapus" data-toggle="modal">Hapus</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Tambah --}}
        <div class="modal fade modalTambah " id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('TambahBuku')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="namelHelp"
                                name="nama">
                                <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" aria-describedby="nameHelp"
                                name="nama">
                                <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" aria-describedby="namelHelp"
                                name="nama">
                                <label for="tanggal">Tanggal Terbit</label>
                            <input type="date" class="form-control" id="tanggal" aria-describedby="nameHelp"
                                name="nama">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button class="btn btn-danger" data-dismiss="modal">batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        {{-- Modal Edit --}}
        <div class="modal fade modalEdit " id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formEdit" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" aria-describedby="namelHelp"
                                name="nama">
                                <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" aria-describedby="nameHelp"
                                name="nama">
                                <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" aria-describedby="namelHelp"
                                name="nama">
                                <label for="tanggal">Tanggal Terbit</label>
                            <input type="text" class="form-control" id="tanggal" aria-describedby="nameHelp"
                                name="nama">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Edit</button>
                        <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus-->
    <div class="modal fade modalHapus" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formHapus">
                        <p class="modal-text"></p>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#modalTambah').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var nama = button.data('nama')
            document.getElementById('formTambah').action = 'kategori/' + id;
            $('#namaTambah').val(nama);
        })
    });
</script>

@endsection
