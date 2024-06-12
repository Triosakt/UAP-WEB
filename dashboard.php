<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSphere</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		body {
			font-family: 'Quicksand', sans-serif;
		}
		.header {
			background-color: #343a40;
			padding: 15px 0;
		}
		.header h1 a {
			color: #fff;
			text-decoration: none;
		}
		.header .nav-link {
			color: #fff;
		}
		.dashboard-card {
			background: #f8f9fa;
			padding: 20px;
			border-radius: 10px;
			text-align: center;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}
		.dashboard-card img {
			width: 150px;
			height: 150px;
			object-fit: cover;
			margin-bottom: 20px;
		}
		.footer {
			background-color: #343a40;
			padding: 10px 0;
			color: #fff;
			text-align: center;
		}
		.box {
			background: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}
		.stats {
			display: flex;
			justify-content: space-between;
			margin-bottom: 20px;
		}
		.stats .stat {
			flex: 1;
			background: #f1f1f1;
			padding: 20px;
			border-radius: 10px;
			margin-right: 10px;
			text-align: center;
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}
		.stats .stat:last-child {
			margin-right: 0;
		}
		.activity-list {
			list-style-type: none;
			padding: 0;
		}
		.activity-list li {
			padding: 10px;
			border-bottom: 1px solid #ddd;
		}
		.activity-list li:last-child {
			border-bottom: none;
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
	
				<li class="nav-item"><a href="data-kategori.php" class="nav-link">Data Kategori</a></li>
				<li class="nav-item"><a href="data-produk.php" class="nav-link">Data Produk</a></li>
				<li class="nav-item"><a href="data-sewa.php" class="nav-link">Data Sewa</a></li>
				<li class="nav-item"><a href="keluar.php" class="nav-link">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section my-5">
		<div class="container">
			<h3 class="mb-4">Dashboard</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="dashboard-card">
						<?php if($d->gambar): ?>
							<img src="uploads/<?php echo $d->gambar ?>" class="rounded-circle" alt="User Image">
						<?php else: ?>
							<img src="https://via.placeholder.com/150" class="rounded-circle" alt="User Image">
						<?php endif; ?>
						<h4><?php echo $_SESSION['a_global']->admin_name ?></h4>
						<p>Selamat Datang di PSphere</p>
						<a href="profil.php" class="btn btn-primary">Edit Profile</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="box">
						<h4>Overview</h4>
						<p>Here is an overview of your activity.</p>
						<div class="stats">
							<div class="stat">
								<h5>Products</h5>
								<p>120</p>
							</div>
							<div class="stat">
								<h5>Categories</h5>
								<p>10</p>
							</div>
							<div class="stat">
								<h5>Orders</h5>
								<p>50</p>
							</div>
						</div>
						<h5>Recent Activity</h5>
						<ul class="activity-list">
							<li>Product "X" updated</li>
							<li>Category "Y" added</li>
							<li>Order #123 processed</li>
							<li>Product "Z" out of stock</li>
							<li>New customer registered</li>
						</ul>
						<!-- Add more content or graphs here if needed -->
					</div>
				</div>
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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
