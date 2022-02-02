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
                <th>Nomor</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah Meter Penggunaan</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
						</tr>
					</thead>
					<tbody>
            <?php $no=1; foreach ($DataTagihan as $data) {  ?>
            <tr>
              <td>
                <?=$no++  ?>
              </td>
              <td>
                <?=$data->bulan ?>
              </td>
              <td>
                <?=$data->tahun?>
              </td>
              <td>
                <?=$data->jumlah_meter?> kWh
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
              <td>
                <a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#" onclick="edit('<?=$data->id_tagihan?>')">Hapus</a></td>
              </td>
            </tr>
          <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
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
                               <input type="hidden" id="id_penggunaan" name="id_penggunaan" required="required" class="form-control col-md-7 col-xs-12">
                               <input type="hidden" id="id_tagihan" name="id_tagihan" required="required" class="form-control col-md-7 col-xs-12">

                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                   <input type="submit" value="Konfirmasi" class="btn btn-primary">
                               </div>
                               </div>
                               </form>
               </div>
     </div>

    <script type="text/javascript">
      function edit(a) {
        $.ajax({
          type: "post",
          url: "<?=base_url()?>penggunaan/data_tagihan/" + a,
          dataType: "json",
          success: function (data) {
              $("#id_tagihan").val(data.id_tagihan);
              $("#id_penggunaan").val(data.id_penggunaan);
              $("#id_pelanggan").val(data.id_pelanggan);
              $("#bulan").val(data.bulan);
              $("#tahun").val(data.tahun);
              $("#jumlah_meter").val(data.jumlah_meter);
              $("#status").val(data.status);
          }
        });
      }
    </script>
