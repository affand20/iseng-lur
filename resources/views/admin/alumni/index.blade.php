@extends('layouts.admin.admin')
@section('title') Data Alumni @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/alumni/alumni.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-alumni">
  <div class="mycard-header">
    <h2 class="card-title">Data Alumni</h2>
  </div>
  <div class="mycard-body">
    @if($count>0)
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
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $row)
      <tr>
        <td scope="row">
          <img src="{{asset('storage/'.$row->foto)}}" alt="" class="img-foto">
        </td>
        <td scope="row"><b>{{$row->nama}}</b></td>
        <td scope="row">{{$row->tanggal_lahir}}</td>
        <td scope="row">{{$row->tahun_masuk}}</td>
        <td scope="row">{{$row->alamat}}</td>
        <td scope="row">{{$row->kontak}}</td>
        <td scope="row">
          <form action="{{route('alumni.destroy', $row)}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    </div>
    @else
    <div class="nothing">
      <h4>Belum ada Alumni yang mendaftar</h4>
    </div>
    @endif
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('.navigation a').removeClass('active');
  $('#alumni').addClass('active');
</script>
@endsection
