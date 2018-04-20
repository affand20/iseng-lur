<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Dokumentasi;
use Storage;

class KegiatanController extends Controller
{
    public function index()
    {
      $kegiatan = Kegiatan::all();
      $count = Kegiatan::count();
      return view('admin.kegiatan.index', compact('kegiatan'))->with('count', $count);
    }

    public function create()
    {
      return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
      $this->validate(request(), [
        'nama' => 'required',
        'deskripsi' => 'required',
        'lokasi' => 'required',
        'waktu' => 'required',
        'poster' => 'mimes:jpeg,jpg,png',
      ]);

      if ($request->hasFile('poster')) {
        $simpan = Storage::put('kegiatan', request('poster'));
      } else{
        $simpan = null;
      }

      Kegiatan::create([
        'nama_kegiatan' => request('nama'),
        'deskripsi_kegiatan' => request('deskripsi'),
        'lokasi' => request('lokasi'),
        'waktu' => request('waktu'),
        'poster' => $simpan,
      ]);

      return redirect()->route('kegiatan');
    }

    public function edit(Kegiatan $kegiatan)
    {
      return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Kegiatan $kegiatan, Request $request)
    {
      $this->validate(request(), [
        'nama' => 'required',
        'deskripsi' => 'required',
        'lokasi' => 'required',
        'waktu' => 'required',
        'poster' => 'mimes:jpeg,jpg,png',
      ]);

      if ($request->hasFile('poster')) {
        if ($kegiatan->poster) {
          Storage::delete($kegiatan->poster);
        }
        $simpan = Storage::put('kegiatan', request('poster'));

      } else if ($kegiatan->poster) {
        $simpan = $kegiatan->poster;
      }

      $kegiatan->update([
        'nama_kegiatan' => request('nama'),
        'deskripsi_kegiatan' => request('deskripsi'),
        'lokasi' => request('lokasi'),
        'waktu' => request('waktu'),
        'poster' => $simpan,
      ]);

      return redirect()->route('kegiatan');
    }

    public function destroy(Kegiatan $kegiatan)
    {
      Storage::deleteDirectory('kegiatan/'.$kegiatan->nama_kegiatan);

      if ($kegiatan->poster) {
        Storage::delete($kegiatan->poster);
      }

      $kegiatan->delete();

      return redirect()->back();
    }
}
