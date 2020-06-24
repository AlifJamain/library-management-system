<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$nama_pengguna=$_POST['nama_pengguna'];
$kelas_pengguna=$_POST['kelas_pengguna'];   
$jawatan_pengguna=$_POST['jawatan_pengguna']; 
$katalaluan_pengguna=$_POST['katalaluan_pengguna']; 
$emel_pengguna=$_POST['emel_pengguna']; 
$Status=1;

$sql="INSERT INTO tblpengguna(emel_pengguna,katalaluan_pengguna,nama_pengguna,kelas_pengguna,jawatan_pengguna,Status) VALUES(:emel_pengguna,:katalaluan_pengguna,:nama_pengguna,:kelas_pengguna,:jawatan_pengguna, :Status)";
$query = $dbh->prepare($sql);
$query->bindParam(':emel_pengguna',$emel_pengguna,PDO::PARAM_STR);
$query->bindParam(':katalaluan_pengguna',$katalaluan_pengguna,PDO::PARAM_STR);
$query->bindParam(':nama_pengguna',$nama_pengguna,PDO::PARAM_STR);
$query->bindParam(':kelas_pengguna',$kelas_pengguna,PDO::PARAM_STR);
$query->bindParam(':jawatan_pengguna',$jawatan_pengguna,PDO::PARAM_STR);
$query->bindParam(':Status',$Status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Daftar Pengguna Berjaya";
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
    		<h1><center>Tambah Pengguna</center></h1>

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
                             <div class="form-group">
                                <label class="col-md-4 control-label">Nama Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="nama_pengguna" name="nama_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->nama_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Kelas Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="kelas_pengguna" name="kelas_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->kelas_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Jawatan Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="jawatan_pengguna" name="jawatan_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->jawatan_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Emel Pelajar</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="emel_pengguna" name="emel_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->emel_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Kata Laluan</label>
                                <div class="col-md-8 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><input id="katalaluan_pengguna" name="katalaluan_pengguna" class="form-control" required="true" value="<?php echo htmlentities($result->katalaluan_pengguna);?>" type="text"></span></div>
                                </div>
                             </div>
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