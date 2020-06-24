
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
{
$emel_pentadbir=$_POST['emel_pentadbir'];
$katalaluan_pentadbir=$_POST['katalaluan_pentadbir'];
$sql ="SELECT emel_pentadbir,katalaluan_pentadbir FROM admin WHERE emel_pentadbir=:emel_pentadbir and katalaluan_pentadbir=:katalaluan_pentadbir";
$query= $dbh -> prepare($sql);
$query-> bindParam(':emel_pentadbir', $emel_pentadbir, PDO::PARAM_STR);
$query-> bindParam(':katalaluan_pentadbir', $katalaluan_pentadbir, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['emel_pentadbir'];
echo "<script type='text/javascript'> document.location = 'senarai-pinjam.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

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
	.login-form {
		width: 500px;
    	margin: auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background:  #FFE4B5;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>

</head>
<body>
<div class="container">
    		<p><center><h1>Sistem Perpustakaan | Admin</h1></center></p>

	<div class="row">
		<div class="col-xs-12">
			<div class="login-form">
       <form method="post">
        <h2 class="text-center">Log Masuk</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="emel_pentadbir" placeholder="E-mel Pengguna" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="katalaluan_pentadbir" placeholder="Kata Laluan" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="login">Log Masuk</button>
        </div>     
    </form>
</div>
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