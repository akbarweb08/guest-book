 <!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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


     <title>GAMS | {{$title}}</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/dashboard/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/dashboard/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->

  {{-- costum  --}}
  <link rel="stylesheet" href="/css/dashboard-global.css">

  {{-- icon bootstrap  --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="g-sidenav-show">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="/asset/logo.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Dashboard' ? 'active bg-gradient-info' : ''); ?> " href="/dashboard-admin">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Buku Tamu' ? 'active bg-gradient-info' : ''); ?> " href="/buku-tamu">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="bi bi-person-badge fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Buku Tamu</span>
          </a>
        </li>

        {{-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Data Master</h6>
        </li> --}}

        {{-- <li class="nav-item">
          <a class="nav-link text-white <?= ($title === 'Perusahaan Tamu' ? 'active bg-gradient-info' : ''); ?> " href="/perusahaan-tamu">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="bi bi-buildings fs-5"></i>
            </div>
            <span class="nav-link-text ms-1">Perusahaan</span>
          </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link text-white <?= ($title === 'Manajemen User' ? 'active bg-gradient-info' : ''); ?> " href="/manajemen-user">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="bi bi-people fs-5"></i>
              </div>
              <span class="nav-link-text ms-1">Manajemen User</span>
            </a>
          </li> --}}


      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <button class="btn bg-gradient-danger w-100" type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modalLogout">
             <i class="material-icons opacity-10">logout</i> Keluar
        </button>

        <!-- Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <small class="text-center">Apakah Anda Yakin Ingin Keluar</small>

       <form action="/logout" method="POST">
      @csrf

      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn bg-gradient-primary">Keluar</button>
      </div>
    </form>

    </div>
  </div>
</div>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

@yield('container')

  </main>

  <!--   Core JS Files   -->
  <script src="/dashboard/js/core/popper.min.js"></script>
  <script src="/dashboard/js/core/bootstrap.min.js"></script>
  <script src="/dashboard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/dashboard/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/dashboard/js/plugins/chartjs.min.js"></script>


  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/dashboard/js/material-dashboard.min.js?v=3.1.0"></script>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>
