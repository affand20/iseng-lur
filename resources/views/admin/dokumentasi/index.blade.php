@extends('layouts.admin.admin')
@section('title') Dokumentasi @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/dokumentasi/dokumentasi.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-dokumentasi">
  <div class="mycard-header">
    <h2 class="card-title">Dokumentasi</h2>
    <div class="right-menu">
      <a href="{{route('dokumentasi.create')}}" class="btn btn-success">Tambahkan Dokumentasi Kegiatan</a>
    </div>
  </div>
  <div class="mycard-body">
    @if($count>0)
    <div class="row list-foto">
      @foreach($nama_kegiatan as $nama)
      <div class="col-lg-2 col-3 folders">
        <a href="{{route('dokumentasi.view', $nama->nama_kegiatan)}}">
          <div class="icon">
            <img src="{{asset('image/folder.png')}}" alt="">
          </div>
          <span>{{$nama->nama_kegiatan}}</span>
        </a>
      </div>
      @endforeach
    </div>
    @else
    <div class="nothing">
      <h4>Belum ada Kegiatan dan Dokumentasi</h4>
    </div>
    @endif
  </div>
</div>
<!-- <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> -->
@endsection
@section('script')
<script type="text/javascript">
  $('.navigation a').removeClass('active');
  $('#dokumentasi').addClass('active');
</script>
@endsection
