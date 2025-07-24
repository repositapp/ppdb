<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendaftar</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .header {
            text-align: center;
        }

        .ttd {
            margin-top: 50px;
            float: right;
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="header">
        <h2>{{ $aplikasi->nama_lembaga }}</h2>
        <p>{{ $aplikasi->alamat }} | Telp: {{ $aplikasi->telepon }}</p>
        <hr>
        <h3>Laporan Data Pendaftar</h3>
        @if ($from && $to)
            <p>Periode: {{ date('d-m-Y', strtotime($from)) }} s.d. {{ date('d-m-Y', strtotime($to)) }}</p>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Pendaftaran</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Asal Sekolah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_pendaftaran }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->asal_sekolah }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        <p>{{ now()->translatedFormat('d F Y') }}</p>
        <p>Ketua Panitia</p><br><br><br>
        <p><b>{{ $aplikasi->nama_ketua }}</b></p>
    </div>
</body>

</html>
