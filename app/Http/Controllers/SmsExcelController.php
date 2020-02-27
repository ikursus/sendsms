<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SmsExport;
use App\Imports\SmsImport;
use Maatwebsite\Excel\Facades\Excel;

class SmsExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new SmsExport, date('ymd') . 'sms.xlsx');
    }

    public function import(Request $request) 
    {
        // Validasi kewujudan fail dengan format .xls atau .xlsx
        $request->validate([
            'fail_import' => 'required|file|mimes:xls,xlsx'
        ]);

        // Dapatkan fail yang ingin diimport
        $data_fail = $request->file('fail_import');

        // Import data dari fail ke table sms
        Excel::import(new SmsImport, $data_fail);
        
        return redirect()->route('sms.index')->with('alert-mesej-sukses', 'Proses import berjaya!');
    }
}
