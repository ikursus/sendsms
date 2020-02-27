<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;
use PDF;

class SmsCetakController extends Controller
{
    public function print()
    {
        $senarai_sms = Sms::all();

        $pdf = PDF::loadView('temp_sms.pdf.cetak', compact('senarai_sms'));

        return $pdf->download(date('Y-m-d') . '-sms.pdf');
    }
}
