@extends('layouts.admin.admin')
@section('title') Dashboard @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-dashboard">
  <div class="mycard-header">
    <span class="float-right">{{$count_alumni}} Terdaftar</span>
    <h2 class="card-title">Data Alumni</h2>
  </div>
  <div class="mycard-body">
    @if($count_alumni>0)
    <div class="table-responsive">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">Foto</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Angkatan</th>
          <th scope="col">Alamat</th>
          <th scope="col">Kontak</th>
        </tr>
      </thead>
      <tbody>
      @foreach($alumni as $row)
      <tr>
        <td scope="row">
          <img src="{{asset('storage/'.$row->foto)}}" alt="" class="img-foto">
        </td>
        <td scope="row"><b>{{$row->nama}}</b></td>
        <td scope="row">{{$row->tanggal_lahir}}</td>
        <td scope="row">{{$row->tahun_masuk}}</td>
        <td scope="row">{{$row->alamat}}</td>
        <td scope="row">{{$row->kontak}}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    @else
    <div class="nothing">
      <h6>Belum ada Alumni yang mendaftar</h6>
    </div>
    @endif
  </div>
</div>
<div class="card-menu">
  <div class="mycard card-quarter card-kegiatan">
    <div class="mycard-header">
      <span class="float-right">Total kegiatan : {{$count_kegiatan}}</span>
      <h5 class="card-title">Kegiatan</h5>
    </div>
    <div class="mycard-body">
      @if($count_kegiatan>0)
      <span><b>Yang akan datang</b></span>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            @foreach($kegiatan as $row)
            <tr>
              <td scope="row">{{$row->nama_kegiatan}}</td>
              <td scope="row">{{$row->lokasi}}</td>
              <td scope="row">{{$row->waktu}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div class="nothing">
        <h6>Belum ada Kegiatan yang ditambahkan</h6>
      </div>
      @endif
    </div>
  </div>
  <div class="mycard card-half">
    <div class="mycard-header">
      <!-- <span class="float-right">Total : {{$count_dokumentasi}} kegiatan</span> -->
      <h5 class="card-title">Dokumentasi</h5>
    </div>
    <div class="mycard-body">
      @if($count_dokumentasi>0)
      <div class="not nothing">
        <h4>{{$count_dokumentasi}} dokumentasi kegiatan telah ditambahkan</h4>
      </div>
      @else
      <div class="nothing">
        <h6>Belum ada Dokumentasi yang ditambahkan</h6>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('.navigation a').removeClass('active');
  $('#dashboard').addClass('active');
</script>
@endsection
