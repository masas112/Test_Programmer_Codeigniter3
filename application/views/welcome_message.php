<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">Tabel Produk</h1>
	<h1 id="judultabel"></h1>
</div>

<div class="card-body row">
	<div class="container">
		<div class="text-center">
			<button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambahproduk">Tambah Produk</button>
			<button class="btn btn-sm btn-success mb-3" onclick="semuaData()">Tampilkan Semua Barang</button>
			<button id="bt_data" class="btn btn-sm btn-success mb-3" onclick="gantiData()">Data Tidak DiJual</button>
			<button class="btn btn-sm btn-primary mb-3" onclick="AksesAPI('tampilkan')">Data API</button>
			<button class="btn btn-sm btn-primary mb-3" onclick="AksesAPI('tambahkan')">Tambah Data API Ke DB</button>
			<button class="btn btn-sm btn-primary mb-3" onclick="AksesAPI('hapus')">Delete Data API Di DB</button>
		</div>
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
							<input type="text" id="harga" class="form-control" name="harga" inputmode="numeric" pattern="[0-9]*" placeholder="Masukkan Angka" required>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-3">
							<label for="">Status Produk : </label>
						</div>
						<div class="col-lg-9">
							<select id="status" class="form-control" name="status" required>
								<option value="" selected disabled>Pilih Status</option>
								<option value="1">Di jual</option>
								<option value="0">Tidak Dijual</option>
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
							<input type="text" id="editharga" class="form-control" name="harga" inputmode="numeric" pattern="[0-9]*" placeholder="Masukkan Angka" required>
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
		document.getElementById('judultabel').innerHTML = 'Semua Produk';
		tampilkanTabel(3);
		i = 0;
	});

	function semuaData() {
		deletetabel();
		document.getElementById('judultabel').innerHTML = 'Semua Produk';
		tampilkanTabel(3);
	}

	function gantiData() {
		deletetabel();
		switch (i) {
			case 0:
				tampilkanTabel(0);
				i = 1;
				document.getElementById('bt_data').innerHTML = "Di Jual";
				document.getElementById('judultabel').innerHTML = 'Produk Yang Tidak Di Jual';
				break;
			case 1:
				tampilkanTabel(1);
				i = 0;
				document.getElementById('bt_data').innerHTML = "Tidak Di Jual";
				document.getElementById('judultabel').innerHTML = 'Produk Yang Di Jual';
				break;
			default:
		}
	}

	function tampilkanTabel(statustabel) {
		var produk = <?php echo json_encode($produk); ?>;

		produk.forEach(function(p) {
			if (statustabel == 3) {
				tambahkanDataTabel(p.id_produk, p.nama_produk, p.kategori, p.harga, p.status);
			} else if (statustabel == p.status) {
				tambahkanDataTabel(p.id_produk, p.nama_produk, p.kategori, p.harga, p.status);
			}
		});
	}

	function tambahkanDataTabel(id, nama_produk, kategori, harga, status) {
		temp = (status == 1) ? "Di Jual" : "Tidak Di Jual";
		const table = document.getElementById('tabelproduk');
		var row = table.insertRow();
		row.insertCell(0).innerHTML = '<b>' + id + '</b>';
		row.insertCell(1).innerHTML = nama_produk;
		row.insertCell(2).innerHTML = kategori;
		row.insertCell(3).innerHTML = harga;
		row.insertCell(4).innerHTML = temp;
		row.insertCell(5).innerHTML = "<button class='btn btn-sm btn-primary'id='editButton' style='margin-right: 10px;' data-toggle='modal' data-target='#editproduk' onclick='Edit(" + id + ",\"" + nama_produk + "\",\"" + kategori + "\"," + harga + "," + status + ")'>Edit</button><button class='btn btn-sm btn-danger ' data-toggle='modal'  data-target='#hapusproduk' onclick='Delete(" + id + ")'> Hapus</button>";
	}

	function Edit(id, nama_produk, kategori, harga, status) {
		console.log(nama_produk);
		document.getElementById('editid').value = id;
		document.getElementById('editnama_produk').value = nama_produk;
		document.getElementById('editkategori').value = kategori;
		document.getElementById('editharga').value = harga;
		document.getElementById('editstatus').value = status;
	}

	function Delete(id) {
		document.getElementById('hapusid').value = id;
	}

	function deletetabel() {
		tabel = document.getElementById('tabelproduk');

		for (let a = tabel.rows.length - 1; a > 0; a--) {
			tabel.deleteRow(a);
		}
	}

	function DataApi(callback) {
		$.ajax({
			type: "POST",
			url: "<?php echo site_url(); ?>api/getdataapi",
			success: function(dataAPI) {
				dataAPI = JSON.parse(dataAPI);
				callback(dataAPI);
			},
		});
	}

	function AksesAPI(cek) {
		if (cek == 'tampilkan') {
			DataApi(function(dataAPI) {
				deletetabel();
				dataAPI.forEach(function(p) {
					tambahkanDataTabel(p.id_produk, p.nama_produk, p.kategori, p.harga, p.status);
				});
				console.log(dataAPI);
				document.getElementById('judultabel').innerHTML = 'Semua Produk di API';
			});
		} else if (cek == 'tambahkan') {
			DataApi(function(dataAPI) {
				dataAPI.forEach(function(p) {
					$.ajax({
						type: "POST",
						url: "<?php echo site_url(); ?>produk/add",
						data: {
							'nama_produk': p.nama_produk,
							'kategori': p.kategori,
							'harga': p.harga,
							'status': p.status,
						},
						success: function(data) {
							console.log('Sukses');
						},
					});
				});

				setTimeout(function() {
					window.location.replace("<?php echo base_url() ?>");
				}, 3000);
			});
		} else if (cek == 'hapus') {
			DataApi(function(dataAPI) {
				dataAPI.forEach(function(p) {
					$.ajax({
						type: "POST",
						url: "<?php echo site_url(); ?>produk/deleteapi",
						data: {
							'nama_produk': p.nama_produk,
						},
						success: function(data) {
							console.log(data);
						},
					});
				});

				setTimeout(function() {
					window.location.replace("<?php echo base_url() ?>");
				}, 5000);
			});
		}
	}
</script>