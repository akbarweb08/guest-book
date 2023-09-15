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

<div class="container mt-5"  style="margin-top:200px;">
 <br>
    <form action="" method="POST" class="mt-5"  style="margin-top:200px;">
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

    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
