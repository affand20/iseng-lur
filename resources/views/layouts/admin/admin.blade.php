<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    @yield('link')
  </head>
  <body>
    <div class="row content">
      <div class="col-lg-2 sidebar">
        <div class="col-lg-12 atas">
          <div class="brand">
            <img src="{{asset('image/ppwalisongo.png')}}" alt="">
          </div>
          <div id="profile-pic">
            <img src="{{asset('image/admin.png')}}" alt="">
            <h6>Admin</h6>
          </div>
        </div>
        <div class="col-lg-12 bawah">
          <div class="navigation">
            <a href="{{route('dashboard')}}" id="dashboard">Dashboard</a>
            <a href="{{route('kegiatan')}}" id="kegiatan">Kegiatan</a>
            <a href="{{route('dokumentasi')}}" id="dokumentasi">Dokumentasi</a>
            <a href="{{route('alumni')}}" id="alumni">Data Alumni</a>
            <a href="#" id="logout-small">
              Logout
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-10 main-content">
        <div class="col-lg-12 atas" id="kanan-atas">
          <a class="button float-right" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </a>
        </div>
        <div class="col-lg-12 bawah">
          @yield('content')
        </div>
      </div>
    </div>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    @yield('script')
  </body>
</html>
