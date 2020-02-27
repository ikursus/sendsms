<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    // protected
    // private
    // public
    public function index()
    {
        // $senarai_users = DB::table('users')->get();
        // $senarai_users = DB::table('users')->where('email', '=', 1)->get();
        // $senarai_users = DB::table('users')
        // ->where('id', '=', 1)
        // ->orWhere('status', '!=', 'active')
        // ->get();
        // $senarai_users = DB::table('users')
        // ->orderBy('id', 'desc')
        // ->paginate(5);

        $senarai_users = User::orderBy('id', 'desc')
        ->paginate(5);

        // dd($data) = Dump and die
        // dd($senarai_users);

        return view('temp_users.index', compact('senarai_users'));
    }

    public function create()
    {
        return view('temp_users.tambah');
    }

    public function simpan(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        // Dapatkan data dari borang
        $data = $request->only([
            'name',
            'email',
            'phone',
            'status',
            'role',
            'jantina'
        ]);

        // encrypt data password
        $data['password'] = bcrypt($request->input('password'));

        // Simpan data ke dalam DB
        DB::table('users')->insert($data);

        // Redirect ke halaman senarai users selepas selesai simpan rekod
        return redirect()->route('users.index')
        ->with('alert-mesej-sukses', 'Rekod telah berjaya ditambah!');
    }

    public function edit($id)
    {
        // Query ke table user dan dapatkan rekod user yang nak di edit
        $user = DB::table('users')->find($id);
        // $user = DB::table('users')->where('id', '=', $id)->first();

        return view('temp_users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate data
        $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', 'unique:users,email,' . $id]
        ]);

        // Dapatkan data dari borang
        $data = $request->only([
            'name',
            'email',
            'phone',
            'status',
            'role',
            'jantina'
        ]);

        // $variable = array('1' => 1, '2' => 2);
        // $variable = ['1' => 1, '2' => 2];
        // $variable['1'] = 1;
        // $variable['2'] = 2;
        // Update password baru sekiranya ruangan password TIDAK kosong
        // encrypt password dan attach kepada array $data
        if ( !empty($request->input('password')) )
        {
            $data['password'] = bcrypt($request->input('password'));
        }
        
        // Simpan data ke dalam DB
        DB::table('users')->where('id', $id)->update($data);

        // Redirect ke halaman senarai users selepas selesai simpan rekod
        return redirect()->route('users.index')
        ->with('alert-mesej-sukses', 'Rekod telah berjaya dikemaskini!');
    }

    public function destroy($id)
    {
        // Cari data yang ingin didelete berdasarkan ID user
        DB::table('users')->where('id', $id)->delete();

        // Redirect ke halaman senarai users selepas selesai simpan rekod
        return redirect()->route('users.index')
        ->with('alert-mesej-sukses', 'Rekod telah berjaya dihapuskan!');
    }
}
