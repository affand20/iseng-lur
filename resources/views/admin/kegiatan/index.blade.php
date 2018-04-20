@extends('layouts.admin.admin')
@section('title') Kegiatan @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/kegiatan/kegiatan.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-kegiatan">
  <div class="mycard-header">
    <div class="right-menu">
      <a href="{{route('kegiatan.create')}}" class="btn btn-success">Tambah Kegiatan</a>
    </div>
    <h2 class="card-title">Kegiatan</h2>
  </div>
  <div class="mycard-body">
    @if($count>0)
    <div class="table-responsive">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">Poster</th>
          <th scope="col">Nama Kegiatan</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Waktu</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($kegiatan as $row)
      <tr>
        <td scope="row">
          <img src="{{asset('storage/'.$row->poster)}}" alt="" class="img-kegiatan">
        </td>
        <td scope="row"><a href="#" class="details"><b>{{$row->nama_kegiatan}}</b></a></td>
        <td scope="row">{{$row->lokasi}}</td>
        <td scope="row">{{$row->waktu}}</td>
        <td scope="row">
          <a href="{{route('kegiatan.edit', $row)}}" class="btn btn-info">Edit</a>
        </td>
        <td scope="row">
          <form action="{{route('kegiatan.destroy', $row)}}" method="post">
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
      <h4>Belum ada Kegiatan yang ditambahkan</h4>
    </div>
    @endif
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('.navigation a').removeClass('active');
  $('#kegiatan').addClass('active');
</script>
@endsection
