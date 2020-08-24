<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-white">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<a class="collapse-item" href="<?= base_url() ?>pegawai">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pegawai</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pegawai; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-friends fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<a class="collapse-item" href="<?= base_url() ?>mhs_magang">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Mahasiswa Magang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $magang; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users-cog fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<a class="collapse-item" href="<?= base_url() ?>mhs_magang/pending">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Permintaan Magang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pending; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-edit fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<a class="collapse-item" href="<?= base_url() ?>user">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User Aktif</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $aktif; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>