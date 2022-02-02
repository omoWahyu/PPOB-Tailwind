<?php $this->view('components/layouts/v_header');?>

<section class="flex flex-col md:flex-row h-screen items-center">

	<div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
		<img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
		<!-- <img src="<?=base_url('assets/')?>img/login_wp.webp" alt="" class="w-full h-full object-cover"> -->
	</div>

	<div class="bg-white w-full md:max-w-md lg:max-w-full  md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">

		<div class="w-full h-100">
			<?= $this->session->flashdata('message'); ?>
			<h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 dark:bg-slate-900"><?= $title_head; ?></h1>
								
			<form class="form-auth-small mt-6" action="<?=base_url($URL)?>" method="post">
				<div>
					<label for="username" class="block text-gray-700">Username</label>
					<input id="username" type="text" name="username" placeholder="Username" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
				</div>

				<div class="mt-4">
					<label for="sp" class="block text-gray-700">Password</label>
					<input id="sp" type="password" name="password" placeholder="Password" minlength="<?= $min_psl; ?>" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
						focus:bg-white focus:outline-none" required>
				</div>

				<div class="form-check mt-2">
					<input type="checkbox" name="check" type="checkbox" onclick="FPassword()" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="FP">
					<label class="form-check-label inline-block text-gray-800 -mb-1" for="FP">
						Lihat Password
					</label>
				</div>

				<button type="submit" name="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg dark:bg-slate-600 px-4 py-3 mt-6">Log In</button>
			</form>

			<hr class="my-6 border-gray-300 w-full">

			<p class="mt-8">Belum memiliki akun? <a href="" data-bs-toggle="modal" data-bs-target="#registrasi" class="text-blue-500 hover:text-blue-700 font-semibold">Daftarkan Akun</a></p>

		</div>
	</div>

</section>
<?php if($regist) {
    $this->view('components/parts/m_registrasi'); 
};

$this->view('components/layouts/v_footer');?>