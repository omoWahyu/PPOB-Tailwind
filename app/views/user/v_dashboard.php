
<div class="pt-6 px-4 grid gap-4">

<?= $this->session->flashdata('message'); ?>
			
	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
		<div class="mb-4 flex items-center justify-between">
			<div>
				<h3 class="text-xl font-bold text-gray-900 mb-2">Halo Selamat Datang, <?= $this->session->userdata('nama_pelanggan') ?></h3>
				<span class="text-base font-normal text-gray-500">Aplikasi PPOB Listrik Pasca Bayar - UJIKOM</span>
			</div>
		</div>
	</div>
<?php if($DataTagihan != NULL): ?>
	<?php foreach ($StatusTagihan as $data): ?>
	<div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">
						<?php if($data->status == 'Lunas'): ?>
						<font color="green"><strong><?= $data->status ?></strong></font>
						<?php else: ?>
						<font color="red"><?= $data->status ?></font>
						<?php endif?>
					</span>
					<h3 class="text-base font-normal text-gray-500">New products this week</h3>
				</div>
			</div>
		</div>
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $JumlahTagihanLunas ?></span>
					<h3 class="text-base font-normal text-gray-500">Visitors this week</h3>
				</div>
			</div>
		</div>
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $JumlahTagihanBelumLunas ?></span>
					<h3 class="text-base font-normal text-gray-500">User signups this week</h3>
				</div>
			</div>
		</div>
	</div>
  	<?php endforeach ?>
<?php endif ?>

<?php if($DataTagihan == NULL): ?>
	<div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">Belum ada tagihan</span>
					<h3 class="text-base font-normal text-gray-500">Status Tagihan Bulan Ini</h3>
				</div>
			</div>
		</div>
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">0</span>
					<h3 class="text-base font-normal text-gray-500">Jumlah Tagihan Lunas</h3>
				</div>
			</div>
		</div>
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
			<div class="flex items-center">
				<div class="flex-shrink-0">
					<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">0</span>
					<h3 class="text-base font-normal text-gray-500">Jumlah Tagihan Belum Lunas</h3>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if($DataTagihan == NULL): ?>

	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<div class="mb-4 flex items-center justify-between">
			<div class="w-full">
				<h3 class="text-xl font-bold text-gray-900 mb-2">Data Penggunaan Listrik Anda</h3>
				<span class="text-base font-normal text-gray-500">Periode Bulan Ini</span>
				<hr class="my-2 border-t-2 border-dashed border-gray-300 dark:border-gray-700 w-full">
				<p class="text-gray-900 mb-2">Total Bayar
				<span class="font-bold text-sky-600 inline">Rp. 0,00</span></p>
			</div>
		</div>
		<div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
			<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">0</span><span class="ml-2">Kwh</span>
						<h3 class="text-base font-normal text-gray-500">Total Meter</h3>
					</div>
				</div>
			</div>
			<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">0</span><span class="ml-2">Kwh</span>
						<h3 class="text-base font-normal text-gray-500">Meter Awal</h3>
					</div>
				</div>
			</div>
			<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">0</span><span class="ml-2">Kwh</span>
						<h3 class="text-base font-normal text-gray-500">Meter Akhir</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>

<?php if($DataTagihan != NULL): ?>
	<?php foreach ($DataTagihan as $data): ?>
	
	<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
		<div class="mb-4 flex items-center justify-between">
			<div class="w-full">
				<h3 class="text-xl font-bold text-gray-900 mb-2">Data Penggunaan Listrik Anda</h3>
				<span class="text-base font-normal text-gray-500">Bulan <?= $data->bulan ?> <?= $data->tahun ?></span>
				<hr class="my-2 border-t-2 border-dashed border-gray-300 dark:border-gray-700 w-full">
				<p class="text-gray-900 mb-2">Total Bayar
					<span class="font-bold text-sky-600 inline">
						<?php $bayar = ($data->jumlah_meter * $data->terperkwh + 2500) ?>
						Rp<?=number_format($bayar,2,',','.') ?>
					</span>
				</p>
			</div>
		</div>
		<div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
			<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $data->jumlah_meter ?></span><span class="ml-2">Kwh</span>
						<h3 class="text-base font-normal text-gray-500">Total Meter</h3>
					</div>
				</div>
			</div>
			<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $data->meter_awal ?></span><span class="ml-2">Kwh</span>
						<h3 class="text-base font-normal text-gray-500">Meter Awal</h3>
					</div>
				</div>
			</div>
			<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 hover:scale-95 hover:shadow-lg duration-200">
				<div class="flex items-center">
					<div class="flex-shrink-0">
						<span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $data->meter_akhir ?></span><span class="ml-2">Kwh</span>
						<h3 class="text-base font-normal text-gray-500">Meter Akhir</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OVERVIEW -->
  <?php endforeach ?>
  <?php endif ?>

</div>
