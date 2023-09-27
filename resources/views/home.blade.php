@extends('partials.main')


<style type="text/css">
    .signature-pad {
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        height: 260px;
    }
    h1{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>


@section('container')

{{-- banner  --}}

<div class="jumbotron mt-5 banner-home" style=" background-image: url('/asset/banner-home.png');">
  <h1 class="display-4 text-white text-center font-weight-bolder">GAMS PT PLN Batam</h1>
  <h1 class="display-4 text-white text-center">Guest Access Management System PT PLN Batam</h1>
  <hr class="my-4">
</div>
{{-- akhir banner  --}}


<div class="container">

<h3 class="h3 text-center">Transformasi Penerimaan Tamu Modern</h3>
<div class="row mt-4">


<div class="col-sm-4">
<div class="card" style="width: 23rem;">
  <div class="card-body">
    <h5 class="card-title icon text-center"><i class="bi bi-shield-exclamation"></i></h5>
    <h6 class="card-subtitle mb-2 text-muted text-center">Keamanan dan Kontrol yang Lebih Baik</h6>
    <p class="card-text text-center">Aplikasi ini meningkatkan keamanan dengan memberikan kendali yang lebih baik terhadap siapa yang bertamu.</p>
  </div>
</div>
</div>




<div class="col-sm-4">
<div class="card" style="width: 23rem;">
  <div class="card-body">
    <h5 class="card-title icon text-center"><i class="bi bi-file-earmark-person"></i></h5>
    <h6 class="card-subtitle mb-2 text-muted text-center">Pemantauan dan Pelaporan yang Efisien</h6>
    <p class="card-text text-center">Aplikasi ini memberikan laporan rinci tentang aktivitas tamu, mempermudah pemantauan dan pelaporan yang lebih efisien.</p>
  </div>
</div>
</div>






<div class="col-sm-4">
<div class="card" style="width: 23rem;">
  <div class="card-body">
    <h5 class="card-title icon text-center"><i class="bi bi-file-earmark-break"></i></h5>
    <h6 class="card-subtitle mb-2 text-muted text-center">Kemudahan Administratif</h6>
    <p class="card-text text-center">Aplikasi ini menyederhanakan tugas administratif, menghemat waktu dan mudah validasi tamu</p>
  </div>
</div>
</div>



</div>


</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        // $(document).ready(function() {
        $('#js-example-basic-single').select2();
        // });
        // Create Document Ready For Javascript Vanilla

        var canvas = document.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas);

        document.getElementById("clear-button").addEventListener("click", function() {
            signaturePad.clear();
        });

        function testSignatureData() {
            var signatureData = signaturePad.toDataURL();
            var form = document.getElementById("form");
            // console.log(dataURItoBlob(signatureData));
            let imgBlob = dataURItoBlob(signatureData);
            let fileName = 'hasFilename.jpg'
            let file = new File([imgBlob], fileName, {
                type: "image/png",
                lastModified: new Date().getTime()
            }, 'utf-8');
            let container = new DataTransfer();
            container.items.add(file);
            document.querySelector('#signature').files = container.files;
            form.submit();
        }

    </script>
@endsection
