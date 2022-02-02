<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bulan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Tahun</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Meter Penggunaan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Status</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-center uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
		  			<?php $no=1; foreach ($DataTagihan as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->tahun ?></th>
							<th class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?=$data->jumlah_meter ?> Kwh</th>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
								<?php if($data->status == "Belum Dikonfirmasi"): ?>
									 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-500 text-white rounded"><?=$data->status?></span>
								 <?php elseif($data->status == "Lunas"): ?>
									 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded"><?=$data->status?></span>
								 <?php else: ?>
									 <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded"><?=$data->status?></span>
								 <?php endif ?>
			        </td>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#hapus" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_tagihan?>')" class=" rounded-r inline-block px-4 py-1.5 bg-red-500 text-white font-medium text-xs leading-tight hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-0 active:bg-red-700 transition duration-150 ease-in-out">Hapus</button>
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

<!--  Konfirmasi Hapus Tagihan -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="hapus" tabindex="-1" aria-labelledby="hapusTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
					Hapus data Tagihan
				</h5>
				<button class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Anda Yakin Ingin Menghapus Tagihan ini ?</h4>
			</div>
			<form action="<?=base_url('penggunaan/hapus_tagihan')?>" method="post">
        <input type="hidden" id="id_penggunaan" name="id_penggunaan" required="required">
        <input type="hidden" id="id_tagihan" name="id_tagihan" required="required">
				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					type="button" data-bs-dismiss="modal">Batal</button>
					<button class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out ml-1"
					type="submit">Hapus</button>
				</div>
			</form>
		</div>
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
