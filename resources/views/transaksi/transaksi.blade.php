@extends('menu.menu')
@section('title', 'Transaksi')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Transaksi</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Transaksi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Pelanggan</th>
                                {{-- <th>Tanggal Transaksi</th> --}}
                                <th>Nama Barang</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($transaksi ?? [] as $t)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $t->kode_transaksi }}</td>
                                    <td>{{ $t->pelanggan->nama_pelanggan }}</td>
                                    {{-- <td>{{ $t->tanggal_transaksi }}</td> --}}
                                    <td>{{ $t->barang->nama_barang }}</td>
                                    <td>{{ $t->barang->harga }}</td>
                                    <td>{{ $t->status }}</td>
                                    <td align="center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="{{ url('#updateModal' . $t->id) }}"">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="{{ url('#deleteModal' . $t->id) }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('create.transaksi') }}" method="post" enctype="multipart/form">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="kode_transaksi">Kode Transaksi</label>
                            <input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control"
                                value="{{ $kode_transaksi }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_transaksi">Tanggal Transaksi</label>
                            <input type="text" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control"
                                value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pelanggan_id">Pelanggan</label>
                            <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                                <option value="">--Pilih Pelanggan--</option>
                                @foreach ($pelanggan ?? [] as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control">
                                <option value="">--Pilih Barang--</option>
                                @foreach ($barang ?? [] as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="total_transaksi">Total Transaksi</label>
                            <input type="text" name="total_transaksi" id="total_transaksi" class="form-control">
                        </div> --}}
                        <input type="hidden" name="status" value="dibayar"></input>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    @foreach ($transaksi as $j)
        <div class="modal fade" id="deleteModal{{ $j->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('delete.transaksi', $j->id) }}" method="GET" enctype="multipart/form">
                        <div class="modal-body">
                            @csrf
                            Apakah ingin menghapus transaksi {{ $j->kode_transaksi }} ???
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Update -->
    @foreach ($transaksi as $j)
        <div class="modal fade" id="updateModal{{ $j->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Transaksi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('update.transaksi', $j->id) }}" method="post" enctype="multipart/form">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="kode_transaksi">Kode Transaksi</label>
                                <input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control"
                                    value="{{ $j->kode_transaksi }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                <input type="text" name="tanggal_transaksi" id="tanggal_transaksi"
                                    class="form-control" value="{{ $j->tanggal_transaksi }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pelanggan_id">Pelanggan</label>
                                <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                                    @foreach ($pelanggan ?? [] as $p)
                                        <option value="{{ $p->id }}"
                                            {{ $j->pelanggan_id == $p->id ? ' selected' : '' }}>
                                            {{ $p->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="barang_id">Barang</label>
                                <select name="barang_id" id="barang_id" class="form-control">
                                    {{-- <option value="">--Pilih Barang--</option> --}}
                                    @foreach ($barang ?? [] as $b)
                                        <option value="{{ $b->id }}"
                                            {{ $j->barang_id == $b->id ? 'selected' : '' }}>
                                            {{ $b->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="total_transaksi">Total Transaksi</label>
                                <input type="text" name="total_transaksi" id="total_transaksi" class="form-control"
                                    value="{{ $j->total_transaksi }}">
                            </div> --}}
                            <input type="hidden" name="status" value="dibayar"></input>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
