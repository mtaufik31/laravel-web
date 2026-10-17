<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Menampilkan form tambah matakuliah";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Menyimpan Data Matakuliah";
    }

    /**
     * Display the specified resource.
     */
    public function show($kode = null)
    {
        if ($kode == "ST445") {
            return "Anda mengakses matakuliah ST445";
        }
            return "Masukkan kode matakuliah!";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return "Menampilkan form edit matakuliah dengan ID $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(String $id)
    {
        return "Mengupdate data matakuliah dengan ID $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        return "Menghapus data matakuliah dengan ID $id";
    }
}
