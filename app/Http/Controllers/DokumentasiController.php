<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Dokumentasi;
use Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
      $nama_kegiatan = Kegiatan::all();
      $count = Kegiatan::count();
      return view('admin.dokumentasi.index', compact('nama_kegiatan'))->with('count', $count);
    }

    public function create()
    {
      $kegiatans = Kegiatan::all();
      return view('admin.dokumentasi.create', compact('kegiatans'));
    }

    public function store(Request $request)
    {
      $folder_name = Kegiatan::where('id', request('kegiatan_id'))->first()->nama_kegiatan;

      $this->validate(request(), [
        'kegiatan_id' => 'required',
        'foto' => 'required|mimes:jpeg,jpg,png',
      ]);

      Dokumentasi::create([
        'kegiatan_id' => request('kegiatan_id'),
        'url' => Storage::put('kegiatan/'.$folder_name, request('foto')),
      ]);

      return redirect()->route('dokumentasi');
    }

    public function view($nama_kegiatan)
    {
      $kegiatan_id = Kegiatan::select('id')->where('nama_kegiatan', $nama_kegiatan)->first()->id;
      $query = Dokumentasi::where('kegiatan_id', $kegiatan_id)->get();
      $count = $query->count();

      return view('admin.dokumentasi.view', compact('query'))->with('nama_kegiatan', $nama_kegiatan)->with('count', $count);
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
      Storage::delete($dokumentasi->url);
      $dokumentasi->delete();

      return redirect()->back();
    }
}
