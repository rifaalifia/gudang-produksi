@extends("produksi.layout")
@section("content")
    <script>
        var obj_gudangs = <?php echo json_encode($gudangs); ?>
    </script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new pengajuan barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route("produksi.index") }}"> Back</a>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>whoops!</strong> There were some problems with your input<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route("produksi.store") }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Barang</strong>
                    <select class="form-control" name="namabarang" id="namabarang" onchange="changeSpes()">
                        <option selected disabled>-- Nama Barang --</option>
                        @foreach($arrayNamaBarang as $namabarang)
                            <option value="{{$namabarang}}">{{$namabarang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <script>
                function changeSpes() {
                    nama_barang = document.getElementById("namabarang").value;
                    document.getElementById("spesifikasi").innerHTML = '';
                    obj_gudangs.forEach(function(gudang) {
                        if (gudang['namabarang'] == nama_barang){
                            document.getElementById("spesifikasi").insertAdjacentHTML('beforeend','<option value="'+gudang['spesifikasi']+'">'+gudang['spesifikasi']+'</option>')
                        }
                    });
                }
            </script>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Spesifikasi</strong>
                    <select class="form-control" name="spesifikasi" id="spesifikasi">
                        <option selected disabled>-- Spesifikasi --</option>
                    </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity</strong>
                    <input type="text" name="quantity" class="form-control" placeholder="quantity">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Untuk Mesin</strong>
                    <input type="text" name="untukmesin" class="form-control" placeholder="Untuk Mesin">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pengajuan Barang</strong>
                    <input type="date" name="tanggalpengajuan" class="form-control" placeholder="Tanggal Pengajuan">

                </div>
            </div>

            <input type="hidden" name="status" value="unapprove">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </div>

    </form>
@endsection
