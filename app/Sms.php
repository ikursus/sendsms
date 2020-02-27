<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    // Maklumat table yang perlu model ini hubungi
    protected $table = 'sms';

    // Maklumat data yang diperlukan dan dibenarkan simpan ke dalam table sms
    protected $fillable = [
        'penerima',
        'message',
        'status',
        'user_id'
    ];

    // Method relationship dari table sms kepada table users
    public function user()
    {
        //return $this->belongsTo(User::class);
        return $this->belongsTo('App\User', 'user_id');
    }
}
