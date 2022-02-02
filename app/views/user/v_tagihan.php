<div class="pt-6 px-4">
	<?= $this->session->flashdata('message'); ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<h3 class="text-xl leading-none font-bold text-gray-900 mb-10"><?= $judul ?></h3>
		<div class="block w-full overflow-x-auto">
			<table id="tabelbiasa" class="items-center w-full bg-transparent border-collapse">
				<thead>
					<tr>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">No</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bulan Tagihan</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Meter</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Biaya Admin</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Jumlah Bayar</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Bukti</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Status</th>
						<th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Action</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-100">
          			<?php $no=1; foreach ($DataTagihan as $data) {  
                $cek_bayar=$this->tagihan->cek_pembayaran($data->id_tagihan); ?>
						<tr class="text-gray-500">
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$no++ ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?=$data->bulan ?> <?=$data->tahun ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?= $data->jumlah_meter ?> kWh</td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?php $admin = 2500 ?>Rp. <?=number_format($admin,2,',','.') ?>></td>
							<td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?php $bayar = ($data->jumlah_meter * $data->terperkwh + 2500) ?>Rp. <?=number_format($bayar,2,',','.') ?></td>
							<td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                <?php if(@$cek_bayar->bukti!=""): ?>
                    <img src="<?=base_url('assets/bukti/'.$cek_bayar->bukti )?>" class="img-zoom" width="60px;">
                <?php endif ?>
              </td>
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
                    
                    <?php if($data->status != "Lunas"): ?>
										<button type="button" data-bs-toggle="modal" data-bs-target="#upload" data-mdb-ripple="true" data-mdb-ripple-color="light" onclick="edit('<?=$data->id_tagihan?>')" class="rounded inline-block px-4 py-1.5 bg-lime-400 text-white font-medium text-xs leading-tight hover:bg-lime-500 focus:bg-lime-500 focus:outline-none focus:ring-0 active:bg-lime-600 transition duration-150 ease-in-out">Upload Bukti</button>
                    <?php else: ?>
                    <strong>Telah Lunas</strong>
                    <?php endif ?>
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
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="upload" tabindex="-1" aria-labelledby="upload" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
		<div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="editLabel">
				Upload Bukti Pembayaran
				</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			
			<form action="<?=base_url('tagihan/upload_bukti')?>" method="post" enctype="multipart/form-data">
			
				<input type="hidden" id="id_tagihan" name="id_tagihan" required="required" >
				<div class="modal-body relative p-4">
          <div class="form-floating mb-3 ">
            <input  type="file" name="bukti" required="required" class="form-control block w-full px-3 text-base font-normal text-gray-700 bg-gray-200 bg-clip-padding border rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
              id="bukti" placeholder="John Doe">
            <label for="bukti" class="text-gray-700">Upload File</label>
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
