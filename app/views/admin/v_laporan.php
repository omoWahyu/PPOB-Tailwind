<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabellaporan" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Pelanggan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Tanggal Pembayaran</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No. kWh</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Meter Awal</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Meter Akhir</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Meter</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Bayar</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Status</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataPembayaran as $data) {  ?>
						<tr class="text-gray-500">
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_pelanggan ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan_bayar ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nomor_kwh ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->meter_awal ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->meter_akhir ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?php $jumlah = ($data->meter_akhir - $data->meter_awal) ?><?= $jumlah ?> kWh</td>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">Rp.<?=number_format($data->total_bayar,2,',','.') ?></td>
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
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
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

