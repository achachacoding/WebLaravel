<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::get();

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        try {

        $users = new Users();

        $users->name = $request->name;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);

        $users->save();

         // Jika berhasil
        return redirect('/admin/users')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/users')->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = Users::find($id);

        return view('admin.users.edit', ['users' => $users, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        try {

        $users = Users::find($id);

        $users->name = $request->name;
        $users->username = $request->username;
        $users->password = $request->password;

        $users->save();

         // Jika berhasil
        return redirect('/admin/users')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
        // Jika gagal
        return redirect('/admin/users')->with('error', 'Gagal mengedit data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::find($id);

        // DEBUG
   
        if (!$users) {
        return redirect('/admin/users')->with('error', 'User tidak ditemukan.');
        }

        // Cek apakah user yang akan dihapus adalah yang terakhir
        $totalUsers = Users::count();

        if ($totalUsers <= 1) {
        return redirect('/admin/users')->with('error', 'Tidak bisa menghapus. Minimal harus ada satu user.');
        }

        // (Opsional) Cegah user menghapus dirinya sendiri
        if (Auth::id() === (int) $users->id) {
        return redirect('/admin/users')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        try {
            
        $users->delete();

        return redirect('/admin/users')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        return redirect('/admin/users')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
