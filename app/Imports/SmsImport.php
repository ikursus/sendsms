<?php

namespace App\Imports;

use App\Sms;
use Maatwebsite\Excel\Concerns\ToModel;

class SmsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sms([
            'penerima' => $row[0],
            'message' => $row[1],
            'status' => $row[2],
            'user_id' => $row[3]
        ]);
    }
}
