<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/index.css')}}">
  </head>
  <body>
    <div class="section-one">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
          <img src="{{asset('image/ppwalisongo.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <img src="{{asset('image/menu.svg')}}" alt="">
        </button>
        <div class="collapse navbar-collapse float-right" id="navbarTogglerDemo02">
          <a href="#" class="links">UPCOMING EVENTS</a>
          <a href="#" class="links">PAST EVENTS</a>
        </div>
      </nav>
      <div class="school">
        <img src="{{asset('image/ppws.jpg')}}" alt="">
      </div>
      <div class="center-text">
        <h4>Mau reunian sama temen pondok jadi lebih mudah ?</h4>
        <h4>Yuk buruan daftarkan namamu</h4><br><br>
        <button type="button" class="button" data-toggle="modal" data-target="" href="#registeralumni">Daftar Alumni</button>
      </div>
    </div>
    <!-- Modal register form alumni -->
    <div class="modal fade" id="registeralumni" tabindex="-1" role="dialog" aria-labelledby="registeralumni" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registeralumni">Register Alumni PP Wali Songo Ngabar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('alumni.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label for="namalengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="namalengkap" name="namalengkap" required placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="ttl">Tanggal Lahir</label>
                <input type="date" class="form-control" id="ttl" name="ttl" required>
              </div>
              <div class="form-group">
                <label for="tahunmasuk">Tahun Masuk</label>
                <input type="text" class="form-control" id="tahunmasuk" placeholder="Tahun Masuk Anda" name="tahunmasuk" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
              </div>
              <div class="form-group">
                <label for="kontak">Kontak (Email/Line/WA)</label>
                <input type="text" class="form-control" id="kontak" placeholder="Kontak (Email/Line/WA)" name="kontak" required>
              </div>
              <span class="label-foto">Foto</span><br>
              <img src="#" alt="" class="img-preview">
              <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" id="foto" name="foto" required>
                <label class="custom-file-label" for="foto">Choose file</label>
              </div><br><br>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript">
    $('#registeralumni').on('hide.bs.modal', function(){
      $('input:text, input[type=date]').val("");
      $('.img-preview').attr('src', '#');
      $('.img-preview').siblings('br').remove();
      $('.img-preview').after('<br><br>');
      $('.custom-file').after('<br><br>');
    })
    function filePreview(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
          $('.img-preview').siblings('br').remove();
          $('.img-preview').before('<br>');
          $('.img-preview').attr('src', e.target.result);
          $('.img-preview').after('<br><br>');
          $('.custom-file').after('<br><br>');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $('#foto').change(function(){
      filePreview(this);
    });
    </script>
  </body>
</html>
