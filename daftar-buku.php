<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$empid=$_SESSION['eid'];
$nama_buku=$_POST['nama_buku'];
$kod_buku=$_POST['kod_buku'];   
$penerbit_buku=$_POST['penerbit_buku'];   
$pengarang_buku=$_POST['pengarang_buku'];   

$sql="INSERT INTO tblbuku(nama_buku,kod_buku,penerbit_buku,pengarang_buku, empid) VALUES(:nama_buku,:kod_buku,:penerbit_buku,:pengarang_buku, :empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':nama_buku',$nama_buku,PDO::PARAM_STR);
$query->bindParam(':kod_buku',$kod_buku,PDO::PARAM_STR);
$query->bindParam(':penerbit_buku',$penerbit_buku,PDO::PARAM_STR);
$query->bindParam(':pengarang_buku',$pengarang_buku,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Daftar Buku Berjaya";
}
else 
{
$error="Sesuatu Berlaku... Cuba Lagi Kemudian";
}

}

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
    		<h1><center>Tambah Buku</center></h1>

	<div class="row">
          <?php if($error){?><div class="errorWrap"><strong>Gagal </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>Berjaya</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                       <form method="post">
                          <fieldset>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Nama Buku</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="nama_buku" name="nama_buku" class="form-control" required="true" value="<?php echo htmlentities($result->nama_buku);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Kod Buku</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="kod_buku" name="kod_buku" class="form-control" required="true" value="<?php echo htmlentities($result->kod_buku);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Penerbit Buku</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="penerbit_buku" name="penerbit_buku" class="form-control" required="true" value="<?php echo htmlentities($result->penerbit_buku);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Pengarang Buku</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="pengarang_buku" name="pengarang_buku" class="form-control" required="true" value="<?php echo htmlentities($result->pengarang_buku);?>" type="text"></span></div>
                                </div>
                             </div>
                          </fieldset>
                           <center><button class="btn btn-primary" type="submit" name="add">Tambah</button><a href='senarai-pinjam.php' class='btn btn-danger'>Balik</a></center>

                        </form>
                    </td>
                  </tr>
              </tbody>
           </table>
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
<?php }?> 