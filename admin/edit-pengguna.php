<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=intval($_GET['empid']);
if(isset($_POST['update']))
{

$nama_pengguna=$_POST['nama_pengguna'];
$kelas_pengguna=$_POST['kelas_pengguna']; 
$jawatan_pengguna=$_POST['jawatan_pengguna']; 
$sql="update tblpengguna set nama_pengguna=:nama_pengguna,kelas_pengguna=:kelas_pengguna,jawatan_pengguna=:jawatan_pengguna where id=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':nama_pengguna',$nama_pengguna,PDO::PARAM_STR);
$query->bindParam(':kelas_pengguna',$kelas_pengguna,PDO::PARAM_STR);
$query->bindParam(':jawatan_pengguna',$jawatan_pengguna,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
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
            		<h1><center>Edit Pengguna</center></h1>

	<div class="row">
                  <?php if($error){?><div class="errorWrap"><strong>Gagal </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>Berjaya</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
            <form method="post">
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                           <?php 
$eid=intval($_GET['empid']);
$sql = "SELECT * from  tblpengguna where id=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input  id="nama_pengguna" name="nama_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->nama_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Kelas Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input  id="kelas_pengguna" name="kelas_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->kelas_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Jawatan Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="jawatan_pengguna" name="jawatan_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->jawatan_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                    </td>
                 </tr>
              </tbody>
           </table>
                                        <?php }}?>                                        

<center>                <button class="btn btn-primary" type="submit" name="update">Kemaskini</button>&nbsp;<a href='urus-pengguna.php' class='btn btn-danger'>Balik</a> 
</center>
            </form>
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