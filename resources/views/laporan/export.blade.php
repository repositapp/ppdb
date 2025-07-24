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
        @foreach ($data as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->no_pendaftaran }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->asal_sekolah }}</td>
                <td>{{ $siswa->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
