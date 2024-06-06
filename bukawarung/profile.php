<?php 
	session_start();
	include 'db.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_assoc($query);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buka Warung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header ---->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">BukaWarung</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-product.php">Data Product</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>

	<div class="section">
		<div class="container">
			<h3>Profile</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap"   class="input-control" value="<?php echo $d->admin_name ?>"   required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $_SESSION['a_global']->username ?>" required>
					<input type="text" name="hp" placeholder="No HP" class="input-control" value="<?php echo $_SESSION['a_global']->admin_telp ?>" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $_SESSION['a_global']->admin_email ?>" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $_SESSION['a_global']->admin_address ?>" required>
					<input type="submit" name="submit" value="Ubah Profile" class="btn">
				</form>
				<?php 
					if (isset($_POST['submit'])) {
						
						$nama = $_POST['nama'];
						$user = $_POST['user'];
						$hp = $_POST['hp'];
						$email = $_POST['email'];
						$alamat = $_POST['alamat'];

						$update = mysqli_query($conn, "UPDATE tb_admin SET 
								admin_name = '".$nama."',
								username = '".$user."',
								admin_telp = '".$hp."',
								admin_email = '".$email."',
								admin_address = '".$alamat."'
								WHERE admin_id = '".$d->admin_id."' ");

						if ($update) {
							echo "Berhasil";
						}else{
							echo "gagal".mysqli_error($conn);
						}

					}
				 ?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2023 : BukaWaring</small>
		</div>
	</footer>
		
</body>
</html>