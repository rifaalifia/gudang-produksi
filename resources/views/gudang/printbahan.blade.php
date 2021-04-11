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
    <title>PRINT DATA LIST BAHAN BAKU</title>
</head>
<body>
<div class="form-group">
    <p align="center"><b>LAPORAN LIST BAHAN BAKU</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Quantity</th>
            <th>Untuk Mesin</th>
            <th>Keterangan</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
        </tr>
        @foreach($bahanbaku as $Printbahan)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $Printbahan->namabarang}}</td>
                <td>{{ $Printbahan->spesifikasi}}</td>
                <td>{{ $Printbahan->quantity}}</td>
                <td>{{ $Printbahan->untukmesin}}</td>
                <td>{{ $Printbahan->keterangan}}</td>
                <td>{{ $Printbahan->tanggalpengajuan}}</td>
                <td>{{ $Printbahan->status}}</td>
            </tr>
        @endforeach
    </table>
</div>
<script type="text/javascript ">
    window.print();
</script>

</body>

</html>


