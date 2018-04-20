@extends('layouts.admin.admin')
@section('title') Kegiatan @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/dokumentasi/dokumentasi.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-dokumentasi">
  <div class="mycard-header">
    <a href="{{route('dokumentasi')}}"><img src="{{asset('image/arrow-left.svg')}}" alt=""></a>
    <h2 class="card-title">Dokumentasi Kegiatan</h2>
  </div>
  <div class="mycard-body">
    <div class="form">
      <form action="{{route('dokumentasi.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <span class="label-kegiatan">Pilih Kegiatan</span><br>
        <div class="input-group mb-3">
          <select class="custom-select" id="inputGroupSelect01" required name="kegiatan_id">
            <option selected disabled>Pilih Kegiatan</option>
            @foreach($kegiatans as $kegiatan)
            <option value="{{$kegiatan->id}}">{{$kegiatan->nama_kegiatan}}</option>
            @endforeach
          </select>
        </div>
      <span class="label-foto">Foto</span><br>
      <img src="#" alt="" class="img-preview">
      <div class="custom-file">
        <input required type="file" accept="image/*" class="custom-file-input" id="foto" name="foto">
        <label class="custom-file-label" for="foto">Choose file</label>
      </div><br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('.navigation a').removeClass('active');
  $('#dokumentasi').addClass('active');

  function filePreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('.img-preview').siblings('br').remove();
        $('.img-preview').closest('br').remove();
        $('.img-preview').remove();
        $('.custom-file').closest('br').remove();
        $('.custom-file').before('<br><img src="'+e.target.result+'" alt="" class="img-preview"><br><br>');
        $('.custom-file').after('<br>');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#foto').change(function(){
    filePreview(this);
  });
</script>
@endsection
