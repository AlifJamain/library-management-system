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
        		<h1><center>Senarai Pinjaman Dan Pemulangan</center></h1>

	<div class="row">
		<div class="col-xs-4">
            <?php include "includes/sidebar.php"; ?>
		</div>
		<div class="col-xs-8">
            <table id="example" class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="45%">Nama Pelajar</th>
                                            <th width="15%">Tarikh Pinjam</th>
                                            <th width="15%">Tarikh Pulang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                       <form method="post">
<?php 
$sql = "SELECT * from tblpinjaman";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>    
 <tr>
     <td><b><?php echo htmlentities($cnt);?></b></td>
      <td><?php echo htmlentities($result->nama_pelajar);?></td>
           <td><?php echo htmlentities($result->tarikh_pinjam);?></td>
      <td><?php echo htmlentities($result->tarikh_pulang);?></td>

</tr>
<?php $cnt++;} }?>
</tbody>
</table>
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
</div>
</body>
</html> 
<?php } ?>