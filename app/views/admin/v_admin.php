<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<button type="button" data-bs-toggle="modal" data-bs-target="#tambah" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 mb-6 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
				+ Tambah Data Admin
			</button>
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama Admin</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Username</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Level</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
					<?php $no=1; foreach ($DataAdmin as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?=$data->nama_admin ?></td>
							<td class="border-t-0 px-4 align-middle text-xs font-normal whitespace-nowrap p-4 text-left"><?=$data->username ?></td>
							<td class="border-t-0 px-4 align-middle text-xs font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_level?></td>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
										<button type="button" data-bs-toggle="modal" data-bs-target="#edit" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_admin?>')" class="rounded-l inline-block px-4 py-1.5 bg-amber-400 text-white font-medium text-xs leading-tight hover:bg-amber-500 focus:bg-amber-500 focus:outline-none focus:ring-0 active:bg-amber-600 transition duration-150 ease-in-out">Edit</button>
										<button type="button" data-bs-toggle="modal" data-bs-target="#hapus" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_admin?>')" class=" rounded-r inline-block px-4 py-1.5 bg-red-500 text-white font-medium text-xs leading-tight hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring-0 active:bg-red-700 transition duration-150 ease-in-out">Hapus</button>
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

<!-- Modal Edit Data Admin-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="edit" tabindex="-1" aria-labelledby="edit" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="editLabel">
				Edit Data Admin
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<form action="<?=base_url('data_admin/edit_admin')?>" method="post" class="modal-body relative p-4">
				

				<div class="grid grid-cols-2 gap-4">
					<div class="form-floating mb-3 ">
						<input  type="text" name="nama_admin" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="nama_admin" placeholder="John Doe">
						<label for="nama_admin" class="text-gray-700">Nama Lengkap</label>
					</div>
					<select class="form-select appearance-none block w-full px-2 py-1 mb-3 font-normal text-gray-700 bg-gray-200 bg-clip-padding bg-no-repeat border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					aria-label=".form-select-sm " name="id_level" required="required">
						<option>Level</option>
							<?php foreach ($DataLevel as $data) {  ?>
								<option value="<?=$data->id_level?>"><?= $data->nama_level ?></option>
							<?php } ?>
					</select>
				</div>

				<div class="form-floating mb-3 ">
					<input  type="text" name="username" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
						id="username" placeholder="John Doe">
					<label for="username" class="text-gray-700">Username</label>
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

<!-- Modal Tambah Data Admin-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="tambahLabel">
				Tambah Data Admin
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<form action="<?=base_url('data_admin/tambah_admin')?>" method="post" class="modal-body relative p-4">
				

				<div class="grid grid-cols-2 gap-4">
					<div class="form-floating mb-3 ">
						<input  type="text" name="nama_admin" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="nama_admin" placeholder="John Doe">
						<label for="nama_admin" class="text-gray-700">Nama Lengkap</label>
					</div>
					<select class="form-select appearance-none block w-full px-2 py-1 mb-3 font-normal text-gray-700 bg-gray-200 bg-clip-padding bg-no-repeat border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					aria-label=".form-select-sm " name="id_level" required="required">
						<option>Level</option>
							<?php foreach ($DataLevel as $data) {  ?>
								<option value="<?=$data->id_level?>"><?= $data->nama_level ?></option>
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
					<input type="checkbox" name="check" type="checkbox" onclick="FPassword()" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="FP">
					<label class="form-check-label inline-block text-gray-800 -mb-1" for="FP">
						Lihat Password
					</label>
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

<!--  Konfirmasi Hapus Admin -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="hapus" tabindex="-1" aria-labelledby="hapusTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Hapus data Admin
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<h4>Anda Yakin Ingin Menghapus Admin ?</h4>
			</div>
			<form action="<?=base_url('data_admin/hapus_admin')?>" method="post">
				<input type="hidden" id="id_admin1" name="id_admin" required="required">
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
			url: "<?=base_url()?>data_admin/detail_admin/" + a,
			dataType: "json",
			success: function (data) {
				$("#id_admin").val(data.id_admin);
				$("#id_admin1").val(data.id_admin);
				$("#nama_admin").val(data.nama_admin);
				$("#id_level").val(data.id_level);
				$("#username").val(data.username);
			}
		});
	}
</script>

