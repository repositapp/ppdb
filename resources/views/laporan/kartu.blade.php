<!DOCTYPE html>
<html>

<head>
    <title>Kartu Ujian</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ttd {
            float: right;
            text-align: center;
            margin-top: 80px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        td {
            padding: 5px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="header">
        <h2>{{ $aplikasi->nama_lembaga }}</h2>
        <p>{{ $aplikasi->alamat }} | Telp: {{ $aplikasi->telepon }}</p>
        <h3>Kartu Ujian Calon Siswa</h3>
    </div>

    <table>
        <tr>
            <td><b>No Pendaftaran</b></td>
            <td>: {{ $siswa->no_pendaftaran }}</td>
        </tr>
        <tr>
            <td><b>Nama Lengkap</b></td>
            <td>: {{ $siswa->nama_lengkap }}</td>
        </tr>
        <tr>
            <td><b>Asal Sekolah</b></td>
            <td>: {{ $siswa->asal_sekolah }}</td>
        </tr>
        <tr>
            <td><b>Tanggal Lahir</b></td>
            <td>: {{ $siswa->tanggal_lahir }}</td>
        </tr>
    </table>

    <div class="ttd">
        <p>{{ now()->translatedFormat('d F Y') }}</p>
        <p>Ketua Panitia</p>
        <br><br>
        <p><b>{{ $aplikasi->nama_ketua }}</b></p>
    </div>
</body>

</html>
