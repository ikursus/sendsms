<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // protected
    // private
    // public
    public function index() {
        return view('temp_users.index');
    }

    public function create() {
        return view('temp_users.tambah');
    }

    public function simpan() {
        // Simpan data ke dalam DB
        return 'rekod telah berjaya di simpan';
    }

    public function edit() {
        // Simpan data ke dalam DB
        return view('temp_users.edit');
    }

    public function update() {
        // Simpan data ke dalam DB
        return 'rekod telah berjaya dikemaskini';
    }

    public function destroy() {
        // Simpan data ke dalam DB
        return 'rekod telah berjaya dihapuskan';
    }
}
