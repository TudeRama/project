<?php
include_once("connection.php");


$result = mysqli_query($mysqli, "SELECT * FROM pembelian");
if (isset($_POST['submit_insert'])) {
    $id_pembelian = $_POST['id_pembelian'];
    $id_hewan= $_POST['id_hewan'];
    $id_pembeli = $_POST['id_pembeli'];
    $jml_pembelian = $_POST['jml_pembelian'];
    

   	$sql = "INSERT INTO pembelian (id_pembelian, id_hewan, jml_pembelian, id_pembeli) VALUES ('$id_pembelian', '$id_hewan', '$jml_pembelian','$id_pembeli')";
    $tambah =mysqli_query($mysqli, $sql);
}

if (isset($_POST['submit_edit'])) {
    $id_pembelian = $_POST['id_pembelian'];
    $id_hewan= $_POST['id_hewan'];
    $id_pembeli = $_POST['id_pembeli'];
    $jml_pembelian = $_POST['jml_pembelian'];

   	$sql = "UPDATE pembelian SET id_pembelian ='$id_pembelian', id_hewan='$id_hewan', jml_pembelian='$jml_pembelian', id_pembeli='$id_pembeli' WHERE id_pembelian ='$id_pembelian'";
    $edit =mysqli_query($mysqli, $sql);
}

// Pengecekan apakah form untuk delete telah disubmit
if (isset($_POST['submit_delete'])) {
    $id_pembelian = $_POST['id_pembelian'];

    // Menjalankan query untuk menghapus data dari tabel
    $sql = "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'";
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
			<h4>Data Pembelian</h4>
			<table class="table">
    <tr class="table-dark">
      <th scope="col">ID Pembelian</th>
      <th scope="col">ID Hewan</th>
      <th scope="col">ID pembeli</th>
      <th scope="col">Jumlah Pembelian</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) 
    {         
        echo "<tr>";
        echo "<td>".$user_data['id_pembelian']."</td>";
        echo "<td>".$user_data['id_hewan']."</td>";
        echo "<td>".$user_data['jml_pembelian']."</td>";
        echo "<td>".$user_data['id_pembeli']."</td>";
        echo "</tr>";
                   
    }
    ?>
</table>
<div class="row my-5">
	<div class="col-md-6 px-5">
<h4>Form Insert Data</h4>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="exampleFormControlInput1" class="form-label">ID Pembelian:</label>
        <input type="text" name="id_pembelian" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">ID Hewan:</label>
        <input type="text" name="id_hewan" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">Jumlah Pembelian:</label>
        <input type="text" name="jml_pembelian" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">ID Pembeli:</label>
        <input type="text" name="id_pembeli" required class="form-control form-control-sm"><br><br>
        <input class="btn btn-primary" type="submit" name="submit_insert" value="Insert Data">
    </form>
    </div>
<div class="col-md-6 px-5">
    <h4>Form Edit Data</h4>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="exampleFormControlInput1" class="form-label">ID Pembelian:</label>
        <input type="text" name="id_pembelian" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">ID Hewan:</label>
        <input type="text" name="id_hewan" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">Jumlah Pembelian:</label>
        <input type="text" name="jml_pembelian" required class="form-control form-control-sm"><br><br>
        <label for="exampleFormControlInput1" class="form-label">ID Pembeli:</label>
        <input type="text" name="id_pembeli" required class="form-control form-control-sm"><br><br>
        <input class="btn btn-primary" type="submit" name="submit_edit" value="Edit Data">
    </form>
    </div>
  </div>
    <div class="row">
    	<div class="col-md-4 px-5">
    <h4>Form Delete Data</h4>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="exampleFormControlInput1" class="form-label">ID:</label>
        <input type="text" name="id_pembelian" required class="form-control form-control-sm"><br><br>
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