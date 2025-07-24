<?php

namespace App\Exports;

use App\Models\Calonsiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CalonSiswaExport implements FromCollection, WithHeadings
{
    protected $from, $to, $status;

    public function __construct($from = null, $to = null, $status = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->status = $status;
    }

    public function collection()
    {
        $query = Calonsiswa::query();

        if ($this->from && $this->to) {
            $query->whereBetween('created_at', [$this->from, $this->to]);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Pendaftaran',
            'Nama Lengkap',
            'NISN',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
            'No HP',
            'Email',
            'Asal Sekolah',
            'Tahun Lulus',
            'Nama Ayah',
            'Nama Ibu',
            'Pekerjaan Ayah',
            'Pekerjaan Ibu',
            'Nilai UN',
            'Nilai Raport',
            'Status',
            'Tanggal Daftar'
        ];
    }
}
