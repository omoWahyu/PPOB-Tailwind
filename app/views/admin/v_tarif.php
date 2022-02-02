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
				<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Tarif Listrik</a><br><br>
				<table id="tabelbiasa" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Tarif</th>
							<th>Daya</th>
							<th>Tarif Per Kwh</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($DataTarif as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_tarif ?>
							</td>
							<td>
								<?=$data->daya ?> watt</td>
							<td>
								Rp<?=number_format($data->terperkwh,2,',','.') ?>
							</td>
							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_tarif?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_tarif?>')">Hapus</a>
								<?php if($data->status == 'Aktif'): ?>
								<a class="btn btn-warning" data-toggle="modal" data-target="#nonaktifkan" href="#"
									onclick="edit('<?=$data->id_tarif?>')">Non Aktifkan</a></td>
							<?php else: ?>
							<a class="btn btn-success" data-toggle="modal" data-target="#aktifkan" href="#"
								onclick="edit('<?=$data->id_tarif?>')">Aktifkan</a></td>
							<?php endif ?>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal Tambah Tarif-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4><strong>Tambah Data Tarif</strong></h4>
			</div>
			<div class="modal-body">
				<br />

				<form action="<?=base_url('tarif/tambah_tarif')?>" method="post"
					class="form-horizontal form-label-left">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tarif :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="nama_tarif" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Daya :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="daya" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tarif Per KWH :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="terperkwh" required="required"
								class="form-control col-md-7 col-xs-12">
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

<!-- Modal Edit Data Tarif-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4><strong>Edit Data Tarif</strong></h4>
			</div>
			<div class="modal-body">
				<br />

				<form action="<?=base_url('tarif/edit_tarif')?>" method="post"
					class="form-horizontal form-label-left">

					<input type="hidden" id="id_tarif4" name="id_tarif" required="required"
						class="form-control col-md-7 col-xs-12">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tarif :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="nama_tarif" name="nama_tarif" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Daya :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="daya" name="daya" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tarif Per KWH :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="terperkwh" name="terperkwh" required="required"
								class="form-control col-md-7 col-xs-12">
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

<!--  Konfirmasi Hapus Tarif -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3><strong>Hapus Data Tarif</strong></h3>
			</div>
			<div class="modal-body">
				<h4>Anda Yakin Ingin Menghapus Tarif ?</h4>
			</div>
			<form action="<?=base_url('tarif/hapus_tarif')?>" method="post"
				class="form-horizontal form-label-left">

				<input type="hidden" id="id_tarif" name="id_tarif" required="required"
					class="form-control col-md-7 col-xs-12">

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<input type="submit" value="Konfirmasi" class="btn btn-primary">
				</div>
		</div>
		</form>
	</div>
</div>

<!--  Konfirmasi Aktifkan Tarif -->
<div class="modal fade" id="aktifkan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3><strong>Aktifkan Tarif</strong></h3>
			</div>
			<div class="modal-body">
				<h4>Anda Yakin Ingin Mengaktifkan Tarif ?</h4>
			</div>
			<form action="<?=base_url('tarif/aktif_tarif')?>" method="post"
				class="form-horizontal form-label-left">

				<input type="hidden" id="id_tarif2" name="id_tarif" required="required"
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
<div class="modal fade" id="nonaktifkan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3><strong>Non-Aktifkan Tarif</strong></h3>
			</div>
			<div class="modal-body">
				<h4>Anda Yakin Ingin Menonaktifkan Tarif ?</h4>
			</div>
			<form action="<?=base_url('tarif/nonaktif_tarif')?>" method="post"
				class="form-horizontal form-label-left">

				<input type="hidden" id="id_tarif3" name="id_tarif" required="required"
					class="form-control col-md-7 col-xs-12">

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<input type="submit" value="Konfirmasi" class="btn btn-primary">
				</div>
			</form>
		</div>
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
			url: "<?=base_url()?>tarif/data_tarif/" + a,
			dataType: "json",
			success: function (data) {
				$("#id_tarif").val(data.id_tarif);
				$("#id_tarif2").val(data.id_tarif);
				$("#id_tarif3").val(data.id_tarif);
				$("#id_tarif4").val(data.id_tarif);
				$("#nama_tarif").val(data.nama_tarif);
				$("#daya").val(data.daya);
				$("#terperkwh").val(data.terperkwh);
			}
		});
	}
</script>
