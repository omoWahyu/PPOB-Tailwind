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

  input[type="text"]:disabled {
    background: #FFFFFF;
  }

  .img-zoom {
    /* transition: transform .2s; /* Animation */ */
    width: 60px;
    height: 60px;
    z-index: 9999 !important;
  }

  .img-zoom:hover {
    position: relative;
    transform: scale(7); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    z-index: 9999 !important;

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
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>No. kWh</th>
              <th>Bulan Bayar</th>
              <th>Grand Total</th>
              <th>Status</th>
              <th>Pemverifikasi</th>
              <th>Aksi</th>
						</tr>
					</thead>
					<tbody>
            <?php $no=1; foreach ($DataRiwayat as $data) {  ?>
  						<tr>
  							<td>
  								<?=$no++ ?>
  							</td>
                <td>
                  <?=$data->tanggal_pembayaran ?>
                </td>
  							<td>
  								<?=$data->nama_pelanggan ?>
  							</td>
  							<td>
  								<?=$data->nomor_kwh ?>
  							</td>
  							<td>
  								<?=$data->bulan_bayar ?>
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
  							<td>
  								<?=$data->nama_admin ?>
  							</td>
                <td>
                  <a onclick="edit('<?=$data->id_pembayaran ?>')" class="btn btn-primary"  data-toggle="modal" data-target="#detail" href="#">
                    <i class="fa fa-eye"></i>
                  </a>
                </td>
  						</tr>
  						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<!-- Modal detail riwayat-->
  <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4><strong>Detail Riwayat Pembayaran</strong></h4>
        </div>
        <div class="modal-body">
          <br />

          <form action="" class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Bayar :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="tanggal_pembayaran" disabled
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pemverifikasi :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="nama_admin" disabled
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Status :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="status" disabled
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Bayar :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                 <img src="" name="image" class="img-zoom" id="bukti" >
              </div>
            </div>
            <br />

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor kWh :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="nomor_kwh" disabled
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pelanggan :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="nama_pelanggan" disabled
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Bulan Bayar :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="bulan_bayar" disabled
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Meter Awal :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="input-group">
                  <input type="text" value="2000" id="meter_awal" disabled
                    class="form-control col-md-7 col-xs-12">
                  <span class="input-group-addon">kWh</span>
               </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Meter Akhir :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="input-group">
                  <input type="text" id="meter_akhir" disabled
                    class="form-control col-md-7 col-xs-12">
                  <span class="input-group-addon">kWh</span>
               </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Meter :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="input-group">
                  <input type="text" id="jumlah_meter" disabled
                    class="form-control col-md-7 col-xs-12">
                  <span class="input-group-addon">kWh</span>
               </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Admin :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                    <input type="text" value="2500" disabled
                      class="form-control col-md-7 col-xs-12">
                  <span class="input-group-addon">.00</span>
               </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Grand Total :
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                    <input type="text" id="total_bayar" disabled
                      class="form-control col-md-7 col-xs-12">
                  <span class="input-group-addon">.00</span>
               </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
			function edit(a) {
				$.ajax({
					type: "post",
					url: "<?=base_url()?>riwayat/detail_riwayat/" + a,
					dataType: "json",
					success: function (data) {
            $("#bukti").attr('src','<?php echo base_url()?>assets/bukti/'+data.bukti);
            $("#tanggal_pembayaran").val(data.tanggal_pembayaran);
            $("#nama_pelanggan").val(data.nama_pelanggan);
            $("#nomor_kwh").val(data.nomor_kwh);
            $("#nama_admin").val(data.nama_admin);
            $("#meter_awal").val(data.meter_awal);
            $("#meter_akhir").val(data.meter_akhir);
            $("#jumlah_meter").val(data.jumlah_meter);
            $("#total_bayar").val((data.total_bayar));
            $("#bulan_bayar").val(data.bulan_bayar);
						$("#id_level1").val(data.id_level);
            $("#status").val(data.status);
					}
				});
			}
</script>
