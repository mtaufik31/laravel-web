<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user (index)
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Tampilkan form tambah user (create)
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Simpan data user baru (store)
     */
    public function store(Request $request)
    {
        // Validasi Form
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $data = $request->only(['name', 'email']);
        // Enkripsi Password
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit user (edit)
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update data user (update)
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validasi Form Update
        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $data = $request->only(['name', 'email']);

        // Jika password diisi, update password baru
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui!');
    }

    /**
     * Hapus data user (destroy)
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
