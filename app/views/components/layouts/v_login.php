<!doctype html>
<html lang="en" class="fullscreen-bg dark">

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>css/tailwind.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/ppob_ico.ico'); ?>">

</head>

<body>

<?php //$this->view('components/layouts/v_header');?>
<div class="fixed top-5 left-5">
	<button id="theme-toggle" title="Dark/Light Toggle" type="button" class="bg-slate-700 dark:bg-gray-200 text-gray-200 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
		<svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
		<svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
	</button>
</div>
<section class="flex flex-col md:flex-row h-screen items-center">

	<div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
		<img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
		<!-- <img src="<?=base_url('assets/')?>img/login_wp.webp" alt="" class="w-full h-full object-cover"> -->
	</div>

	<div class="bg-white dark:bg-slate-900 w-full md:max-w-md lg:max-w-full  md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">

		<div class="w-full h-100">
			<?= $this->session->flashdata('message'); ?>
			<h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 dark:text-gray-100"><?= $title_head; ?></h1>
							
			<form class="form-auth-small mt-6" action="<?=base_url($URL)?>" method="post">
				<div>
					<label for="username" class="block text-gray-700 dark:text-gray-300">Username</label>
					<input id="username" type="text" name="username" placeholder="Username" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
				</div>

				<div class="mt-4">
					<label for="sp" class="block text-gray-700 dark:text-gray-300">Password</label>
					<input id="sp" type="password" name="password" placeholder="Password" minlength="<?= $min_psl; ?>" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
						focus:bg-white focus:outline-none" required>
				</div>

				<div class="form-check mt-2">
					<input type="checkbox" name="check" type="checkbox" onclick="FPassword()" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="FP">
					<label class="form-check-label inline-block text-gray-800 -mb-1 dark:text-gray-300" for="FP">
						Lihat Password
					</label>
				</div>

				<button type="submit" name="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg  px-4 py-3 mt-6">Log In</button>
			</form>
			
			<?php if($regist) { ?>
				<hr class="my-6 border-gray-300 dark:border-gray-700 w-full">

				<p class="mt-8 dark:text-gray-300">Belum memiliki akun? <span data-bs-toggle="modal" data-bs-target="#registrasi" class="cursor-pointer text-blue-500 hover:text-blue-700 font-semibold">Daftarkan Akun</span></p>
			<?php }; ?>
		</div>
	</div>

</section>
<?php if($regist) {
    $this->view('components/parts/m_registrasi'); 
};

//$this->view('components/layouts/v_footer');?>
	<script src="<?= base_url('assets/'); ?>js/app.js"></script>
	<script src="<?= base_url('assets/'); ?>js/auth.js"></script>
	<script src="<?= base_url('assets/'); ?>js/tailwind-elements.min.js"></script>
</body>

</html>