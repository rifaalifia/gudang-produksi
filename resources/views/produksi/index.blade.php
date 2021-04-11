@extends("produksi.layout")
@section("content")
    <div class="pull-left">
        <h2>PRODUKSI</h2>
    </div>


    <div class="pull-right">
        <a class="btn btn-danger" href="{{ route("Login.Logout") }}"> Logout</a>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{route("produksi.create")}}">create new pengajuan barang</a>
                <a target="_blank" class="btn btn-primary" href="{{ route("produksi.Printproduksi") }}"> Print Data Pengajuan Barang Produksi <i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>
    @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Quantity</th>
            <th>Untuk Mesin</th>
            <th>Keterangan</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($produksis as $produksi)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $produksi->namabarang}}</td>
                <td>{{ $produksi->spesifikasi}}</td>
                <td>{{ $produksi->quantity}}</td>
                <td>{{ $produksi->untukmesin}}</td>
                <td>{{ $produksi->keterangan}}</td>
                <td>{{ $produksi->tanggalpengajuan}}</td>
                <td>{{$produksi->status}}</td>
                <td>
                    <form action ="{{ route("produksi.destroy",$produksi->id) }}" method="POST">
                        <a class="btn btn-success" href="{{ route("produksi.show",$produksi->id) }}">Send</a>
                        <a class="btn btn-primary" href="{{ route("produksi.edit",$produksi->id) }}">Edit</a>
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
