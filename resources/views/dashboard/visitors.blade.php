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
                        <h6 class="h6">Guest Access Management System PT PLN Batam</h6>
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

            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3">

                        <label for="">Dari Tanggal</label>
                        <input type="date" class="form-control" id="from_date" value="{{ $from_date }}">
                    </div>
                    <div class="col-sm-3">

                        <label for="">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="to_date" value="{{ $to_date }}">
                    </div>
                    <div class="col-sm-3">
                        <div>&nbsp;</div>
                        <button type="button" id="filter" onclick="filter()" class="btn btn-primary">Filter</button>
                    </div>
                    <div class="col-sm-3">
                        <form action="" id="export-form" method="post">
                            @csrf
                            <div>&nbsp;</div>

                            <button type="button" onclick="onExport()" class="btn btn-success">Export</button>
                            <button type="submit" style="display: none;" id="button-export"
                                class="btn btn-success">Export</button>
                        </form>
                    </div>
                </div>

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


            <div class="col-sm-3">

                {{-- <form action="/buku-tamu" method="GET"> --}}
                <div class="input-group mb-3">
                    <input type="text" name="search" id="search" class="form-control input-pencarian"
                        onkeydown="search(this)" placeholder="Pencarian ..." value="{{ $search }}"
                        aria-label="Pencarian ..." aria-describedby="button-addon2">
                    <button class="btn btn-blue" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
                {{-- </form> --}}

            </div>


        </div>
    </div>

    <div class="card-body px-0 pb-2">

        <div class="table-responsive p-0">
            <table class="table align-items-center mt-4 mb-0 table-striped">
                <thead>
                    <tr>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">No</th>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">No.Identitas KTP
                        </th>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Nama</th>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder  ps-2">Detail</th>
                        <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Jam
                            Datang</th>
                        <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Jam
                            Pulang</th>
                        <th class="text-center text-uppercase text-center text-secondary text-xxs font-weight-bolder ">Aksi
                        </th>
                        <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">TTD</th> -->

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($visitors as $visitor)
                        <tr>
                            <td class="align-middle text-center text-sm">
                                {{ $loop->iteration + $visitors->perPage() * ($visitors->currentPage() - 1) }}</td>
                            <td class="align-middle text-center text-sm">
                                {{ $visitor->identity_number }}
                            </td>
                            <td class="align-middle text-center text-sm">
                                {{ $visitor->name }}
                            </td>

                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modalTTD{{ $visitor->id }}">
                                    <span class="material-icons">
                                        image
                                    </span>
                                </button>
                            </td>
                            <td class="align-middle text-center text-sm">
                                {{ $visitor->created_at }}
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if ($visitor->out_at === null && $visitor->status === 'accepted')
                                    <a href="#" class="btn btn-success font-weight-bold text-xs"
                                        data-bs-toggle="modal" data-bs-target="#modalPulang{{ $visitor->id }}">
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
                            <div class="modal fade" id="modalTTD{{ $visitor->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Tamu</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Asal Perusahaan : {{ $visitor->company }} <br>
                                            Tujuan : {{ $visitor->purpose }} <br>
                                            Barang Yang Dititipkan : {{ $visitor->detained_items ?? '' }} <br>
                                            Diberikan Kartu Visitor : {{ $visitor->is_given_card ? 'Ya' : 'Tidak' }} <br>

                                            <img src="/storage/{{ $visitor->signature }}" class="img-fluid"
                                                alt="...">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td>
                                {{-- Button trigger Approve --}}
                                @if ($visitor->status != 'accepted')
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalApprove{{ $visitor->id }}">
                                        {{-- <span class="material-icons">
                           delete_forever
                           </span> --}}
                           <span class="material-icons">
                            assignment_turned_in
                            </span>
                                    </button>
                                    {{-- Modal Approve --}}
                                    <div class="modal fade" id="modalApprove{{ $visitor->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="/visitor-approve/{{ $visitor->id }}" method="POST">
                                                    @csrf

                                                    <div>
                                                        <label for="">Barang yang dititipkan</label>
                                                        <input type="text" name="detained_items" class="form-control form-detained-item">
                                                    </div>
                                                    <div>
                                                        <label for="">Diberi Kartu Visitor?</label>
                                                        <input type="checkbox" name="is_given_card" value="1"
                                                            id="">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- Button trigger  Delete modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus{{ $visitor->id }}">
                                    <span class="material-icons">
                                        delete_forever
                                    </span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalHapus{{ $visitor->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="/delete-tamu/{{ $visitor->id }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-body text-center">
                                                    Yakin ingin menghapus?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <div class="modal fade" id="modalPulang{{ $visitor->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Konfirmasi
                                                Kepulangan Tamu</h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            Apakah tamu sudah pulang? <b> </b>
                                        </div>
                                        <form action="/tamu-pulang/{{ $visitor->id }}" method="POST">
                                            @csrf
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-secondary text-white"
                                                    data-bs-dismiss="modal">Batal</button>
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
            <div id="pagination">
                {{ $visitors->links() }}
            </div>
        </div>
    </div>

    </div>









    <script>
        function filter() {
            var from_date = document.getElementById('from_date').value ?? '';
            var to_date = document.getElementById('to_date').value ?? '';
            var search = document.getElementById('search').value ?? '';
            window.location.href = '/buku-tamu?from_date=' + from_date + '&to_date=' + to_date + '&search=' + search;
        }

        function search(ele) {
            if (event.key === 'Enter') {
                var from_date = document.getElementById('from_date').value ?? '';
                var to_date = document.getElementById('to_date').value ?? '';
                var search = document.getElementById('search').value ?? '';
                window.location.href = '/buku-tamu?from_date=' + from_date + '&to_date=' + to_date + '&search=' + search;
            }

        }

        function onExport() {
            var from_date = document.getElementById('from_date').value ?? '';
            var to_date = document.getElementById('to_date').value ?? '';
            var search = document.getElementById('search').value ?? '';
            var form = document.getElementById('export-form');
            var button_export = document.getElementById('button-export');
            form.action = '/visitor-export?from_date=' + from_date + '&to_date=' + to_date + '&search=' + search;
            button_export.click();
        }
    </script>
@endsection
