@extends('layouts.admin.admin')
@section('title') Kegiatan @endsection
@section('link')
<link rel="stylesheet" href="{{asset('css/kegiatan/kegiatan.css')}}">
@endsection
@section('content')
<div class="mycard card-full" id="card-kegiatan">
  <div class="mycard-header">
    <a href="{{route('kegiatan')}}"><img src="{{asset('image/arrow-left.svg')}}" alt=""></a>
    <h2 class="card-title">Tambah Kegiatan</h2>
  </div>
  <div class="mycard-body">
    <div class="form">
      <form action="{{route('kegiatan.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="form-group">
        <label for="nama">Nama Kegiatan</label>
        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="NamaKegiatan" placeholder="Masukkan Nama Kegiatan" required>
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" aria-describedby="LokasiKegiatan" placeholder="Masukkan Lokasi Kegiatan" required>
      </div>
      <div class="form-group">
        <label for="waktu">Waktu Kegiatan</label>
        <input type="date" class="form-control" id="waktu" name="waktu" aria-describedby="WaktuKegiatan" placeholder="Masukkan Lokasi Kegiatan" required>
      </div>
      <span class="label-poster">Poster</span><br>
      <img src="#" alt="" class="img-preview">
      <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="poster" name="poster">
        <label class="custom-file-label" for="poster">Choose file</label>
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
  $('#kegiatan').addClass('active');

  function filePreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('.img-preview').siblings('br').remove();
        $('.img-preview').remove();
        $('.custom-file').before('<br><img src="'+e.target.result+'" alt="" class="img-preview"><br><br>');
        $('.custom-file').after('<br>');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#poster').change(function(){
    filePreview(this);
  });
</script>
@endsection
