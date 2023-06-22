<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

	<title>Test Programmer</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

	<!-- Bootstrap core CSS -->
	<link href=<?= base_url("assets/css/bootstrap.min.css") ?> rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="pricing.css" rel="stylesheet">
</head>

<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal">Test Programmer</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="#">Cek Koneksi</a>
			<a class="p-2 text-dark" href="#">Username</a>
			<a class="p-2 text-dark" href="#">Password</a>
		</nav>
	</div>

	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
		<h1 class="display-4">Tabel Produk</h1>
	</div>
	<div class="text-center">
		<button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambahproduk">Tambah Produk</button>
	</div>
	<div class="card-body row">
		<div class="container">
			<table id="tabelproduk" class="table" width cellspacing="0">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nama</th>
						<th scope="col">Kategori</th>
						<th scope="col">Harga</th>
						<th scope="col">Status</th>
						<th scope="col">Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produk as $p) : ?>
						<tr>
							<th scope="row"><?= $p->id_produk; ?></th>
							<td><?= $p->nama_produk ?></td>
							<td><?= $p->kategori ?></td>
							<td><?= $p->harga ?></td>
							<td><?php if ($p->status == 1) {
									echo 'Di jual';
								} else {
									echo 'tidak dijual';
								} ?></td>
							<td><button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#editproduk" onclick="Edit('<?= $p->id_produk ?>','<?= $p->nama_produk ?> ','<?= $p->kategori ?>','<?= $p->harga ?>','<?= $p->status ?>')">Edit</button>
								<button class="btn btn-sm btn-danger " data-toggle="modal" data-target="#hapusproduk" onclick="Delete(<?= $p->id_produk ?>)"> Hapus</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal Tambah -->
	<div class=" modal fade" id="tambahproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>produk/add" method="post">
					<div class="modal-body">
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Nama Produk : </label>
							</div>
							<div class="col-lg-9">
								<input type="text" id="nama_produk" class="form-control" name="nama_produk" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Kategori : </label>
							</div>
							<div class="col-lg-9">
								<input type="text" id="kategori" class="form-control" name="kategori" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Harga : </label>
							</div>
							<div class="col-lg-9">
								<input type="text" id="harga" class="form-control" name="harga" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Status Produk : </label>
							</div>
							<div class="col-lg-9">
								<select id="status" class="form-control" name="status" required>
									<option value="" selected disabled>Pilih Status</option>
									<option value="0">Di jual</option>
									<option value="1">Tidak Dijual</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Tambahkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Edit -->
	<div class="modal fade" id="editproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>produk/edit" method="POST">
					<div class="modal-body">
						<input type="text" id="editid" name="id" hidden>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Nama Produk : </label>
							</div>
							<div class="col-lg-9">
								<input type="text" id="editnama_produk" class="form-control" name="nama_produk" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Kategori : </label>
							</div>
							<div class="col-lg-9">
								<select id="editkategori" class="form-control" name="kategori" required>
									<option value="" selected disabled>Pilih Kategori</option>
									<?php foreach ($produk as $p) : ?>
										<option value="<?= $p->kategori ?>"><?= $p->kategori ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Harga : </label>
							</div>
							<div class="col-lg-9">
								<input type="text" id="editharga" class="form-control" name="harga" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-3">
								<label for="">Status Produk : </label>
							</div>
							<div class="col-lg-9">
								<select id="editstatus" class="form-control" name="status" required>
									<option value="" selected disabled>Pilih Status</option>
									<option value="1">Di jual</option>
									<option value="0">Tidak Dijual</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Hapus -->
	<div class="modal fade" id="hapusproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>produk/delete" method="post">
					<div class="modal-body">
						Apakah anda yakin untuk hapus ?

					</div>
					<input type="text" id="hapusid" class="form-control" name="id" hidden>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer class="pt-4 my-md-5 pt-md-5 border-top">
		<div class="row">
			<div class="col-12 col-md">
				<img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
				<small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
			</div>
			<div class="col-6 col-md">
				<h5>Features</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Cool stuff</a></li>
					<li><a class="text-muted" href="#">Random feature</a></li>
					<li><a class="text-muted" href="#">Team feature</a></li>
					<li><a class="text-muted" href="#">Stuff for developers</a></li>
					<li><a class="text-muted" href="#">Another one</a></li>
					<li><a class="text-muted" href="#">Last time</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Resources</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Resource</a></li>
					<li><a class="text-muted" href="#">Resource name</a></li>
					<li><a class="text-muted" href="#">Another resource</a></li>
					<li><a class="text-muted" href="#">Final resource</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>About</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Team</a></li>
					<li><a class="text-muted" href="#">Locations</a></li>
					<li><a class="text-muted" href="#">Privacy</a></li>
					<li><a class="text-muted" href="#">Terms</a></li>
				</ul>
			</div>
		</div>
	</footer>
	</div>





	<script>
		document.addEventListener('DOMContentLoaded', function() {
			tampilkanTabel(1);
		});

		function tampilkanTabel(statustabel) {
			var produk = <?php echo json_encode($produk); ?>;
			console.log(produk);
			const table = document.getElementById('tabelproduk');
			// var row = table.insertRow();

			produk.forEach(function(p) {
				if (p.status == 1) {
					temp = "Di Jual";
				} else {
					temp = "Tidak Di Jual";
				}
				if (statustabel == p.status) {
					var row = table.insertRow();
					row.insertCell(0).innerHTML = '<b>' + p.id_produk + '</b>';
					row.insertCell(1).innerHTML = p.nama_produk;
					row.insertCell(2).innerHTML = p.kategori;
					row.insertCell(3).innerHTML = p.harga;
					row.insertCell(4).innerHTML = temp;
					row.insertCell(5).innerHTML = "<button class='btn btn-sm btn-primary' style='margin-right: 10px;' data-toggle='modal' data-target='#editproduk' onclick='Edit(" + p.id_produk + "," + p.nama_produk + "," + p.kategori + "," + p.harga + "," + p.status + ")'>Edit</button><button class='btn btn-sm btn-danger ' data-toggle='modal' data-target='#hapusproduk' onclick='Delete(" + p.id_produk + ")'> Hapus</button>";
				} else if (statustabel != 0 && statustabel != 1) {
					var row = table.insertRow();
					row.insertCell(0).innerHTML = '<b>' + p.id_produk + '</b>';
					row.insertCell(1).innerHTML = p.nama_produk;
					row.insertCell(2).innerHTML = p.kategori;
					row.insertCell(3).innerHTML = p.harga;
					row.insertCell(4).innerHTML = temp;
					row.insertCell(5).innerHTML = "<button class='btn btn-sm btn-primary' style='margin-right: 10px;' data-toggle='modal' data-target='#editproduk' onclick='Edit(" + p.id_produk + "," + p.nama_produk + "," + p.kategori + "," + p.harga + "," + p.status + ")'>Edit</button><button class='btn btn-sm btn-danger ' data-toggle='modal' data-target='#hapusproduk' onclick='Delete(" + p.id_produk + ")'> Hapus</button>";
				}
			});
		}


		function Delete(id) {
			document.getElementById('hapusid').value = id;
		}

		function Edit(id, nama_produk, kategori, harga, status) {
			document.getElementById('editid').value = id;
			document.getElementById('editnama_produk').value = nama_produk;
			document.getElementById('editkategori').value = kategori;
			document.getElementById('editharga').value = harga;
			document.getElementById('editstatus').value = status;

			console.log(status);
		}
	</script>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script>
		window.jQuery || document.write('<script src=<?= base_url("assets/js/vendor/jquery-slim.min.js") ?>><\/script>')
	</script>
	<script src=<?= base_url('assets/js/vendor/popper.min.js') ?>></script>
	<script src=<?= base_url("assets/js/bootstrap.min.js") ?>></script>
	<script src=<?= base_url("assets/js/vendor/holder.min.js") ?>></script>
	<script>
		Holder.addTheme('thumb', {
			bg: '#55595c',
			fg: '#eceeef',
			text: 'Thumbnail'
		});
	</script>
</body>

</html>