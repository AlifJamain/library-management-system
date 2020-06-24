<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
                <?php include "includes/header.php"; ?>

<style type="text/css">
body{
    	padding-top: 30px;
        background-color: #FFDAB9;
    }
</style>
</head>
    
<body>
<div class="container">
            		<h1><center>Laporan</center></h1>

	<div class="row">
		<div class="col-xs-3">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-3">
            <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title"><center>Jumlah Pinjaman</center></h3>
    <h2 class="card-text">
      <?php
$sql = "SELECT id from tblpinjaman";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$pinjaman=$query->rowCount();
?>
      <center><?php echo htmlentities($pinjaman);?></center>
      </h2>
    <center><a href="senarai-pinjam.php" class="btn btn-primary">Papar Senarai Pinjaman</a></center>
  </div>
</div>
            
		</div>
        <div class="col-xs-3">
            <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title"><center>Jumlah Pengawas</center></h3>
    <h2 class="card-text">
      <?php
$sql = "SELECT id from tblpengguna";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$pengawas=$query->rowCount();
?>
      <center><?php echo htmlentities($pengawas);?></center>
      </h2>
    <center><a href="urus-pengguna.php" class="btn btn-primary">Papar Senarai Pengawas</a></center>
  </div>
</div>
            
		</div>
        <div class="col-xs-3">
            <div class="card" style="width: 18rem;">
  <div class="card-body">
      <h3 class="card-title"><center>Jumlah <br>Buku</center></h3>
    <h2 class="card-text">
      <?php
$sql = "SELECT id from tblbuku";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$buku=$query->rowCount();
?>
      <center><?php echo htmlentities($buku);?></center>
      </h2>
    <center><a href="urus-buku.php" class="btn btn-primary">Papar Senarai Buku</a></center>
  </div>
</div>
            
		</div>
        <div class="col-xs-4">
            
		</div>
        <div class="col-xs-8">
		</div>
	</div>
    
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
                <?php include "includes/footer.php"; ?>
			</footer>
		</div>
	</div>
</div>
</body>
</html>  
<?php } ?>