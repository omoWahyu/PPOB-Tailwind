<?php
	if(($this->session->flashdata('pesan_sukses') || $this->session->flashdata('pesan_gagal'))!=''){
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
                <th>Nama</th>
                <th>No kwh</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
						</tr>
					</thead>
					<tbody >
            <?php $no=1; foreach ($DataPelanggan as $data) {  ?>
          <tr>
            <td>
              <?=$no++ ?>
            </td>
            <td>
              <?=$data->nama_pelanggan ?>
            </td>
						<td>
              <?=$data->nomor_kwh?>
            </td>
            <td>
              <?=$data->alamat ?>
            </td>
            <td>
              <a class="btn btn-primary" data-toggle="modal" data-target="#penggunaan" href="#" onclick="edit('<?=$data->id_pelanggan?>')">+ Penggunaan</a>
              <a class="btn btn-success" href="<?=base_url()?>penggunaan/detail_Penggunaan/<?=$data->id_pelanggan?> ">Detail Penggunaan</a>
              <a class="btn btn-warning" href="<?=base_url()?>penggunaan/detail_tagihan/<?=$data->id_pelanggan?>">Detail Tagihan</a></td>
          </tr>
          <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<!-- Modal Tambah Penggunaan-->
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

            <form action="<?=base_url('penggunaan/tambah_penggunaan')?>" method="post" class="form-horizontal form-label-left">

              <input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama :
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama_pelanggan" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12" disabled>
                </div>
              </div>

              <?php
                $arr_bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
              ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bulan :
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="bulan" class="form-control col-md-7 col-xs-12">
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
                  <select class="form-control col-md-7 col-xs-12" name="tahun">
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
                  <input type="number" min="0" name="meter_awal" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Meter Akhir : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" min="0" name="meter_akhir" required="required" class="form-control col-md-7 col-xs-12">
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

			<!-- Modal Pesan -->
			<div class="modal fade" id="pesan" role="dialog">
				 <div class="modal-dialog">
					 <div class="modal-content">
							 <div class="modal-header">
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
									 <h4 class="modal-title">
										 <center>
												<font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
												<font color="red" size="4px"><b><?= $this->session->flashdata('pesan_gagal'); ?></b></font>
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
          url: "<?=base_url()?>penggunaan/get_data_pelanggan/" + a,
          dataType: "json",
          success: function (data) {
            $("#id_pelanggan").val(data.id_pelanggan);
            $("#nama_pelanggan").val(data.nama_pelanggan);
            $("#username").val(data.username);
            $("#nomor_kwh").val(data.nomor_kwh);
            $("#alamat").val(data.alamat);
            $("#status_pelanggan").val(data.status_pelanggan);
            $("#nama_tarif").val(data.nama_tarif);
          }
        });
      }
    </script>
