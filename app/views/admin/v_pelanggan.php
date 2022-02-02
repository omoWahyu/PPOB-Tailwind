<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<button type="button" data-bs-toggle="modal" data-bs-target="#tambah" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 mb-6 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
				+ Tambah Data Pelanggan
			</button>
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Username</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama Pelanggan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jenis Tarif</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nomor KWH</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Alamat</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataPelanggan as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->username ?></th>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?=$data->nama_pelanggan?></td>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_tarif ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nomor_kwh ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->alamat ?></th>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
										<button type="button" data-bs-toggle="modal" data-bs-target="#edit" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_pelanggan?>')" class="rounded-l inline-block px-4 py-1.5 bg-amber-400 text-white font-medium text-xs leading-tight hover:bg-amber-500 focus:bg-amber-500 focus:outline-none focus:ring-0 active:bg-amber-600 transition duration-150 ease-in-out">Edit</button>
										<button type="button" data-bs-toggle="modal" data-bs-target="#hapus" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_pelanggan?>')" class=" rounded-r inline-block px-4 py-1.5 bg-red-500 text-white font-medium text-xs leading-tight hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-0 active:bg-red-700 transition duration-150 ease-in-out">Hapus</button>
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

<!-- Modal Edit Data Level-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="edit" tabindex="-1" aria-labelledby="edit" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="editLabel">
				Edit Data Pelanggan
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<form action="<?=base_url('data_pelanggan/edit_pelanggan')?>" method="post" class="modal-body relative p-4">
			
				<input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required" >
				<div class="modal-body relative p-4">
					<div class="grid grid-cols-2 gap-4">
						<div class="form-floating mb-3 ">
							<input  type="text" name="nama_pelanggan" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="nama_pelanggan" placeholder="John Doe">
							<label for="nama_pelanggan" class="text-gray-700">Nama Lengkap</label>
						</div>
						<select class="form-select appearance-none block w-full px-2 py-1 mb-3 font-normal text-gray-700 bg-gray-200 bg-clip-padding bg-no-repeat border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
						aria-label=".form-select-sm " name="id_tarif" required="required">
							<option>Pilih Tarif</option>
								<?php foreach ($DataTarif as $data) {  ?>
									<option value="<?=$data->id_tarif?>"><?= $data->nama_tarif ?></option>
								<?php } ?>
						</select>
					</div>

					<div class="grid grid-cols-2 gap-4">
						<div class="form-floating mb-3 ">
							<input  type="text" name="username" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="username" placeholder="John Doe">
							<label for="username" class="text-gray-700">Username</label>
						</div>
						<div class="form-floating mb-3 ">
							<input  type="text" name="nomor_kwh" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="nomor_kwh" placeholder="John Doe">
							<label for="nomor_kwh" class="text-gray-700">Nomor Kwh</label>
						</div>
					</div>
					
					<div class="form-floating mb-3 ">
						<textarea name="alamat" required="required" cols="30" rows="10" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="alamat" placeholder="John Doe"></textarea>
						<label for="alamat" class="text-gray-700">Alamat</label>
					</div>

				</div>
				<div
					class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button type="button"
					class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					data-bs-dismiss="modal">
					Batal
					</button>
					<button type="submit"
					class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
					Simpan
					</button>
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
				Tambah data Level Admin
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
      		<form action="<?=base_url('data_pelanggan/tambah_pelanggan')?>" method="post">
				<div class="modal-body relative p-4">
				
					<div class="grid grid-cols-2 gap-4">
						<div class="form-floating mb-3 ">
							<input  type="text" name="nama_pelanggan" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="nama_pelanggan" placeholder="John Doe">
							<label for="nama_pelanggan" class="text-gray-700">Nama Lengkap</label>
						</div>
						<select class="form-select appearance-none block w-full px-2 py-1 mb-3 font-normal text-gray-700 bg-gray-200 bg-clip-padding bg-no-repeat border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
						aria-label=".form-select-sm " name="id_tarif" required="required">
							<option>Pilih Tarif</option>
								<?php foreach ($DataTarif as $data) {  ?>
									<option value="<?=$data->id_tarif?>"><?= $data->nama_tarif ?></option>
								<?php } ?>
						</select>
					</div>

					<div class="form-floating mb-3 ">
						<textarea name="alamat" required="required" cols="30" rows="10" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="alamat" placeholder="John Doe"></textarea>
						<label for="alamat" class="text-gray-700">Alamat</label>
					</div>

					<div class="grid grid-cols-2 gap-4">
						<div class="form-floating mb-3 ">
							<input  type="text" name="username" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="username" placeholder="John Doe">
							<label for="username" class="text-gray-700">Username</label>
						</div>
						<div class="form-floating mb-3 ">
							<input type="password" id="sp" name="password" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
									placeholder="John Doe">
							<label for="sp" class="text-gray-700">Password</label>
						</div>
					</div>

					<div class="form-check mb-3">
						<input type="checkbox" name="check" type="checkbox" onclick="FPassword()" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" id="FP">
						<label class="form-check-label inline-block text-gray-800 -mb-1" for="FP">
							Lihat Password
						</label>
					</div>

				</div>
				<div
					class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button type="button"
					class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					data-bs-dismiss="modal">
					Batal
					</button>
					<button type="submit"
					class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
					Simpan
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--  Konfirmasi Hapus Level -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="hapus" tabindex="-1" aria-labelledby="hapusTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Hapus data Pelanggan
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Anda Yakin Ingin Menghapus Pelanggan ini ?</h4>
			</div>
      <form action="<?=base_url('data_pelanggan/hapus_pelanggan')?>" method="post">
        <input type="hidden" id="id_pelanggan1" name="id_pelanggan" required="required">
        <div
          class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
          <button type="button"
          class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
          data-bs-dismiss="modal">
          Batal
          </button>
          <button type="submit"
          class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out ml-1">
          Hapus
          </button>
        </div>
      </form>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/'); ?>js/auth.js"></script>
<script type="text/javascript">
			function edit(a) {
				$.ajax({
					type: "post",
					url: "<?=base_url()?>data_pelanggan/get_data_pelanggan/" + a,
					dataType: "json",
					success: function (data) {
						$("#id_pelanggan").val(data.id_pelanggan);
						$("#id_pelanggan1").val(data.id_pelanggan);
						$("#id_pelanggan2").val(data.id_pelanggan);
						$("#id_pelanggan3").val(data.id_pelanggan);
						$("#nama_pelanggan").val(data.nama_pelanggan);
						$("#username").val(data.username);
						$("#nomor_kwh").val(data.nomor_kwh);
						$("#alamat").val(data.alamat);
						$("#status_pelanggan").val(data.status_pelanggan);
						$("#nama_tarif").val(data.nama_tarif);
						$("#id_tarif").val(data.id_tarif);
					}
				});
			}
</script>
