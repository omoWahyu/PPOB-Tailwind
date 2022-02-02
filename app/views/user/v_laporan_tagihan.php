<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabellaporan" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
              <th>Bulan Tagihan</th>
              <th>Meter Awal</th>
              <th>Meter Akhir</th>
              <th>Jumlah Meter</th>
              <th>Total Bayar</th>
              <th>Status</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bulan Tagihan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Meter Awal</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Meter Akhir</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Meter</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Bayar</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Status</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataPembayaran as $data) :  ?>
						<tr class="text-gray-500">
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan ?> <?=$data->tahun ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->meter_awal ?> kWh</td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->meter_akhir ?> kWh</td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->jumlah_meter ?> kWh</td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?php $bayar = ($data->jumlah_meter * $data->terperkwh + 2500) ?> Rp. <?=number_format($bayar,2,',','.') ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
								<?php if($data->status == "Belum Dikonfirmasi"): ?>
									 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-500 text-white rounded"><?=$data->status?></span>
								 <?php elseif($data->status == "Lunas"): ?>
									 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded"><?=$data->status?></span>
								 <?php else: ?>
									 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded"><?=$data->status?></span>
								 <?php endif ?>
			        </td>
						</tr>
          <?php endforeach ?>
				</tbody>
			</table>
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

<script type="text/javascript">
    function bayar(id_tagihan){
        $("#id_tagihan").val(id_tagihan);
    }
</script>


<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/dataTables.buttonflash.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/dataTables.jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/dataTables.pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/dataTables.vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>js/datatables.net-bs/js/dataTables.buttons.html5.min.js"></script>

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
