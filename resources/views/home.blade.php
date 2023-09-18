@extends('partials.main')


<style type="text/css">
    .signature-pad{
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        height: 260px;
    }
</style>


@section('container')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-
bootstrap/4.3.1/css/bootstrap.css">

<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css"
href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-
      street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
</script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js">
</script>

<link rel="stylesheet" type="text/css" href="http://keith-
wood.name/css/jquery.signature.css">
<style>
 .kbw-signature { width: 100%; height: 200px;}
 #sig canvas{
     width: 100% !important;
     height: auto;
 }
</style>
<div class="container mt-5"  style="margin-top:200px;">
 <br>
    <form action="visitor" method="POST" class="mt-5"  style="margin-top:200px;">
        <div class="form-floating rounded-pill mb-3">
            <input type="number" class="form-control rounded-pill" name="identity_number" id="floatingInput" placeholder="No. Identitas KTP">
            <label for="floatingInput">No. Identitas KTP</label>
        </div>
        <div class="form-floating rounded-pill mb-3">
            <input type="text" class="form-control rounded-pill" name="name" id="floatingNama" placeholder="Nama">
            <label for="floatingNama">Nama</label>
        </div>
        <div class="form-floating rounded-pill mb-3">
            <input type="text" class="form-control rounded-pill" id="floatingPerusahaan" name="company" placeholder="Asal Perusahaan">
            <label for="floatingPerusahaan">Asal Perusahaan</label>
        </div>
        <div class="form-floating rounded-pill mb-3">
            <input type="text" class="form-control rounded-pill" id="floatingTujuan" name="purpose" placeholder="Tujuan">
            <label for="floatingTujuan">Tujuan</label>
        </div>


        <div class="wrapper">
            <canvas id="signature-pad" class="signature-pad"></canvas>
          </div>
          <br>
          <button type="button" class="btn btn-primary btn-sm" id="save-png">Save as PNG</button>
          <button type="button" class="btn btn-info btn-sm" id="save-jpeg">Save as JPEG</button>
          <button type="button" class="btn btn-default btn-sm" id="save-svg">Save as SVG</button>
          <!-- Modal untuk tampil preview tanda tangan-->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Preview Tanda Tangan</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Submit</button>
                </div>
              </div>
            </div>
          </div>
    </form>

</div>
<form method="POST" action="">
                        @csrf
                        <div class="col-md-12">
                            <label class="" for="">Silahkan membuat tandatangan sesuai
                                 yang diinginkan :
                            </label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <button id="clear" class="btn btn-danger btn-sm">Hapus
                                 Tandatangan
                            </button>
                            <textarea id="signature64" name="signed" style="display:
                             none">
                            </textarea>
                        </div>
                        <br/>
                        <button class="btn btn-success">Simpan</button>
                    </form>
    @endsection

