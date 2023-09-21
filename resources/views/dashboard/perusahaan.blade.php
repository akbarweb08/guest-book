@extends('dashboard.partials.main')

@section('container')



   <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar Perusahaan Tamu</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Daftar Perusahaan Tamu</h6>
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

        <div class="col-sm-4">

          <a href="/form-quotation" class="btn btn-blue ">
          <span class="material-icons">
add_business
</span>
            Tambah Perusahaan Tamu</a>


        </div>

                  <div class="col-sm-8">

              <form action="/quotation" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-pencarian" placeholder="Pencarian ..." aria-label="Pencarian ..." aria-describedby="button-addon2">
                        <button class="btn btn-blue" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                      </div>
              </form>

              </div>

        </div>
            </div>

            <div class="card-body px-0 pb-2">

            <div class="table-responsive p-0">
            <table class="table align-items-center mt-4 mb-0 table-striped">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">Nama Perusahaan</th>

                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                  @endphp

                  <tr>
                    <td class="align-middle text-center text-sm">
                        {{ $i++ }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        asd
                    </td>

                    <td class="align-middle">
                        <a href="/form-quotation/" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="bi bi-pencil-square"></i>
                        </a>

                      </td>
                      <td class="align-middle">
                        <a href="#" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalHapus">
                          <i class="bi bi-trash3"></i>
                        </a>

        <!-- Modal Hapus -->
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               Apakah anda yakin ingin menghapus data quotation <b> </b>
              </div>
              <form action="/quotation/" method="POST">
                @csrf
                @method('DELETE')
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn bg-gradient-primary">Hapus</button>
              </div>
            </form>
            </div>
          </div>
        </div>
                    </td>


                  </tr>






                </tbody>
              </table>
            </div>
            </div>

  </div>










@endsection
