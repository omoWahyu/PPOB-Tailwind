<style>
    button.dt-button, div.dt-button, a.dt-button{
		background-color: #00AAFF!important;
		background: #00AAFF!important;
    border-color: #00a0f0;
    color:white;
	  }

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
              <th>No</th>
              <th>Tanggal Pembayaran</th>
              <th>Nama Pelanggan</th>
              <th>No. kWh</th>
              <th>Meter Awal</th>
              <th>Meter Akhir</th>
              <th>Jumlah Meter</th>
              <th>Total Bayar</th>
              <th>Status</th>
						</tr>
					</thead>
					<tbody>
            <?php $no=1; foreach ($DataPembayaran as $data) {  ?>
  						<tr>
  							<td>
  								<?=$no++ ?>
  							</td>
                <td>
                  <?=$data->bulan_bayar ?>
                </td>
  							<td>
  								<?=$data->nama_pelanggan ?>
  							</td>
  							<td>
  								<?=$data->nomor_kwh ?>
  							</td>
                <td>
  								<?=$data->meter_awal ?> kWh
  							</td>
                <td>
  								<?=$data->meter_akhir ?> kWh
  							</td>

                <td>
                  <?php $jumlah = ($data->meter_akhir - $data->meter_awal) ?>
  								<?= $jumlah ?> kWh
  							</td>

  							<td>
  							 	Rp<?=number_format($data->total_bayar,2,',','.') ?>
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
  						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

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

