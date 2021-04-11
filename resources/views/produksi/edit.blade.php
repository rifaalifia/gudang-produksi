@extends("produksi.layout")
@section("content")
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route("produksi.index")}}">Back</a>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route("produksi.update",$produksi->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input type="text" name="namabarang" value="{{$produksi->namabarang}}" class="form-control" placeholder="Nama Barang">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Spesifikasi</strong>
                    <input type="text" name="spesifikasi" value="{{$produksi->spesifikasi}}" class="form-control" placeholder="Spesifikasi">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input type="text" name="quantity" value="{{$produksi->quantity}}"  class="form-control" placeholder="Quantity">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Untuk Mesin</strong>
                    <input type="text" name="untukmesin" value="{{$produksi->untukmesin}}" class="form-control" placeholder="Untuk Mesin">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="text" name="keterangan" value="{{$produksi->keterangan}}" class="form-control" placeholder="Keterangan">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pengajuan</strong>
                    <input type="date" name="tanggalpengajuan" value="{{$produksi->tanggalpengajuan}}" class="form-control" placeholder="Tanggal Pengajuanr">

                </div>
            </div>
            <input type="hidden" name="status" value="unapprove">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
