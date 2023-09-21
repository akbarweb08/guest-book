@extends('dashboard.partials.main')

@section('container')



   <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
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
<div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <i class="bi bi-clipboard-check"></i>
                    </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                        <i class="bi bi-exclamation-triangle"></i>
                    </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
</div>
<div class="container-fluid py-4">
    <div class="row">

        <div class="col-sm-4">

          <!-- <a href="/form-quotation" class="btn btn-blue ">
            <span class="material-icons">
                group_add
                </span>
            Tambah Pengunjung</a>
 -->
 {{-- <form action="/quotation" method="GET">
                    @csrf
                    <small>Status Tamu :</small>
                  <select class="custom-select" name="status">
                  <option selected>Status</option>
                  <option value="Pending">Belum Pulang</option>
                  <option value="Approve">Sudah Pulang</option>
                </select>
                <button class="btn btn-info" type="submit">Filter</button>
                </form> --}}

        </div>


              <div class="col-sm-8">

              <form action="/buku-tamu" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control input-pencarian" placeholder="Pencarian ..." aria-label="Pencarian ..." aria-describedby="button-addon2">
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
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">No</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">No.Identitas KTP</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Nama</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Asal Perusahaan</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder  ps-2">Tujuan</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder  ps-2">TTD</th>
                    <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Jam Datang</th>
                    <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Jam Pulang</th>
                    <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Aksi</th>
                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">TTD</th> -->

                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                  @endphp
                  @foreach ( $visitors as $visitor )

                  <tr>
                    <td class="align-middle text-center text-sm">{{ $loop->iteration + ($visitors->perPage() * ($visitors->currentPage() - 1)) }}</td>
                    <td class="align-middle text-center text-sm">
                        {{ $visitor->identity_number }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $visitor->name }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $visitor->company }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $visitor->purpose }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalTTD{{$visitor->id}}">
                            <span class="material-icons">
                                image
                                </span>
                          </button>
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $visitor->created_at }}
                    </td>
                    <td class="align-middle text-center text-sm">
                      @if ($visitor->out_at === Null)
                      <a href="#" class="btn btn-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalPulang">
                      <span class="material-icons">
                      event_available
                      </span>
                        </a>
                      @else
                      {{ $visitor->out_at }}
                      @endif
                    </td>

                    <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="modalTTD{{$visitor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tanda Tangan Tamu</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="/storage/{{$visitor->signature}}" class="img-fluid" alt="...">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                    <td>
                      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus">
 <span class="material-icons">
delete_forever
</span>
</button>

<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/delete-tamu/{{$visitor->id}}" method="POST">
      @method('DELETE')
      @csrf
      <div class="modal-body text-center">
        Yakin ingin menghapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
                    </td>

        <div class="modal fade" id="modalPulang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Konfirmasi Kepulangan Tamu</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
               Apakah tamu sudah pulang? <b> </b>
              </div>
              <form action="/tamu-pulang/{{$visitor->id}}" method="POST" >
                @csrf
              <div class="modal-footer">
                <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn bg-gradient-info ">Simpan</button>
              </div>
            </form>
            </div>
          </div>
        </div>


                  </tr>
                  @endforeach






                </tbody>
              </table>

              {{$visitors->links()}}
            </div>
            </div>

  </div>










@endsection
