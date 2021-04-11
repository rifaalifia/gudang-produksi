@extends("gudang.layout")
@section("content")
    <div class="pull-left">
        <h2>List Bahan Baku</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route("gudang.index") }}"> Back</a>
    </div>

    <div class="pull-right">
        <a target="_blank" class="btn btn-primary" href="{{ route("gudang.Printbahan") }}"> Print List Bahan Baku <i class="fas fa-print"></i></a>
    </div>

    @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get("unsuccess"))
        <div class="alert alert-danger">
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

        @foreach ($listbahanbakus as $listbahanbaku)
            <tr>
{{--                <td>{{ ++$i }}</td>--}}
                <td>{{ $listbahanbaku->id }}</td>
                <td>{{ $listbahanbaku->namabarang}}</td>
                <td>{{ $listbahanbaku->spesifikasi}}</td>
                <td>{{ $listbahanbaku->quantity}}</td>
                <td>{{ $listbahanbaku->untukmesin}}</td>
                <td>{{ $listbahanbaku->keterangan}}</td>
                <td>{{ $listbahanbaku->tanggalpengajuan}}</td>
                <td>{{ $listbahanbaku->status}}</td>
                <td>
                    @if ($listbahanbaku->status == "unapprove")
                        <form action="{{route("gudang.changestatus",$listbahanbaku->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="id" value="{{$listbahanbaku->id}}">
                            <input type="hidden" name="status" value="approve">
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </form>
                    @endif
                    @if ($listbahanbaku->status == "approve")
                        <form action="{{route("gudang.changestatus",$listbahanbaku->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="id" value="{{$listbahanbaku->id}}">
                            <input type="hidden" name="status" value="unapprove">
                            <button type="submit" class="btn btn-danger">Unapprove</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
