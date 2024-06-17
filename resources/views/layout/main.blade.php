<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel kita</title>
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    {{-- nav --}}
    <nav class="navbar navbar-expand-lg bg-info navbar-light p-0">
      <div class="container-fluid">
        <a class="navbar-brand p-3" href="#">Hotel12</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" style="height: 4rem;">
            <li class="nav-item">
              <a class="nav-link p-3 {{ (request()->segment('1')=='' || request()->segment('1')== 'home') ? 'active' : ''}}" aria-current="page" href="{{ url('home') }}">
                  <i class="fas fa-tachometer-alt"></i> Beranda
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-3 {{ (request()->segment('1')== 'guests') ? 'active' : ''}}" aria-current="page" href="{{ url('guests') }}">
                  <i class="fas fa-user-alt"></i> Tamu
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-3 {{ (request()->segment('1')== 'rooms') ? 'active' : ''}}" aria-current="page" href="{{ url('rooms') }}">
                <i class="fas fa-hotel"></i> Kamar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-3 {{ (request()->segment('1')== 'transactions') ? 'active' : ''}}" aria-current="page" href="{{ url('transactions') }}">
                <i class="fas fa-money-check-alt"></i> Transaksi
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    {{-- end --}}

    {{-- content --}}
    <div class="mt-2">
        <div class="container">
            @yield('content')
        </div>
    </div>
    {{-- and --}}
    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>