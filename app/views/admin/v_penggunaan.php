<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama Pelanggan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No KWH</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Alamat</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-center uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
		  			<?php $no=1; foreach ($DataPelanggan as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_pelanggan ?></th>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?=$data->nomor_kwh?> Watt</td>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->alamat ?></th>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
										
									<button class="rounded-l inline-block px-4 py-1.5 bg-sky-400 text-white font-medium text-xs leading-tight hover:bg-sky-500 focus:bg-sky-500 focus:outline-none focus:ring-0 active:bg-sky-600 transition duration-150 ease-in-out
										 type="button" data-bs-toggle="modal" data-bs-target="#penggunaan" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_pelanggan?>')" >+ Penggunaan</button>
										<a href="<?=base_url('penggunaan/detail_Penggunaan/') . $data->id_pelanggan?>" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-4 py-1.5 bg-amber-400 text-white font-medium text-xs leading-tight hover:bg-amber-500 focus:bg-amber-500 focus:outline-none focus:ring-0 active:bg-amber-600 transition duration-150 ease-in-out">Detail Penggunaan</a>
										<a href="<?=base_url('penggunaan/detail_tagihan/') . $data->id_pelanggan?>" data-mdb-ripple="true" data-mdb-ripple-color="light" class=" rounded-r inline-block px-4 py-1.5 bg-emerald-500 text-white font-medium text-xs leading-tight hover:bg-emerald-600 focus:bg-emerald-600 focus:outline-none focus:ring-0 active:bg-emerald-700 transition duration-150 ease-in-out">Detail Tagihan</a>
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

<!-- Modal Tambah Penggunaan-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="penggunaan" tabindex="-1" aria-labelledby="penggunaanTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Tambah data Penggunaan
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
	  		<form action="<?=base_url('penggunaan/tambah_penggunaan')?>" method="post">
				<div class="modal-body relative p-4">
				
					<input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required">
					<div class="form-floating mb-3 ">
						<input  type="text" name="nama_pelanggan" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
							id="nama_pelanggan" placeholder="John Doe">
						<label for="nama_pelanggan" class="text-gray-700">Nama Pelanggan</label>
					</div>
					<div class="grid grid-cols-2 gap-4">

						<?php $arr_bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");?>

						<select class="form-select appearance-none block w-full px-2 py-1 mb-3 font-normal text-gray-700 bg-gray-200 bg-clip-padding bg-no-repeat border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
						aria-label=".form-select-sm " name="bulan" required="required">
							<option>Bulan</option>
							<?php foreach ($arr_bulan as $key => $bulan): ?>
								<option value="<?=$bulan?>"><?=$bulan?></option>
							<?php endforeach ?>
						</select>
						<select class="form-select appearance-none block w-full px-2 py-1 mb-3 font-normal text-gray-700 bg-gray-200 bg-clip-padding bg-no-repeat border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
						aria-label=".form-select-sm " name="tahun" required="required">
							<option>Tahun</option>
							<?php for($i=2022;$i<2032;$i++){
								echo '<option value="'.$i.'">'.$i.'</option>';
							} ?>
						</select>
			
						<div class="form-floating mb-3 ">
							<input  type="number" min="0" name="meter_awal" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="meter_awal" placeholder="John Doe">
							<label for="meter_awal" class="text-gray-700">Meter Awal</label>
						</div>
						<div class="form-floating mb-3 ">
							<input  type="number" min="0" name="meter_akhir" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="meter_akhir" placeholder="John Doe">
							<label for="meter_akhir" class="text-gray-700">Meter Akhir</label>
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

<script type="text/javascript">
	function edit(a) {
	$.ajax({
		type: "post",
		url: "<?=base_url()?>penggunaan/get_data_pelanggan/" + a,
		dataType: "json",
		success: function (data) {
		$("#id_pelanggan").val(data.id_pelanggan);
		$("#nama_pelanggan").val(data.nama_pelanggan);
		$("#username").val(data.username);
		$("#nomor_kwh").val(data.nomor_kwh);
		$("#alamat").val(data.alamat);
		$("#status_pelanggan").val(data.status_pelanggan);
		$("#nama_tarif").val(data.nama_tarif);
		}
	});
	}
</script>
