<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_sms = Sms::paginate(10);
        
        return view('temp_sms.index', compact('senarai_sms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temp_sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'penerima' => ['required', 'digits_between:10,11', 'starts_with:6', 'numeric'],
            'message' => ['required', 'max:150']
        ]);

        // Hantar SMS
        $some_data = array(
            'phone'=> $request->input('penerima'),
            'access_key'=>'XXXXXX',
            'secret_key'=>'XXXXXX',
            'message'=> $request->input('message')
        );  

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, 'https://app.smshandy.com/api/sms/send');  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);  
        curl_close($curl);
        $obj = json_decode($result);

        // return $result;
        // Simpan rekod ke dalam database

        // Cara 1 simpan data
        // $sms = new Sms;
        // $sms->penerima = $request->input('penerima');
        // $sms->message = $request->input('message');
        // $sms->status = $obj->status;
        // $sms->user_id = auth()->user()->id;
        // $sms->save();

        // Cara 2 simpan data
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = $obj->status;

        Sms::create($data);

        // Response redirect ke senarai sms
        return redirect()->route('sms.index')
        ->with('alert-mesej-sukses', 'SMS telah berjaya dikirimkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $sm
     * @return \Illuminate\Http\Response
     */
    public function show($sm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $sm
     * @return \Illuminate\Http\Response
     */
    public function edit($sm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sm
     * @return \Illuminate\Http\Response
     */
    public function destroy($sm)
    {
        //
    }
}
