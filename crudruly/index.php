<?php

    // Koneksi Database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "dataform";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($koneksi));

    // Simpan
    if(isset($_POST['bsimpan']))
	{
		// Edit
		if($_GET['hal'] == "edit")
		{
			// Data edit
			$edit = mysqli_query($koneksi, "UPDATE tform set
											 	nama = '$_POST[nama]',
											 	nosurat = '$_POST[nosurat]',
												tptlahir = '$_POST[tptlahir]',
											 	tgllahir = '$_POST[tgllahir]',
                                                alamat = '$_POST[alamat]', 
                                                telp = '$_POST[telp]', 
                                                email = '$_POST[email]', 
                                                lokasi = '$_POST[lokasi]', 
                                                tglpermohonan = '$_POST[tglpermohonan]', 
                                                tglpelaksanaan = '$_POST[tglpelaksanaan]', 
                                                lama = '$_POST[lama]', 
                                                judul = '$_POST[judul]' 
											 WHERE id_form = '$_GET[id]'
										   ");
			if($edit) // Edit sukses
			{
				echo "<script>
						alert('Edit data sukses!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data gagal!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			// Data simpan
			$simpan = mysqli_query($koneksi, "INSERT INTO tform (nama, nosurat, tptlahir, tgllahir, alamat, telp, email, lokasi, tglpermohonan, tglpelaksanaan, lama, judul)
										  VALUES ('$_POST[nama]',
											 	'$_POST[nosurat]',
												'$_POST[tptlahir]',
											 	'$_POST[tgllahir]',
                                                '$_POST[alamat]', 
                                                '$_POST[telp]', 
                                                '$_POST[email]', 
                                                '$_POST[lokasi]', 
                                                '$_POST[tglpermohonan]', 
                                                '$_POST[tglpelaksanaan]', 
                                                '$_POST[lama]', 
                                                '$_POST[judul]')
										 ");
			if($simpan) // Add sukses
			{
				echo "<script>
						alert('Simpan data sukses!');
						document.location='index.php';
				     </script>";
			}
			else // Add gagal
			{
				echo "<script>
						alert('Simpan data gagal!');
						document.location='index.php';
				     </script>";
			}
		}
	}

	// Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tform WHERE id_form = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['nama'];
				$vnosurat = $data['nosurat'];
                $vtptlahir = $data['tptlahir'];
			    $vtgllahir = $data['tgllahir'];
                $valamat = $data['alamat']; 
                $vtelp = $data['telp'];
                $vemail = $data['email']; 
                $vlokasi = $data['lokasi']; 
                $vtglpermohonan = $data['tglpermohonan']; 
                $vtglpelaksanaan = $data['tglpelaksanaan']; 
                $vlama = $data['lama'];
                $vjudul = $data['judul'];
                
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tform WHERE id_form = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Sukses!');
						document.location='index.php';
				     </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>Form - Kementrian Kelautan dan Perikanan</title>
</head>

<body>
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4 mt-3" style="margin-left: 125px;">
        <img src="img/iconkkp.png" alt="Logo KKP" style="width: 100px;height:100px;">
        <img src="img/logo-pieh.png" alt="Logo KKP" style="width: 100px;height:90px;">
        <img src="img/logo-anambas.png" alt="Logo KKP" style="width: 100px;height:80px;">
      </div>
      <div class="col-md-6 mt-3 text-start nopadding">
        <p><b>Kementrian Kelautan dan Perikanan Direktorat Jenderal Pengelolaan Laut </b><br>
          Loka Kawasan Konservasi Perairan Nasional (LKKPN) Pekanbaru <br><i>
            1. Taman Wisata Perairan (TWP) Pulau Pieh dan Laut di Sekitarnya<br>
            2. Taman Wisata Perairan (TWP) Kepulauan Anambas dan Laut di Sekitarnya</i></p>
      </div>
    </div>
  </div>
  <hr>
  <div class="wrapper">
    <div class="title">
      Form Pendaftaran Kegiatan Magang
    </div>
    <form action="" method="post">
      <table>
        <tr>
          <td>Nama Pemohon Magang</td>
          <td><input type="text" name="nama" value="<?=@$vnama?>" required></td>
        </tr>
        <tr>
          <td>No. Surat Dari Instansi/Perguruan Tinggi</td>
          <td><input type="text" name="nosurat" value="<?=@$vnosurat?>" required></td>
        </tr>
        <tr>
          <td>Tempat Lahir</td>
          <td><input type="text" name="tptlahir" value="<?=@$vtptlahir?>" required></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td><input type="date" name="tgllahir" value="<?=@$vtgllahir?>" required></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><input type="textarea" name="alamat" value="<?=@$valamat?>" required></td>
        </tr>
        <tr>
          <td>No. Telepon</td>
          <td><input type="text" name="telp" value="<?=@$vtelp?>" required></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="email" name="email" value="<?=@$vemail?>" required></td>
        </tr>
        <tr>
          <td>Lokasi</td>
          <td>
            <select class="input form-select" name="lokasi" style="padding: 10px; width: 98%; color: #000; border: 1px solid #6f818f; margin-left: 0px;">
	    		<option value="<?=@$vlokasi?>"><?=@$vlokasi?></option>
	    		<option value="1">Taman Wisata Perairan (TWP) Pulau Pieh dan Laut di Sekitarnya</option>
	    		<option value="2">Taman Wisata Perairan (TWP) Kepulauan Anambas dan Laut di Sekitarnya</option>
	    	</select>
          </td>
        </tr>
        <tr>
          <td>Tanggal Permohonan</td>
          <td><input type="date" name="tglpermohonan" value="<?=@$vtglpermohonan?>" required></td>
        </tr>
        <tr>
          <td>Tanggal Pelaksanaan</td>
          <td><input type="date" name="tglpelaksanaan" value="<?=@$vtglpelaksanaan?>" required></td>
        </tr>
        <tr>
          <td>Lama Kegiatan</td>
          <td><input type="number" name="lama" value="<?=@$vlama?>" required></td>
        </tr>
        <tr>
          <td>Judul Penelitian</td>
          <td><input type="text" name="judul" value="<?=@$vjudul?>" required></td>
        </tr>
      </table>
      <br>
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Ketentuan</h5>
          <p class="card-text text-muted">[1]. Dilarang mengambil Material/sampel tanpa seizin pengelola
            Kawasan Konservasi Perairan; [2]. Dilarang
            menginjak/merusak biota dan ekosistem di Kawasan Konservasi Perairan; [3]. Dilarang menggunakan
            peralatan yang merusak biota
            dan ekosistem perairan; [4]. Pengunjung wajib melaporkan sarana/peralatan yang digunakan; [5].
            Pengunjung wajib mendapatkan
            informasi dan pengarahan dari petugas; [6]. Pengunjung wajib mentaati peraturan yang berlaku di
            Kawasan Konservasi Perairan.</p>
        </div>
      </div><br>
      <div class="row">
        <div class="column">
          <input type="submit" value="Simpan" id="submit" name="bsimpan">
        </div>
        <div class="column">
          <input type="reset" value="Kosongkan" id="reset" name="breset">
        </div>
      </div>
    </form>
  </div>
  <div class="container-fluid">
  <div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Data Form Pendaftaran Magang
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
                <th>No.</th>
	    		<th>Nama Pemohon</th>
                <th>No. Surat</th>
	    		<th>Tempat Lahir</th>
	    		<th>Tanggal Lahir</th>
	    		<th>Alamat</th>
	    		<th>No. Telepon</th>
                <th>Email</th>
                <th>Lokasi</th>
                <th>Tanggal Permohonan</th>
                <th>Tanggal Pelaksanaan</th></ht>
                <th>Lama Kegiatan</th>
                <th>Judul Penelitian</th>
                <th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from tform order by id_form desc");
	    		while($data = mysqli_fetch_array($tampil)) :
	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['nosurat']?></td>
	    		<td><?=$data['tptlahir']?></td>
	    		<td><?=$data['tgllahir']?></td>
                <td><?=$data['alamat']?></td>
                <td><?=$data['telp']?></td>
                <td><?=$data['email']?></td>
                <td><?=$data['lokasi']?></td>
                <td><?=$data['tglpermohonan']?></td>
                <td><?=$data['tglpelaksanaan']?></td>
                <td><?=$data['lama']?></td>
                <td><?=$data['judul']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_form']?>" class="btn btn-warning mb-2" style="padding: 5px 20px;"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_form']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>