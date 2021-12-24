<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Unit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('files.user.index', [
            'title' => 'User',
            'data' => User::orderBy('prev')->get()
        ]);
    }

    public function create()
    {
        return view('files.user.create', [
            'title' => 'User',
            'units' => Unit::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:admin',
            'pass' => 'required|min:6',
            'unit_id' => 'nullable',
            'prev' => 'required'
        ]);

        $validatedData['pass'] = Hash::make($validatedData['pass']);

        User::create($validatedData);

        return redirect('/user')->with('success', 'User ' . $request->username . ' berhasil ditambah!');
    }

    public function show($id)
    {
        return view('files.user.detail', [
            'title' => 'User',
            'data' => User::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('files.user.edit', [
            'title' => 'User',
            'data' => User::find($id),
            'units' => Unit::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'unit_id' => 'nullable',
            'prev' => 'nullable'
        ]);

        User::where('username', $id)->update($validatedData);

        return redirect('/user')->with('success', 'Data user ' . $id . ' berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (auth()->user()->username === $id) {
            return redirect('/user')->with('errorDel', 'Tidak bisa menghapus diri sendiri!');
        }

        User::destroy($id);

        return redirect('/user')->with('success', 'User ' . $id . ' berhasil dihapus!');
    }

    public function viewgantipass(Request $request, $id)
    {
        if ($request->route('id') != auth()->user()->username) {
            return abort('403');
        }

        return view('files.user.gantipass', [
            'title' => 'Ganti Password',
        ]);
    }

    public function gantipass(Request $request, $id)
    {
        $validatedData = $request->validate([
            'old_pass' => 'required',
            'pass' => 'required|min:6|string',
            'confirmed_pass' => 'required_with:pass|same:pass'
        ]);


        $validatedData['pass'] = Hash::make($request->pass);

        if (!Hash::check($request->old_pass, auth()->user()->pass)) {
            return back()->with('error', 'Password lama salah!');
        }

        if (Hash::check($request->old_pass, $validatedData['pass'])) {
            return back()->with('error', 'Password baru tidak boleh sama dengan password lama.');
        }

        User::where('username', $id)->update([
            'pass' => $validatedData['pass']
        ]);

        return back()->with('success', 'Password berhasil diganti!');
    }
}
