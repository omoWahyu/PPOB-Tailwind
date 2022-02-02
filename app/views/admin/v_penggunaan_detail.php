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

<h2 class="page-title"><strong><?= $judul ?></strong></h2>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"></h3>
			</div>
			<div class="panel-body">
				<table id="tabelbiasa" class="table table-bordered">
					<thead>
						<tr>
              <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Meter Awal</th>
                <th>Meter Akhir</th>
                <th>Total Penggunaan</th>
                <th>Action</th>
              </tr>
						</tr>
					</thead>
					<tbody>
            <?php $no=1; foreach ($DataPenggunaan as $data) {  ?>
          <tr>
            <td>
              <?=$no++ ?>
            </td>
            <td>
              <?=$data->bulan ?>
            </td>
            <td>
              <?=$data->tahun ?>
            </td>
            <td>
              <?=$data->meter_awal ?> kWh
            </td>
            <td>
              <?=$data->meter_akhir ?> kWh
            </td>
            <td>
							<?php if($data->meter_awal > $data->meter_akhir): ?>
              <?php $total = (($data->meter_akhir - $data->meter_awal)* (-1)) ?>
              <?= $total ?> kWh
							<?php else: ?>
							<?php $total = $data->meter_akhir - $data->meter_awal ?>
              <?= $total ?> kWh
						<?php endif ?>
            </td>
            <td>
              <a class="btn btn-primary" data-toggle="modal" data-target="#penggunaan" href="#" onclick="edit('<?=$data->id_penggunaan?>')">Edit Penggunaan</a>
							<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="hapus('<?=$data->id_penggunaan?>')">Hapus</a>
            </td>
          </tr>
          <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<!-- Modal Edit Penggunaan -->
        <div class="modal fade" id="penggunaan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4><strong>Tambah Data Penggunaan</strong></h4>
            </div>
            <div class="modal-body">
              <br />

              <form action="<?=base_url('penggunaan/edit_penggunaan')?>" method="post" class="form-horizontal form-label-left">

                  <input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
                <input type="hidden" id="id_penggunaan" name="id_penggunaan" required="required" class="form-control col-md-7 col-xs-12">

                <?php
                  $arr_bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                ?>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bulan :
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="bulan" name="bulan" class="form-control col-md-7 col-xs-12">
                            <option></option>
                            <?php foreach ($arr_bulan as $key => $bulan): ?>
                              <option value="<?=$bulan?>"><?=$bulan?></option>
                            <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="tahun" class="form-control col-md-7 col-xs-12" name="tahun">
                      <option></option>
                      <?php
                      for($i=2019;$i<2030;$i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Meter Awal : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="meter_awal" id="meter_awal" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Meter Akhir : </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="meter_akhir" name="meter_akhir" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
            </div>
          </div>
          </form>
        </div>
        </div>

				<!-- Modal Hapus Tagihan -->
				<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
				               <div class="modal-dialog" role="document">
				                   <div class="modal-content">
				                   <div class="modal-header">
				                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                       <span aria-hidden="true">&times;</span>
				                       </button>
				                       <h3><strong>Hapus Data Pelanggan</strong></h3>
				                   </div>
				                   <div class="modal-body">
				                       <h4>Anda Yakin Ingin Menghapus Tagihan ?</h4>
				                   </div>
				                   <form action="<?=base_url('penggunaan/hapus_tagihan')?>" method="post" class="form-horizontal form-label-left">
				                       <input type="hidden" id="id_penggunaan1" name="id_penggunaan" required="required" class="form-control col-md-7 col-xs-12">
				                       <input type="hidden" id="id_tagihan1" name="id_tagihan" required="required" class="form-control col-md-7 col-xs-12">

                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                               <input type="submit" value="Konfirmasi" class="btn btn-primary">
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
      function edit(a) {
        $.ajax({
          type: "post",
          url: "<?=base_url()?>penggunaan/data_penggunaan/" + a,
          dataType: "json",
          success: function (data) {
            $("#id_pelanggan").val(data.id_pelanggan);
						$("#nama_pelanggan").val(data.nama_pelanggan);
            $("#id_penggunaan").val(data.id_penggunaan);
            $("#bulan").val(data.bulan);
            $("#tahun").val(data.tahun);
            $("#meter_awal").val(data.meter_awal);
            $("#meter_akhir").val(data.meter_akhir);
          }
        });
      }

			function hapus(a) {
				$.ajax({
					type: "post",
					url: "<?=base_url()?>penggunaan/data_tagihan_detail/" + a,
					dataType: "json",
					success: function (data) {
						$("#id_tagihan1").val(data.id_tagihan);
						$("#id_penggunaan1").val(data.id_penggunaan)
					}
				});
			}
    </script>
