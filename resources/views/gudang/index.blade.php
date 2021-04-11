@extends("gudang.layout")
@section("content")
    <div class="pull-left">
        <h2>GUDANG</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-danger" href="{{ route("Login.Logout") }}"> Logout</a>
    </div>

    <div class="card-header">
        <div class="col-lg-12 margin-tb">
            <div class="card-tools">
                <a class="btn btn-success" href="{{route("gudang.create")}}">Create New Bahan Baku</a>
                <a class="btn btn-success" href="{{route("gudang.listbahanbaku")}}">List Bahan Baku</a>
                <a target="_blank" class="btn btn-primary" href="{{ route("gudang.Printgudang") }}"> Print Data Gudang <i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>

{{--    <div class="pull-right">--}}
{{--        <a class="btn btn-primary" href="{{ route("gudang.Printgudang") }}"> Print Data Gudang <i class="fas fa-print"></i></a>--}}
{{--    </div>--}}

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
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($gudangs as $gudang)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $gudang->namabarang}}</td>
                <td>{{ $gudang->spesifikasi}}</td>
                <td>{{ $gudang->jumlah}}</td>
                <td>{{ $gudang->satuan}}</td>
                <td>{{ $gudang->tanggalmasuk}}</td>
                <td>{{ $gudang->tanggalkeluar}}</td>
                <td>
                    <form action="{{ route("gudang.destroy",$gudang->id) }}" method="POST">
{{--                        <a class="btn btn-info" href="{{ route("gudang.show",$gudang->id) }}">Show</a>--}}
                        <a class="btn btn-primary" href="{{ route("gudang.edit",$gudang->id) }}">Edit</a>
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

