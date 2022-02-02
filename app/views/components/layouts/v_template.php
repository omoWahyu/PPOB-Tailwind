<!doctype html>
<html lang="en">

<head>
	<title><?= $judul ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	
	<link rel="stylesheet" href="<?=base_url('assets/')?>css/tailwind.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/pln1.png">

	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

</head>

<body>
	<!-- This is an example component -->
<div>
   <nav class="bg-white border-b border-gray-200 dark:bg-gray-700 fixed z-30 w-full">
	  <div class="px-3 py-3 lg:px-5 lg:pl-3">
		 <div class="flex items-center justify-between">
			<div class="flex items-center justify-start">
			   <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
				  <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					 <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
				  </svg>
				  <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					 <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
				  </svg>
			   </button>
			   <a href="<?= base_url() ?>" class="text-xl font-bold flex items-center lg:ml-2.5">
				<i class="fa-solid fa-bolt fa-fw mr-3"></i>
			   <span class="self-center whitespace-nowrap">PPOB</span>
			   </a>
			   <form action="#" method="GET" class="hidden lg:block lg:pl-32">
				  <label for="topbar-search" class="sr-only">Search</label>
				  <div class="mt-1 relative lg:w-64">
					 <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
						<svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						   <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
						</svg>
					 </div>
					 <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
				  </div>
			   </form>
			</div>
			<div class="flex items-center space-x-2">
				
				<button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
					<svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
					<svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
				</button>

				<div class="flex justify-center">
					<div>
						<div class="dropdown relative">
						<button class=" dropdown-toggle flex flex-row items-center w-full p-1 hover:bg-gray-300 md:mt-0 md:px-1 text-sm font-semibold text-left rounded-full md:w-auto focus:shadow-outlinehover:bg-blue-700 hover:shadow-lg focus:bg-blue-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-300 active:shadow-lg active:text-white transition-all ease-in-out"
							type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
							<img loading="lazy" src="https://avatars.dicebear.com/api/initials/<?php if($this->session->userdata('id_level')!= null): ?><?= $this->session->userdata(rawurlencode('nama_admin')) ?><?php else: ?><?= $this->session->userdata(rawurlencode('nama_pelanggan')) ?><?php endif ?>.svg?background=%234B5563&fontSize=35&bold=1"
								class="object-cover w-8 h-8 rounded-full" alt="Profile Picture"/>
								<span class="mx-2">
								<?php if($this->session->userdata('id_level')!= null): ?>
									<?= $this->session->userdata(rawurlencode('nama_admin')) ?>
									<?php else: ?>
									<?= $this->session->userdata(rawurlencode('nama_pelanggan')) ?>
								<?php endif ?></span>
						</button>
						<ul
							class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none "
							aria-labelledby="dropdownMenuButton2" >
							<li>
							<a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100 "
								href="<?php if($this->session->userdata('id_level')!=NULL): 
											echo base_url('admin/logout');
											else:
											echo base_url('user/logout');
											endif;
										?>" >Logout</a>
							</li>
						</ul>
						</div>
					</div>
				</div>
			</div>
		 </div>
	  </div>
   </nav>
   <div class="flex overflow-hidden bg-white pt-16">
	  <aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
		 <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
			<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
			   <div class="flex-1 px-3 bg-white divide-y space-y-1">
				  <ul class="space-y-2 pb-2" x-data="navSidebar()">
					  
						<?php if($this->session->userdata('id_level')!= NULL && $this->session->userdata('id_level')== 1): ?>
						
						<template x-for="navs in admin" :key="navs">
							
							<li>
								<a x-bind:href="navs.href" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
									<i :class="navs.iconClass" class="fa-fw text-gray-500 group-hover:text-gray-900 transition duration-75"></i>
									<span x-text="navs.navName" class="ml-3"></span>
								</a>
							</li>
						</template>
						

					<?php elseif($this->session->userdata('id_level')!= NULL && $this->session->userdata('id_level')== 2): ?>

						<template x-for="navs in user" :key="navs">
							
							<li>
								<a x-bind:href="navs.href" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
									<i :class="navs.iconClass" class="fa-fw text-gray-500 group-hover:text-gray-900 transition duration-75"></i>
									<span x-text="navs.navName" class="ml-3"></span>
								</a>
							</li>
						</template>

					<?php else: ?>
					
						<template x-for="navs in other" :key="navs">
							
							<li>
								<a x-bind:href="navs.href" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
									<i :class="navs.iconClass" class="fa-fw text-gray-500 group-hover:text-gray-900 transition duration-75"></i>
									<span x-text="navs.navName" class="ml-3"></span>
								</a>
							</li>
						</template>
					<?php endif ?>
					
				  </ul>
			   </div>
			</div>
		 </div>
	  </aside>
	  <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
	  <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
		 <main class="min-h-screen">
			<?php $this->load->view($konten); ?>
		 </main>
		 <p class="text-center text-sm text-gray-500 my-10">
			&copy; 2022 <a href="https://github.com/yuu27q" class="hover:underline" target="_blank">Yuu27q</a> a.k.a Wahyudi Chrisdianto. All rights reserved.
		 </p>
	  </div>
   </div>
	<script>
		function navSidebar() {
		return {
			admin: [
				{
					navName: 'Dashboard',
					iconClass: 'fa-solid fa-house',
					href: '<?=base_url()?>dashboard',
				},
				{
					navName: 'Data Admin',
					iconClass: 'fa-solid fa-address-book',
					href: '<?=base_url()?>data_admin',
				},
				{
					navName: 'Data Level',
					iconClass: 'fa-solid fa-address-card',
					href: '<?=base_url()?>level',
				},
				{
					navName: 'Data Pelanggan',
					iconClass: 'fa-solid fa-user',
					href: '<?=base_url()?>data_pelanggan',
				},
				{
					navName: 'Tarif Listrik',
					iconClass: 'fa-solid fa-dollar',
					href: '<?=base_url()?>tarif',
				},
				{
					navName: 'Penggunaan Listrik',
					iconClass: 'fa-solid fa-line-chart',
					href: '<?=base_url()?>penggunaan',
				},
				{
					navName: 'Konfirmasi Pembayaran',
					iconClass: 'fa-solid fa-money',
					href: '<?=base_url()?>pembayaran',
				},
				{
					navName: 'Riwayat Pembayaran',
					iconClass: 'fa-solid fa-history',
					href: '<?=base_url()?>riwayat',
				},
				{
					navName: 'Generate Laporan',
					iconClass: 'fa-solid fa-download',
					href: '<?=base_url()?>laporan_pembayaran',
				},
			],
			user: [
				{
					navName: 'Dashboard',
					iconClass: 'fa-solid fa-house',
					href: '<?=base_url()?>dashboard',
				},
				{
					navName: 'Generate Laporan',
					iconClass: 'fa-solid fa-download',
					href: '<?=base_url()?>laporan_pembayaran',
				},
			],
			other: [
				{
					navName: 'Dashboard',
					iconClass: 'fa-solid fa-house',
					href: '<?=base_url()?>dashboard',
				},
				{
					navName: 'Tagihan Listrik',
					iconClass: 'fa-solid fa-bolt',
					href: '<?=base_url()?>tagihan',
				},
				{
					navName: 'Generate Laporan',
					iconClass: 'fa-solid fa-download',
					href: '<?=base_url()?>laporan_pembayaran',
				},
			],
		};
	}
	</script>
	<script src="<?= base_url('assets/'); ?>js/app.js"></script>
	<script src="<?= base_url('assets/'); ?>js/tailwind-elements.min.js"></script>
	<script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
	<script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
	<script>
	$(function () {
		$('#tabelbiasa').DataTable()
	})
	</script>
</div>


</body>

</html>