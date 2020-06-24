<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
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

    fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
</style>
</head>
    
<body>
<div class="container">
        		<h1><center>Senarai Pinjaman</center></h1>
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
                                            <th width="15%">Tarikh Pulang</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                       <form method="post">
                           
<?php 
$eid=$_SESSION['eid'];
$sql = "SELECT * from tblpinjaman where empid=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
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
          <td><?php echo htmlentities($result->tarikh_pulang);?></td>
     <td><a href="pelajar-edit-pulang.php?stdid=<?php echo htmlentities($result->id);?>" class="btn btn-primary" >Papar</a></td>
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