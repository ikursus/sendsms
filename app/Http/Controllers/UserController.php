<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $senarai_users = DB::table('users')
        ->orderBy('id', 'desc')
        ->paginate(1);

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
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']
        ]);

        // Dapatkan data dari borang
        $data = $request->all();

        return $data;

        // Simpan data ke dalam DB
        // return 'rekod telah berjaya di simpan';
    }

    public function edit($id)
    {
        // Query ke table user dan dapatkan rekod user yang nak di edit
        $user = DB::table('users')->find($id);
        // $user = DB::table('users')->where('id', '=', $id)->first();

        return view('temp_users.edit', compact('user'));
    }

    public function update($id) {
        // Simpan data ke dalam DB
        return 'rekod telah berjaya dikemaskini';
    }

    public function destroy() {
        // Simpan data ke dalam DB
        return 'rekod telah berjaya dihapuskan';
    }
}
