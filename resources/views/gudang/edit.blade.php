@extends("gudang.layout")
@section("content")
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route("gudang.index")}}">Back</a>
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
    <form action="{{route("gudang.update",$gudang->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <input type="text" name="namabarang" value="{{$gudang->namabarang}}" class="form-control" placeholder="Nama Barang">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Spsifikasi</strong>
                    <input type="text" name="spesifikasi" value="{{$gudang->spesifikasi}}" class="form-control" placeholder="Spesifikasi">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah</strong>
                    <input type="text" name="jumlah" value="{{$gudang->jumlah}}" class="form-control" placeholder="Jumlah">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Satuan</strong>
                    <input type="text" name="satuan" value="{{$gudang->satuan}}"  class="form-control" placeholder="satuan">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Masuk</strong>
                    <input type="date" name="tanggalmasuk" value="{{$gudang->tanggalmasuk}}" class="form-control" placeholder="Tanggal Masuk">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Keluar</strong>
                    <input type="date" name="tanggalkeluar" value="{{$gudang->tanggalkeluar}}" class="form-control" placeholder="Tanggal Keluar">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
