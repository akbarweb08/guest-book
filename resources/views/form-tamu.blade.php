@extends('partials.main')


<style type="text/css">
    .signature-pad {
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        height: auto    ;
    }
    @media only screen and (min-width: 768px) {
  /* For desktop: */
    .signature-pad {
        width: 30%;
        height: 260px;
    }
}
</style>


@section('container')
    <link href="css/select2.css" rel="stylesheet" />

    <div class="container mt-5" style="margin-top:200px;">
        <br>
        <form action="visitor" enctype="multipart/form-data" id="form" method="POST" class="mt-5"
            style="margin-top:200px;">

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

            @csrf
            <div class="form-floating  mb-3">
                <input type="number" class="form-control " name="identity_number" id="floatingInput"
                    placeholder="No. Identitas KTP">
                <label for="floatingInput">No. Identitas KTP</label>
            </div>
            <div class="form-floating  mb-3">
                <input type="text" class="form-control " name="name" id="floatingNama" placeholder="Nama">
                <label for="floatingNama">Nama</label>
            </div>
            <div class="container">
                <div class="row">

                    <div class=" mb-3">
                        <select class="form-control  select-costum w-50" id="js-example-basic-single" name="company">
                            <option value="">Pilih Perusahaan</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->name }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#tambahPerusahaan">
                            +
                        </button>
                        <label for="">
                            <small>
                                Silahkan tambahkan asal perusahaan jika belum ada
                            </small>
                        </label>
                    </div>



                    <!-- Modal -->

                </div>
            </div>
            <div class="form-floating  mb-3">
                <input type="text" class="form-control " id="floatingTujuan" name="purpose" placeholder="Tujuan">
                <label for="floatingTujuan">Tujuan</label>
            </div>
            <div class="wrapper">
                <canvas id="signature-pad" class="signature-pad"></canvas>
            </div>
            <br>
            <input type="file" name="signature" id="signature" style="display: none;">
            <button type="reset" class="btn btn-danger" id="clear-button"><i class="bi bi-trash3"></i> Hapus Tanda
                Tangan</button>
            <button type="button" onclick="testSignatureData()" class="btn btn-primary">Simpan</button>

            <!-- Modal untuk tampil preview tanda tangan-->

        </form>
        <div class="modal fade" id="tambahPerusahaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Perusahaan</h5>
                        <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="companies" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="form-floating  mb-3">
                                <input type="text" class="form-control " placeholder="Nama Perusahaan"
                                    id="companiesname">
                                <label for="floatingInput">Nama Perusahaan</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="submitCompany()" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
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
        var canvas = document.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas);
        // signaturePad.clear();
        // signaturePad.set('canvasWidth', canvas.offsetWidth);
        // signaturePad.set('canvasHeight', canvas.offsetHeight);
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

        function submitCompany() {
            let companyValue = document.querySelector("#companiesname").value;
            let closeModal = document.querySelector("#close-modal");
            fetch("https://gams.bright.id/api/companies", {
                    method: "POST",
                    body: JSON.stringify({
                        name: companyValue
                    }),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                .then((response) => response.json())
                .then((json) => {
                    companySelect = document.getElementById('js-example-basic-single');
                    companySelect.options[companySelect.options.length] = new Option(json.data.name, json.data.name);
                    console.log(json)
                    closeModal.click();
                });
        }

        function dataURItoBlob(dataURI) {
            // convert base64 to raw binary data held in a string
            // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
            var byteString = atob(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

            // write the bytes of the string to an ArrayBuffer
            var ab = new ArrayBuffer(byteString.length);

            // create a view into the buffer
            var ia = new Uint8Array(ab);

            // set the bytes of the buffer to the correct values
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            // write the ArrayBuffer to a blob, and you're done
            var blob = new Blob([ab], {
                type: mimeString
            });
            return blob;

        }
        // document.querySelector("form").addEventListener("submit", function (e) {
        //     e.preventDefault();
        // });
    </script>
@endsection
