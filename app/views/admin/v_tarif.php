<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<button type="button" data-bs-toggle="modal" data-bs-target="#tambah" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 mb-6 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
				+ Tambah Tarif Listrik
			</button>
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama Tarif</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Daya</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Tarif Per KWH</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-center uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataTarif as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_tarif ?></th>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?=$data->daya?> Watt</td>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Rp.<?=number_format($data->terperkwh,2,',','.') ?></th>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
										
								<?php if($data->status == 'Aktif'): ?>
									<button class="rounded-l inline-block px-4 py-1.5 bg-red-500 text-white font-medium text-xs leading-tight hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-0 active:bg-red-700 transition duration-150 ease-in-out
										 type="button" data-bs-toggle="modal" data-bs-target="#nonaktifkan" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_tarif?>')" >Non Aktifkan</button>
								<?php else: ?>
									<button class="rounded-l inline-block px-4 py-1.5 bg-sky-400 text-white font-medium text-xs leading-tight hover:bg-sky-500 focus:bg-sky-500 focus:outline-none focus:ring-0 active:bg-sky-600 transition duration-150 ease-in-out
										 type="button" data-bs-toggle="modal" data-bs-target="#aktifkan" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_tarif?>')" >Aktifkan</button>
								<?php endif ?>
										<button type="button" data-bs-toggle="modal" data-bs-target="#edit" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_tarif?>')" class="inline-block px-4 py-1.5 bg-amber-400 text-white font-medium text-xs leading-tight hover:bg-amber-500 focus:bg-amber-500 focus:outline-none focus:ring-0 active:bg-amber-600 transition duration-150 ease-in-out">Edit</button>
										<button type="button" data-bs-toggle="modal" data-bs-target="#hapus" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_tarif?>')" class=" rounded-r inline-block px-4 py-1.5 bg-red-500 text-white font-medium text-xs leading-tight hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-0 active:bg-red-700 transition duration-150 ease-in-out">Hapus</button>
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

<!-- Modal Edit Data Tarif-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="edit" tabindex="-1" aria-labelledby="edit" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="editLabel">
				Edit Data Tarif
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<form action="<?=base_url('tarif/edit_tarif')?>" method="post" class="modal-body relative p-4">
			
				<input type="hidden" id="id_tarif4" name="id_tarif" required="required" >

				<div class="modal-body relative p-4">
					<div class="form-floating mb-3 ">
						<input  type="text" name="nama_tarif" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="nama_tarif" placeholder="John Doe">
						<label for="nama_tarif" class="text-gray-700">Nama Tarif</label>
					</div>

					<div class="form-floating mb-3 ">
						<input  type="text" name="daya" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="daya" placeholder="John Doe">
						<label for="daya" class="text-gray-700">Daya</label>
					</div>
					<div class="form-floating mb-3 ">
						<input  type="text" name="terperkwh" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="terperkwh" placeholder="John Doe">
						<label for="terperkwh" class="text-gray-700">Tarif per KWH</label>
					</div>
				</div>
				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
						type="button" data-bs-dismiss="modal">Batal</button>
					<button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1"
						type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Tambah Data Level-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="tambah" tabindex="-1" aria-labelledby="tambahTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Tambah data Tarif
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
      		<form action="<?=base_url('tarif/tambah_tarif')?>" method="post">
				<div class="modal-body relative p-4">
					<div class="form-floating mb-3 ">
						<input  type="text" name="nama_tarif" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="nama_tarif" placeholder="John Doe">
						<label for="nama_tarif" class="text-gray-700">Nama Tarif</label>
					</div>

					<div class="form-floating mb-3 ">
						<input  type="text" name="daya" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="daya" placeholder="John Doe">
						<label for="daya" class="text-gray-700">Daya</label>
					</div>

					<div class="form-floating mb-3 ">
						<input  type="text" name="terperkwh" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="terperkwh" placeholder="John Doe">
						<label for="terperkwh" class="text-gray-700">Tarif per KWH</label>
					</div>
				</div>
				</div>
				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					type="button" data-bs-dismiss="modal">Batal</button>
					<button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1"
					type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--  Konfirmasi Hapus Tarif -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="hapus" tabindex="-1" aria-labelledby="hapusTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Hapus data Tarif
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Anda Yakin Ingin Menghapus Tarif ini ?</h4>
			</div>
      <form action="<?=base_url('tarif/hapus_tarif')?>" method="post">
		<input type="hidden" id="id_tarif" name="id_tarif" required="required">
        <div
          class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
          <button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
          type="button" data-bs-dismiss="modal">Batal</button>
          <button class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out ml-1"
		  type="submit">Hapus</button>
        </div>
      </form>
		</div>
	</div>
</div>

<!--  Konfirmasi Aktifkan Tarif -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="aktifkan" tabindex="-1" aria-labelledby="aktifkanTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Aktifkan Tarif
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Anda Yakin Ingin Mengaktifkan Tarif ini ?</h4>
			</div>
			<form action="<?=base_url('tarif/aktif_tarif')?>" method="post">
				<input type="hidden" id="id_tarif2" name="id_tarif" required="required">
				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					type="button" data-bs-dismiss="modal">Batal</button>
					<button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1"
					type="submit">Aktifkan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--  Konfirmasi Non Aktifkan Tarif -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="nonaktifkan" tabindex="-1" aria-labelledby="nonaktifkanTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Non-Aktifkan Tarif
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Anda Yakin Ingin Menonaktifkan Tarif ini ?</h4>
			</div>
			<form action="<?=base_url('tarif/nonaktif_tarif')?>" method="post">
				<input type="hidden" id="id_tarif3" name="id_tarif" required="required">
				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					type="button" data-bs-dismiss="modal">Batal</button>
					<button class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out ml-1"
					type="submit">Nonaktifkan</button>
				</div>
			</form>
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
