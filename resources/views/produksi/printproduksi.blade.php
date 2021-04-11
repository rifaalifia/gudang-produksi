<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;

        }
    </style>
    <title>PRINT DATA PENGAJUAN PRODUKSI</title>
</head>
<body>
<div class="form-group">
    <p align="center"><b>LAPORAN DATA PENGAJUAN PRODUKSI</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Quantity</th>
            <th>Untuk Mesin</th>
            <th>Keterangan</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
        </tr>
        @foreach($produksi as $Printproduksi)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $Printproduksi->namabarang}}</td>
                <td>{{ $Printproduksi->spesifikasi}}</td>
                <td>{{ $Printproduksi->quantity}}</td>
                <td>{{ $Printproduksi->untukmesin}}</td>
                <td>{{ $Printproduksi->keterangan}}</td>
                <td>{{ $Printproduksi->tanggalpengajuan}}</td>
                <td>{{ $Printproduksi->status}}</td>
            </tr>
        @endforeach
    </table>
</div>
<script type="text/javascript ">
    window.print();
</script>

</body>

</html>


