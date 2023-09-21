@extends('dashboard.partials.main')

@section('container')



   <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm text-blue"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

        </div>
        <ul class="navbar-nav  justify-content-end">

         <li>
         <h6 class="h6">Sistem Catat Tamu PT PLN Batam</h6>

         </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>



        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-blue shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">people</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-lg mb-0 text-capitalize">Kunjungan Tamu</p>
              <h4 class="mb-0">{{count($visitor)}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <a href="/buku-tamu" class="btn bg-blue mb-0"> Selengkapnya</a>

          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-blue shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">apartment</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-lg mb-0 text-capitalize">Perusahaan Tamu</p>
                <h4 class="mb-0">{{count($company)}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <a href="/perusahaan-tamu" class="btn bg-blue mb-0"> Selengkapnya</a>

          </div>
        </div>
      </div>

    </div>


  </div>










@endsection
