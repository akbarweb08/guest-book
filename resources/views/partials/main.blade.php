<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- favicon  --}}
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/asset/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/asset/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/asset/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/asset/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/asset/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/asset/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/asset/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/asset/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="/asset/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="/asset/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="/asset/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="/asset/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="/asset/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

    {{-- icon bootstrap  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    {{-- css costum  --}}
    <link rel="stylesheet" href="/css/global.css">
    <title>GAMS | Guest Access Management System PLN Batam </title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="/">
            <img src="/asset/logo.png" alt="Logo SiCATAT PT PLN Batam" class="img-fluid d-flex justify-content-start logo-navbar">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto mt-2 mx-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/form-tamu">Form Tamu <span class="sr-only"></span></a>
                    </li>
                    @if (!Auth::check())

                    <li class="nav-item">
                        <button type="button" class="btn btn-kuning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                          </button>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard-admin">Buku Tamu </a>
                    </li>
                    @endif


                </ul>
            </div>
        </div>
    </nav>
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <img src="/asset/logo-login.png" class="img-fluid mx-5" style="margin-left:120px;" alt="">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="login" method="POST" class="" >
        <div class="modal-body">
                @csrf
                   <div class="form-floating rounded-pill mb-3">
                       <input type="text" class="form-control rounded-pill" name="username" id="floatingInput" placeholder="Username">
                       <label for="floatingInput">Username</label>
                   </div>
                   <div class="form-floating rounded-pill mb-3">
                       <input type="password" class="form-control rounded-pill" name="password" id="Password" placeholder="Nama">
                       <label for="Password">Password</label>
                   </div>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill btn-login">Masuk</button>

                <div class="modal-footer">
                </div>
            </form>
      </div>
    </div>
  </div>
        @yield('container')
    @include('partials.footer')



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>

</html>
