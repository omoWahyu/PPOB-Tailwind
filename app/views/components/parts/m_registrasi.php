<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="registrasi" tabindex="-1" aria-labelledby="registrasi" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="registrasiLabel">
				Registrasi Akun
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		
			<form action="<?=base_url('user/register')?>" method="post" class="modal-body relative p-4">
				<div class="form-floating mb-3 ">
					<input  type="text" name="nama_pelanggan" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
						id="nama_pelanggan" placeholder="John Doe">
					<label for="nama_pelanggan" class="text-gray-700">Nama Lengkap</label>
				</div>

				<div class="grid grid-cols-2 gap-4">
					<div class="form-floating mb-3 ">
						<input type="number" name="nomor_kwh" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="nomor_kwh" placeholder="John Doe" value="1200">
						<label for="nomor_kwh" class="text-gray-700">No Kwh</label>
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
						<input type="password" id="sp1" name="password" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							 placeholder="John Doe">
						<label for="sp1" class="text-gray-700">Password</label>
					</div>
				</div>
		
				<div class="form-check mb-3">
					<input type="checkbox" name="check" type="checkbox" onclick="FPassword1()" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="FP1">
					<label class="form-check-label inline-block text-gray-800 -mb-1" for="FP1">
						Lihat Password
					</label>
				</div>

				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button type="button"
						class="inline-block px-6 py-2.5 bg-gray-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-500 hover:shadow-lg focus:bg-gray-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-600 active:shadow-lg transition duration-150 ease-in-out"
						data-bs-dismiss="modal">
						Close
					</button>
					<button type="submit" name="tambah" value="Simpan"
						class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
						Simpan
					</button>
				</div>
			
			</form>
		</div>
	</div>
</div>