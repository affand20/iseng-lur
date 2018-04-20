<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use Storage;

class AlumniController extends Controller
{
    public function index()
    {
      $data = Alumni::all();
      $count = Alumni::count();
      return view('admin.alumni.index', compact('data'))->with('count', $count);
    }

    public function store(Request $request)
    {
      $this->validate(request(),[
        'namalengkap' => 'required',
        'ttl' => 'required',
        'tahunmasuk' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
        'foto' => 'required|mimes:jpg,jpeg,png',
      ]);

      // if ($request->hasFile('foto')) {
      //   $simpan = Storage::put('alumni', request('foto'));
      // }

      Alumni::create([
        'nama' => request('namalengkap'),
        'tanggal_lahir' => request('ttl'),
        'tahun_masuk' => request('tahunmasuk'),
        'alamat' => request('alamat'),
        'kontak' => request('kontak'),
        'foto' => Storage::put('alumni', request('foto')),
      ]);

      return redirect()->route('public.index');
    }

    public function destroy(Alumni $alumni)
    {
      if ($alumni->foto) {
        Storage::delete($alumni->foto);
      }
      $alumni->delete();

      return redirect()->back();
    }
}
