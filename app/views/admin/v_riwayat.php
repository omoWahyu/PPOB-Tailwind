<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Nama</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No. KWH</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Tanggal</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bulan Bayar</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Status</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Admin</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataRiwayat as $data) {  ?>
						<tr class="text-gray-500">
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_pelanggan ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nomor_kwh ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->tanggal_pembayaran ?></th>
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan_bayar ?></th>
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
							<th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->nama_admin ?></th>
							<td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
								<div class="flex items-center justify-center">
									<div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">
										<button type="button" data-bs-toggle="modal" data-bs-target="#detail" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_pembayaran?>')" class="rounded inline-block px-4 py-1.5 bg-sky-400 text-white font-medium text-xs leading-tight hover:bg-sky-500 focus:bg-sky-500 focus:outline-none focus:ring-0 active:bg-sky-600 transition duration-150 ease-in-out">Detail</button>
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

<!-- Modal detail riwayat-->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="detail" tabindex="-1" aria-labelledby="detailTitle" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
				Detail Riwayat Pembayaran
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<div class="modal-body relative p-4">
				
					<div class="grid grid-cols-2 gap-4">
						<div class="form-floating ">
							<input readonly type="text" name="nama_pelanggan" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="nama_pelanggan" placeholder="John Doe">
							<label for="nama_pelanggan" class="text-gray-700">Nama Pelanggan</label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="nomor_kwh" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="nomor_kwh" placeholder="John Doe">
							<label for="nomor_kwh" class="text-gray-700">Nomor KWH</label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="nama_admin" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="nama_admin" placeholder="John Doe">
							<label for="nama_admin" class="text-gray-700">Diverifikasi Oleh</label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="status" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="status" placeholder="John Doe">
							<label for="status" class="text-gray-700">Status</label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="tanggal_pembayaran" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="tanggal_pembayaran" placeholder="John Doe">
							<label for="tanggal_pembayaran" class="text-gray-700">Tanggal Bayar</label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="bulan_bayar" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="bulan_bayar" placeholder="John Doe">
							<label for="bulan_bayar" class="text-gray-700">Bulan Bayar</label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="meter_awal" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="meter_awal" placeholder="John Doe">
							<label for="meter_awal" class="text-gray-700">Meter Awal <small class="font-bold text-sky-600">(kwh)</small></label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="meter_akhir" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="meter_akhir" placeholder="John Doe">
							<label for="meter_akhir" class="text-gray-700">Meter Akhir <small class="font-bold text-sky-600">(kwh)</small></label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="jumlah_meter" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="jumlah_meter" placeholder="John Doe">
							<label for="jumlah_meter" class="text-gray-700">Total Meter <small class="font-bold text-sky-600">(kwh)</small></label>
						</div>
						<div class="form-floating ">
							<input readonly type="text" name="biaya_admin" value="2500" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								id="biaya_admin" placeholder="John Doe">
							<label for="biaya_admin" class="text-gray-700">Biaya Admin <small class="font-bold text-sky-600">(kwh)</small></label>
						</div>
						<div class="form-floating col-span-2">
							<div class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" >
                <div class="inline-flex font-bold text-xl">
                  <span>Rp. </span>
                  <input readonly type="text" name="total_bayar" id="total_bayar" class="font-bold outline-none bg-gray-200 w-auto">
                </div>
              </div>
							<label for="total_bayar" class="text-gray-700 font-semibold">Total Bayar</label>
						</div>
            <div class="rounded-lg shadow-lg bg-gray-200 col-span-2">
              <div class="p-2">
                <h5 class="text-gray-900 text-lg text-center font-bold">Bukti Bayar</h5>
              </div>
              <div data-mdb-ripple="true" data-mdb-ripple-color="light" class="cursor-pointer">
                <img src="" name="image" class="w-full rounded-b-lg hover:rounded-lg hover:scale-200 hover:z-auto transform-gpu duration-300" id="bukti" alt=""/>
              </div>
            </div>
					</div>
				</div>
				<div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
					<button class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
					type="button" data-bs-dismiss="modal">Batal</button>
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
