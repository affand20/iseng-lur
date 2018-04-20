<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Alumni;
use App\Dokumentasi;

class DashboardController extends Controller
{
    public function index()
    {
      $count_kegiatan = Kegiatan::count();
      $count_alumni = Alumni::count();
      $count_dokumentasi = Dokumentasi::count();

      $kegiatan = Kegiatan::select('nama_kegiatan', 'lokasi', 'waktu')
                            ->where('waktu', '>', NOW())
                            ->orderBy('waktu', 'asc')
                            ->limit(5)
                            ->get();

      $alumni = Alumni::limit(5)
                        ->get();

      return view('admin.index')->with('kegiatan', $kegiatan)
                                ->with('count_kegiatan', $count_kegiatan)
                                ->with('alumni', $alumni)
                                ->with('count_alumni', $count_alumni)
                                ->with('count_dokumentasi', $count_dokumentasi);
    }

    public function publicindex()
    {
      return view('user.index');
    }
}
