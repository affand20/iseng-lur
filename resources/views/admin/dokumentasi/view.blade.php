@extends('layouts.admin.admin')
@section('title') Dokumentasi @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/dokumentasi/dokumentasi.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-dokumentasi">
  <div class="mycard-header">
    <a href="{{route('dokumentasi')}}"><img src="{{asset('image/arrow-left.svg')}}" alt=""></a>
    <h2 class="card-title">{{$nama_kegiatan}}</h2>
  </div>
  <div class="mycard-body">
    @if($count>0)
    <div class="row list-foto">
      @foreach($query as $foto)
      <div class="col-lg-4 col-12 photos">
        <div class="div-img">
          <img class="img-kegiatan" src="{{asset('storage/'.$foto->url)}}" alt="">
        </div>
        <div class="action-btn">
          <button class="btn btn-success col-lg-9 col-12" type="button" name="button">Unduh</button>
          <form action="{{route('dokumentasi.destroy', $foto)}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger col-lg-9 col-12">Hapus</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="nothing">
      <h4>Belum ada dokumentasi</h4>
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
