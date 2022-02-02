<?php
	if($this->session->flashdata('pesan_sukses') !=''){
?>
			<script>
			$(document).ready(function(){
					$("#pesan").modal();
			});
			</script>
<?php
	}
?>


<style>
.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 82%;
  font-weight: 600;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}

	.img-zoom {
		width: 60px;
		margin: 0 auto;
	}

	.img-zoom:hover {
		transform: scale(4);
	}

	button.dt-button, div.dt-button, a.dt-button{
	background-color: #00AAFF!important;
	background: #00AAFF!important;
	border-color: #00a0f0;
	color:white;
}
</style>
<h2 class="page-title"><strong><?= $judul ?></strong></h2>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"></h3>
			</div>
			<div class="panel-body">
				<table id="tabellaporan" class="table table-bordered">
					<thead>
						<tr>
              <th>Nomor</th>
              <th>Bulan Tagihan</th>
              <th>Meter Awal</th>
              <th>Meter Akhir</th>
              <th>Jumlah Meter</th>
              <th>Total Bayar</th>
              <th>Status</th>
						</tr>
					</thead>
					<tbody>
            <?php $no=1; foreach ($DataTagihan as $data) : ?>

            <tr>
              <td>
                <?=$no++ ?>
              </td>
              <td>
                <?=$data->bulan ?> <?=$data->tahun ?>
              </td>
              <td>
                <?= $data->meter_awal ?> kWh
              </td>
              <td>
                <?= $data->meter_akhir ?> kWh
              </td>
              <td>
                <?= $data->jumlah_meter ?> kWh
              </td>
              <td>
                <?php $bayar = ($data->jumlah_meter * $data->terperkwh + 2500) ?>
                Rp<?=number_format($bayar,2,',','.') ?>
              </td>
              <td>
                <?php if($data->status == "Belum Dikonfirmasi"): ?>
                  <span class="label label-warning"><?=$data->status?></span>
                <?php elseif($data->status == "Lunas"): ?>
                  <span class="label label-success"><?=$data->status?></span>
                <?php else: ?>
                  <span class="label label-danger"><?=$data->status?></span>
                <?php endif ?>
              </td>
            </tr>
            <?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
 </div>

    <!-- Modal Upload Bukti Bayar-->
    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4><strong>Upload Bukti Pembayaran</strong></h4>
          </div>
          <div class="modal-body">
            <br />

            <form action="<?=base_url('tagihan/upload_bukti')?>" method="post" class="form-horizontal form-label-left"  enctype="multipart/form-data">

              <input type="hidden" name="id_tagihan" id="id_tagihan" required="required" class="form-control col-md-7 col-xs-12">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File :
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="bukti" name="bukti" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" name="upload" value="Simpan Bukti" class="btn btn-primary">
          </div>
        </div>
        </form>
      </div>
   </div>

 		<!-- Modal Pesan -->
 		<div class="modal fade" id="pesan" role="dialog">
 			 <div class="modal-dialog">
 				 <div class="modal-content">
 						 <div class="modal-header">
 								 <button type="button" class="close" data-dismiss="modal">&times;</button>
 								 <h4 class="modal-title">
 									 <center>
 											<font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
 									 </center>
 								 </h4>
 						 </div>
 				 </div>
 			 </div>
 		</div>

      <script type="text/javascript">
          function bayar(id_tagihan){
              $("#id_tagihan").val(id_tagihan);
          }
      </script>


			<script src="assets/bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
			<script src="assets/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
			<script src="assets/bower_components/datatables.net-bs/js/dataTables.buttonflash.min.js"></script>
			<script src="assets/bower_components/datatables.net-bs/js/dataTables.jszip.min.js"></script>
			<script src="assets/bower_components/datatables.net-bs/js/dataTables.pdfmake.min.js"></script>
			<script src="assets/bower_components/datatables.net-bs/js/dataTables.vfs_fonts.js"></script>
			<script src="assets/bower_components/datatables.net-bs/js/dataTables.buttons.html5.min.js"></script>

			<script>
			$(function () {
			    $('#tabellaporan').DataTable({
			      dom: 'Bfrtip',
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    });
			  })
			  </script>
