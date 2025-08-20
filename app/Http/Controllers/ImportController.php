<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\CalonSiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importForm()
    {
        return view('pengaturan.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new CalonSiswaImport, $request->file('file'));

        return redirect()->route('verifikasi.index')->with('success', 'Data berhasil diimport!');
    }
}
