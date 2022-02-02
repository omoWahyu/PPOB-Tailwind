<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Pelanggan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No. KWH</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bulan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Total Bayar</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bukti</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataPembayaran as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_pelanggan ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nomor_kwh ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan_bayar ?></th>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><img src="<?=base_url('assets/bukti/'.$data->bukti )?>" class="w-14 hover:scale-600 hover:z-auto transform-gpu duration-300"></td>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan_bayar ?></th>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
										<button type="button" data-bs-toggle="modal" data-bs-target="#terima" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_pembayaran?>')" class="rounded-l inline-block px-4 py-1.5 bg-amber-400 text-white font-medium text-xs leading-tight hover:bg-amber-500 focus:bg-amber-500 focus:outline-none focus:ring-0 active:bg-amber-600 transition duration-150 ease-in-out">Konfirmasi</button>
										<button type="button" data-bs-toggle="modal" data-bs-target="#tolak" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_pembayaran?>')" class=" rounded-r inline-block px-4 py-1.5 bg-red-500 text-white font-medium text-xs leading-tight hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-0 active:bg-red-700 transition duration-150 ease-in-out">Tolak</button>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!--  Konfirmasi Terima Pembayaran -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="terima" tabindex="-1" aria-labelledby="terimaTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Konfirmasi Pembayaran
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Konfirmasi Pembayaran Ini?</h4>
			</div>
      <form action="<?=base_url('pembayaran/konfirmasi_pembayaran')?>" method="post">
          <input type="hidden" id="id_pembayaran" name="id_pembayaran" required="required">
          <input type="hidden" id="id_tagihan" name="id_tagihan" required="required">
        <div
          class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
			<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
			type="button" data-bs-dismiss="modal">Batal</button>
			<button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1"
			type="submit">Konfirmasi</button>
        </div>
      </form>
		</div>
	</div>
</div>
<!--  Konfirmasi Hapus Tarif -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="tolak" tabindex="-1" aria-labelledby="tolakTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Konfirmasi Pembayaran
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Tolak Pembayaran Ini?</h4>
			</div>
      <form action="<?=base_url('pembayaran/tolak_pembayaran')?>" method="post">
          <input type="hidden" id="id_pembayaran1" name="id_pembayaran" required="required">
          <input type="hidden" id="id_tagihan1" name="id_tagihan" required="required">
        <div
          class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
          <button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
          type="button" data-bs-dismiss="modal">Batal</button>
          <button class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out ml-1"
		  type="submit">Tolak</button>
        </div>
      </form>
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
