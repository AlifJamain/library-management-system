<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=$_SESSION['emplogin'];
if(isset($_POST['update']))
{ 
$did=intval($_GET['stdid']);
$tarikh_pulang=$_POST['tarikh_pulang'];  
$sql="update tblpinjaman set tarikh_pulang=:tarikh_pulang where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':tarikh_pulang',$tarikh_pulang,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="Berjaya Dikemaskini";
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
        		<h1><center>Papar Pinjaman</center></h1>

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
<?php 
$lid=intval($_GET['stdid']);
$sql = "SELECT * from tblpinjaman where tblpinjaman.id=:lid";

//$sql = "SELECT pelajar.id as lid,guru.nama_guru, pelajar.nama_pelajar from pelajar join guru on pelajar.empid=guru.id where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>   
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="nama_pelajar" name="nama_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->nama_pelajar);?>" type="text"></span></div>
                                <label class="col-md-4 control-label">Kelas Pelajar</label>
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="kelas_pelajar" name="kelas_pelajar" class="form-control" required="true" value="<?php echo htmlentities($result->kelas_pelajar);?>" type="text"></span></div>
                                <label class="col-md-4 control-label">Nama Buku</label>
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="nama_buku" name="nama_buku" class="form-control" required="true" value="<?php echo htmlentities($result->nama_buku);?>" type="text"></span></div>
                                <label class="col-md-4 control-label">Tarikh Pinjam</label>
                                   <div class="input-group"><span class="input-group-addon"><input readonly id="tarikh_pinjam" name="tarikh_pinjam" class="form-control" required="true" value="<?php echo htmlentities($result->tarikh_pinjam);?>" type="text"></span></div>
                                <label class="col-md-4 control-label">Tarikh Pulang</label>
                                   <div class="input-group"><span class="input-group-addon"> <input class="date form-control" name="tarikh_pulang" type="text" value="<?php echo htmlentities($result->tarikh_pulang);?>">  
    <script type="text/javascript">  
        $('.date').datepicker({  
           format: 'mm-dd-yyyy'  
         });  
    </script>  </span></div>
                                  
                            <center><button class="btn btn-primary" type="submit" name="update">Kemaskini</button>&nbsp;<a href='pelajar-papar-pulang.php' class='btn btn-danger'>Balik</a></center>
                           <?php }}?>

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