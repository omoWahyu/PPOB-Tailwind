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
		transform: scale(6);
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
				<table id="tabelbiasa" class="table table-bordered">
					<thead>
						<tr>
              <tr>
                <th>No</th>
  							<th>No. KWH</th>
  							<th>Pelanggan</th>
  							<th>Bulan</th>
  							<th>Total Bayar</th>
  							<th>Bukti</th>
  							<th>Status</th>
  							<th>Aksi</th>
              </tr>
						</tr>
					</thead>
					<tbody>
            <?php $no=1; foreach ($DataPembayaran as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nomor_kwh ?>
							</td>
							<td>
								<?=$data->nama_pelanggan ?>
							</td>
							<td>
								<?=$data->bulan_bayar ?>
							</td>
							<td>
								Rp<?=number_format($data->total_bayar,2,',','.') ?>
							</td>
							<td>
								<img src="<?=base_url('assets/bukti/'.$data->bukti )?>" class="img-zoom">
							</td>
							<td>
							  <span class="label label-warning"><?=$data->status ?></span>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#terima" href="#"
									onclick="edit('<?=$data->id_pembayaran?>')">Konfirmasi</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#tolak" href="#"
									onclick="edit('<?=$data->id_pembayaran?>')">Tolak</a></td>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<!--  Konfirmasi Terima Pembayaran -->
  <div class="modal fade" id="terima" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3><strong>Konfirmasi Pembayaran</strong></h3>
        </div>
        <div class="modal-body">
          <h4>Anda Yakin Ingin Mengonfirmasi ?</h4>
        </div>
        <form action="<?=base_url('pembayaran/konfirmasi_pembayaran')?>" method="post"
          class="form-horizontal form-label-left">

          <input type="hidden" id="id_pembayaran" name="id_pembayaran" required="required"
            class="form-control col-md-7 col-xs-12">

          <input type="hidden" id="id_tagihan" name="id_tagihan" required="required"
            class="form-control col-md-7 col-xs-12">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" value="Konfirmasi" class="btn btn-primary">
          </div>
      </div>
      </form>
    </div>
  </div>

  <!--  Konfirmasi Non Aktifkan Tarif -->
  <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3><strong>Tolak Pembayaran</strong></h3>
        </div>
        <div class="modal-body">
          <h4>Anda Yakin Ingin Menolak Pembayaran ?</h4>
        </div>
        <form action="<?=base_url('pembayaran/tolak_pembayaran')?>" method="post"
          class="form-horizontal form-label-left">

          <input type="hidden" id="id_pembayaran1" name="id_pembayaran" required="required"
            class="form-control col-md-7 col-xs-12">

          <input type="hidden" id="id_tagihan1" name="id_tagihan" required="required"
            class="form-control col-md-7 col-xs-12">

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
      url: "<?=base_url()?>pembayaran/data_pembayaran/" + a,
      dataType: "json",
      success: function (data) {
        $("#id_pembayaran").val(data.id_pembayaran);
        $("#id_pembayaran1").val(data.id_pembayaran);
        $("#id_tagihan").val(data.id_tagihan);
        $("#id_tagihan1").val(data.id_tagihan);
      }
    });
  }
</script>
