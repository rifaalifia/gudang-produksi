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
    <title>PRINT DATA GUDANG</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN GUDANG</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>Id</th>
                <th>Nama Barang</th>
                <th>Spesifikasi</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
            </tr>
            @foreach($gudang as $Printgudang)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $Printgudang->namabarang}}</td>
                    <td>{{ $Printgudang->spesifikasi}}</td>
                    <td>{{ $Printgudang->jumlah}}</td>
                    <td>{{ $Printgudang->satuan}}</td>
                    <td>{{ $Printgudang->tanggalmasuk}}</td>
                    <td>{{ $Printgudang->tanggalkeluar}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript ">
        window.print();
    </script>

</body>

</html>

