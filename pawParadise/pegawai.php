<?php
include_once("connection.php");


$result = mysqli_query($mysqli, "SELECT * FROM pegawai");
if (isset($_POST['submit_insert'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $jk = $_POST['jk'];
    $id_jadwal = $_POST['id_jadwal'];

   	$sql = "INSERT INTO pegawai (id_pegawai, nama_pegawai, jk, id_jadwal) VALUES ('$id_pegawai', '$nama_pegawai', '$jk','$id_jadwal')";
    $tambah =mysqli_query($mysqli, $sql);
}

if (isset($_POST['submit_edit'])) {
     $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $jk = $_POST['jk'];
    $id_jadwal = $_POST['id_jadwal'];

   	$sql = "UPDATE pegawai SET id_pegawai ='$id_pegawai',nama_pegawai='$nama_pegawai',jk='$jk', id_jadwal ='$id_jadwal' WHERE id_pegawai='$id_pegawai'";
    $edit =mysqli_query($mysqli, $sql);
}

// Pengecekan apakah form untuk delete telah disubmit
if (isset($_POST['submit_delete'])) {
    $id_pegawai = $_POST['id_pegawai'];

    // Menjalankan query untuk menghapus data dari tabel
    $sql = "DELETE FROM pegawai WHERE id_pegawai = '$id_pegawai'";
    $delete = mysqli_query($mysqli, $sql);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

</head>
<body>
	<nav class="navbar bg-primary sticky-top">
  <div class="container-fluid text-center">
    <a class="navbar-brand text-white" href="#">
      <h3 class="">DASHBOARD ADMIN PAW PARADISE</h3> 
    </a>
    <div class="text-white">
    	<marquee>Selamat Datang di Dasboard Paw Paradise</marquee>
    </div>
  </div>
</nav>
<div class="container-fluid">
	<div class="row no-gutter" style="height: 100vh;">
		<div class="col-md-3 bg-dark">
			<ul class="nav flex-column ms-4 mt-4 mb-4">
			  <li class="nav-item">
			    <a class="nav-link text-white" href="index.php"><i class="fa-solid fa-user me-3"></i>Data Pembeli</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="pembelian.php"><i class="fa-solid fa-chart-simple me-3"></i>Data Pembelian</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="pegawai.php"><i class="fa-solid fa-user-tie me-3"></i>Data Pegawai</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="#"><i class="fa-solid fa-calendar-days me-3"></i>Jadwal Pegawai</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="#"><i class="fa-solid fa-file me-3"></i>Data Pencatatan</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="#"><i class="fa-solid fa-paw me-3"></i>Data Hewan</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="#"><i class="fa-solid fa-truck-fast me-3"></i>Data Suplier</a>
			    <hr class="text-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="#"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
			  </li>
			</ul>
		</div>
		<div class="col-md-9 bg-succes p-5">
			<h4>Data Pegawai</h4>
			<table class="table">
    <tr class="table-dark">
      <th scope="col">ID Pegawai</th>
      <th scope="col">Nama Pegawai</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">ID Jadwal</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) 
    {         
        echo "<tr>";
        echo "<td>".$user_data['id_pegawai']."</td>";
        echo "<td>".$user_data['nama_pegawai']."</td>";
        echo "<td>".$user_data['jk']."</td>";
        echo "<td>".$user_data['id_jadwal']."</td>";
        echo "</tr>";
                   
    }
    ?>
</table>
<div class="row my-5">
	<div class="col-md-6 px-5">
<h4>Form Insert Data</h4>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="exampleFormControlInput1" class="form-label">ID Pegawai:</label>
        <input type="text" name="id_pegawai" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">Nama Pegawai:</label>
        <input type="text" name="nama_pegawai" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin:</label>
        <input type="text" name="jk" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">ID Jadwal:</label>
        <input type="text" name="id_jadwal" required class="form-control form-control-sm"><br><br>
        <input class="btn btn-primary" type="submit" name="submit_insert" value="Insert Data">
    </form>
    </div>
<div class="col-md-6 px-5">
    <h4>Form Edit Data</h4>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="exampleFormControlInput1" class="form-label">ID Pegawai:</label>
        <input type="text" name="id_pegawai" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">Nama Pegawai:</label>
        <input type="text" name="nama_pegawai" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin:</label>
        <input type="text" name="jk" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">ID Jadwal:</label>
        <input type="text" name="id_jadwal" required class="form-control form-control-sm"><br><br>
        <input class="btn btn-primary" type="submit" name="submit_edit" value="Edit Data">
    </form>
    </div>
  </div>
    <div class="row">
    	<div class="col-md-4 px-5">
    <h4>Form Delete Data</h4>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="exampleFormControlInput1" class="form-label">ID:</label>
        <input type="text" name="id_pegawai" required class="form-control form-control-sm"><br><br>
        <input class="btn btn-primary" type="submit" name="submit_delete" value="Delete Data">
    </form>
    </div>
    </div>
    </div>
    </div>
		</div>
	</div>
</div>
	
<style type="text/css">
	.nav-link:hover{
		background-color: grey;
	}
</style>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>