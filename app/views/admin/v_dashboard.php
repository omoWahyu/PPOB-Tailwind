
<div class="h-full pt-6 px-4">

	<?= $this->session->flashdata('message'); ?>

	<div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
			<div class="mb-4 flex items-center justify-between">
				<div>
					<h3 class="text-xl font-bold text-gray-900 mb-2">Total Pembayaran</h3>
					<span class="text-base font-normal text-gray-500">Bulan <?= $BulanIni; ?></span>
				</div>
			</div>
			<div class="flex flex-col mt-8">
				<div class="overflow-x-auto rounded-lg">
				<div class="align-middle inline-block min-w-full">
					<div class="shadow overflow-hidden sm:rounded-lg">
						<table class="min-w-full divide-y divide-gray-200">
							<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Data
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Jumlah
								</th>
							</tr>
							</thead>
							<tbody class="bg-white">
							<tr class="border-b border-dashed">
								<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
									Lunas
								</td>
								<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
									<?= $DataPembayaranLunas ?>
								</td>
							</tr>
							<tr class="border-b border-dashed">
								<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
									Belum Lunas
								</td>
								<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
									<?= $DataPembayaranBelumLunas ?>
								</td>
							</tr>
							</tbody>
							<tfoot class="bg-gray-50">
							<tr>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Total
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									<?= $DataPembayaran ?>
								</th>
							</tr>
							</tfoot>
						</table>
					</div>
				</div>
				</div>
			</div>
		</div>
		
		<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
			<div class="mb-4 flex items-center justify-between">
			<div>
				<h3 class="text-xl font-bold text-gray-900 mb-2">Total Pembayaran</h3>
				<span class="text-base font-normal text-gray-500">Keseluruhan data</span>
			</div>
			</div>
			<div class="flex flex-col mt-8">
			<div class="overflow-x-auto rounded-lg">
				<div class="align-middle inline-block min-w-full">
					<div class="shadow overflow-hidden sm:rounded-lg">
						<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Data
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Jumlah
								</th>
							</tr>
						</thead>
						<tbody class="bg-white">
							<tr class="border-b border-dashed">
								<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
									Lunas
								</td>
								<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
									<?= $DataSemuaPembayaranLunas ?>
								</td>
							</tr>
							<tr class="border-b border-dashed">
								<td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
									Belum Lunas
								</td>
								<td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
									<?= $DataSemuaPembayaranBelumLunas ?>
								</td>
							</tr>
						</tbody>
						<tfoot class="bg-gray-50">
							<tr>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Total
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									<?= $DataSemuaPembayaran ?>
								</th>
							</tr>
						</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
