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
$nama_pelajar=$_POST['nama_pelajar'];
$kelas_pelajar=$_POST['kelas_pelajar']; 
$nama_buku=$_POST['nama_buku']; 
$tarikh_pinjam=$_POST['tarikh_pinjam'];  
$sql="INSERT INTO tblpinjaman(nama_pelajar,kelas_pelajar,nama_buku,tarikh_pinjam,empid) VALUES(:nama_pelajar, :kelas_pelajar, :nama_buku,:tarikh_pinjam, :empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':nama_pelajar',$nama_pelajar,PDO::PARAM_STR);
$query->bindParam(':kelas_pelajar',$kelas_pelajar,PDO::PARAM_STR);
$query->bindParam(':nama_buku',$nama_buku,PDO::PARAM_STR);
$query->bindParam(':tarikh_pinjam',$tarikh_pinjam,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Pinjaman Berjaya Ditambah";
}
else 
{
$error="Sesuatu Berlaku... Cuba Kemudian";
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
    		<h1><center>Tambah Pinjaman</center></h1>

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
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                   <div class="input-group"><span class="input-group-addon"><input id="nama_pelajar" name="nama_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->nama_pelajar);?>" type="text"></span></div>
                                <label class="col-md-4 control-label">Kelas Pelajar</label>
                                   <div class="input-group"><span class="input-group-addon"><input id="kelas_pelajar" name="kelas_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->kelas_pelajar);?>" type="text"></span></div>
                                <label class="col-md-4 control-label">Nama Buku</label>
                                   <div class="input-group"><span class="input-group-addon"><select  name="nama_buku" autocomplete="off">
<option value="<?php echo htmlentities($result->kod_buku." | ".$result->nama_buku);?>"><?php echo htmlentities($result->kod_buku." | ".$result->nama_buku);?></option>
<?php $sql = "SELECT * from tblbuku";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   ?>                                            
<option value="<?php echo htmlentities($resultt->kod_buku." | ".$resultt->nama_buku);?>"><?php echo htmlentities($resultt->kod_buku." | ".$resultt->nama_buku);?></option>
<?php }} ?>
</select></span></div>
                                                              <label class="col-md-4 control-label">Tarikh</label>
                                   <div class="input-group"><span class="input-group-addon"> <input class="date form-control" name="tarikh_pinjam" type="text">  
    <script type="text/javascript">  
        $('.date').datepicker({  
           format: 'mm-dd-yyyy'  
         });  
    </script>  </span></div>
                                  
                           <center><button class="btn btn-primary" type="submit" name="add">Tambah</button>&nbsp;<a href='pelajar-papar-pinjam.php' class='btn btn-danger'>Balik</a></center>
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