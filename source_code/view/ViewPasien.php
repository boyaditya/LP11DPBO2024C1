<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class ViewPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function index()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td ><a class='btn btn-primary' href='edit.php?id=" . $this->prosespasien->getId($i) . "'>Edit</a>
			 	<a class='btn btn-danger'  href='delete.php?id=" . $this->prosespasien->getId($i) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pasien ini?\");'>Delete</a>
			</td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function createPage()
	{
		$data = '<form action="" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<h3 class="mb-4">Tambah Pasien</h3>
						<div class="form-group">
							<label for="nik">NIK</label>
							<input type="text" class="form-control" name="nik" id="nik" maxlength="10">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" name="nama" id="nama">
						</div>
						<div class="form-group">
							<label for="tempat">Tempat</label>
							<input type="text" class="form-control" name="tempat" id="tempat">
						</div>
						<div class="form-group">
							<label for="tanggal_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tl" id="tanggal_lahir">
						</div>
						<div class="form-group">
						<label for="gender">Gender</label>
							<select class="form-control" name="gender" id="gender">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="email">
						</div>
						<div class="form-group">
							<label for="telp">Telepon</label>
							<input type="text" class="form-control" name="telp" id="telp">
						</div>

						<button type="submit" name="submit" class="btn btn-primary">Submit</button>

					</div>
				</form>';

		if (isset($_POST['submit'])) {
			if ($this->prosespasien->addPasien($_POST) > 0) {
				echo "<script>
				alert('Data berhasil ditambah!');
				document.location.href = 'index.php';
			</script>";
			} else {
				echo "<script>
				alert('Data gagal ditambah!');
				document.location.href = 'index.php';
			</script>";
			}
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function updatePage()
	{
		$this->prosespasien->prosesDataPasienById();

		$data = '<form action="" method="post">
					<div class="col-md-6">
						<h3 class="mb-4">Edit Pasien</h3>
						<input type="hidden" name="id" value="' . $this->prosespasien->getId(0) . '">
						<div class="form-group">
							<label for="nik">NIK</label>
							<input type="text" class="form-control" name="nik" id="nik" value="' . $this->prosespasien->getNik(0) . '"  maxlength="10">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" name="nama" id="nama" value="' . $this->prosespasien->getNama(0) . '">
						</div>
						<div class="form-group">
							<label for="tempat">Tempat</label>
							<input type="text" class="form-control" name="tempat" id="tempat" value="' . $this->prosespasien->getTempat(0) . '">
						</div>
						<div class="form-group">
							<label for="tanggal_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tl" id="tanggal_lahir" value="' . $this->prosespasien->getTl(0) . '">
						</div>
						<div class="form-group">
							<label for="gender">Gender</label>
							<select class="form-control" name="gender" id="gender">
								<option value="Laki-laki"' . ($this->prosespasien->getGender(0) == 'Laki-laki' ? 'selected' : '') . '>Laki-laki</option>
								<option value="Perempuan"' . ($this->prosespasien->getGender(0) == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="email" value="' . $this->prosespasien->getEmail(0) . '">
						</div>
						<div class="form-group">
							<label for="telp">Telepon</label>
							<input type="text" class="form-control" name="telp" id="telp" value="' . $this->prosespasien->getTelp(0) . '">
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>';

		if (isset($_POST['submit'])) {
			if ($this->prosespasien->updatePasien($_POST) > 0) {
				echo "<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php';
			</script>";
			} else {
				echo "<script>
				alert('Data gagal diubah!');
				document.location.href = 'index.php';
			</script>";
			}
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function deletePage()
	{
		if ($this->prosespasien->deletePasien($_GET['id']) > 0) {
			echo "<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'index.php';
		</script>";
		} else {
			echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'index.php';
		</script>";
		}
	}
}
