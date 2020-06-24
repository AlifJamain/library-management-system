<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  tblbuku  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Department record deleted";

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
        		<h1><center>Urus Buku</center></h1>

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
                                            <th>Kod Buku</th>
                                            <th>Nama Buku</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT * from  tblbuku";
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
                                            <td><?php echo htmlentities($result->nama_buku);?></td>
                                            <td><?php echo htmlentities($result->kod_buku);?></td>
                                            <td><a href="edit-buku.php?deptid=<?php echo htmlentities($result->id);?>"><i class="glyphicon glyphicon-file"></i></a><a href="padam-buku.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you want to delete');"> <i class="glyphicon glyphicon-remove"></i></a></td>
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