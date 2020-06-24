<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
// code for Inactive  employee    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$Status=0;
$sql = "update tblpengguna set Status=:Status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':Status',$Status, PDO::PARAM_STR);
$query -> execute();
header('location:urus-pengguna.php');
}



//code for active employee
if(isset($_GET['id']))
{
$id=$_GET['id'];
$Status=1;
$sql = "update tblpengguna set Status=:Status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':Status',$Status, PDO::PARAM_STR);
$query -> execute();
header('location:urus-pengguna.php');
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
                		<h1><center>Urus Pengguna</center></h1>

	<div class="row">
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
			 <form method="post">
                                                           <?php if($error){?><div class="errorWrap"><strong>GAGAL</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>BERJAYA</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <table class="table table-striped">
              <tbody>
                 <tr>
                    <td colspan="1">
                          <fieldset>
<table class="table table-striped">                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Penuh</th>
                                            <th>Kelas</th>
                                            <th>Jawatan</th>
                                             <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT * from  tblpengguna";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                            <td> <?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->nama_pengguna);?></td>
                                            <td><?php echo htmlentities($result->kelas_pengguna);?></td>
                                            <td><?php echo htmlentities($result->jawatan_pengguna);?></td>

                                             <td><?php $stats=$result->Status;
if($stats){
                                             ?>
                                                 <a class="waves-effect waves-green btn-flat m-b-xs">Active</a>
                                                 <?php } else { ?>
                                                 <a class="waves-effect waves-red btn-flat m-b-xs">Inactive</a>
                                                 <?php } ?>


                                             </td>
                                            <td><a href="edit-pengguna.php?empid=<?php echo htmlentities($result->id);?>"><i class="glyphicon glyphicon-envelope"></i></a>
                                        <?php if($result->Status==1)
 {?>
<a href="urus-pengguna.php?inid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Admin Pasti Untuk InActive Pengguna?');"" > <i class="glyphicon glyphicon-remove" title="Inactive"></i>
<?php } else {?>

                                             <a href="urus-pengguna.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Admin Pasti Untuk Active Pengguna?');""><i class="glyphicon glyphicon-ok" title="Active"></i>
                                            <?php } ?> </td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                          </fieldset>
                    </td>
                     
                 </tr>
              </tbody>
           </table>
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
<?php } ?>