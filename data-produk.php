<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSphere</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.section h3 {
            margin-top: 20px; /* Adjust the value as needed */
        }
	</style>
</head>
<body>
	<!-- header -->
	<header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <h1><a href="dashboard.php">PSphere</a></h1>
            <ul class="nav">
                <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="profil.php" class="nav-link">Profil</a></li>
                <li class="nav-item"><a href="data-kategori.php" class="nav-link">Data Kategori</a></li>
                <li class="nav-item"><a href="data-produk.php" class="nav-link">Data Produk</a></li>
                <li class="nav-item"><a href="keluar.php" class="nav-link">Keluar</a></li>
            </ul>
        </div>
    </header>

	<!-- content -->
	<div class="section my-5">
		<div class="container">
			<h3>Data Produk</h3>
			<div class="box">
				<a href="tambah-produk.php" class="btn btn-primary mb-3">Tambah Produk</a>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
							if(mysqli_num_rows($produk) > 0){
								while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td><?php echo $row['product_price'] ?></td>
							<td><img src="uploads/<?php echo $row['product_image'] ?>" width="100px"></td>
							<td><?php echo ($row['product_status'] == 1)? 'Aktif':'Tidak Aktif'; ?></td>
							<td>
							<a href="edit-produk.php?id=<?php echo $row['product_id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> 
                                </a>
                                <a href="proses-hapus.php?idk=<?php echo $row['product_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus ?')">
                                    <i class="bi bi-trash"></i> 
                                </a>
							</td>
						</tr>
						<?php }}else{ ?>
						<tr>
							<td colspan="7">Tidak ada data</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer class="footer">
        <div class="container">
            <small>&copy; 2024 PSphere. All Rights Reserved.</small>
        </div>
    </footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
