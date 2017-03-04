<?php
ob_start();
include_once "config.php";
include_once "delete.php";

// update
if(isset($_POST["ubah"])){
  $paket = $_POST["paket"];
  $_id   = $_POST["id"];
  if(!empty(trim($paket))){
    mysqli_query($link, "UPDATE paket SET nama_paket ='$paket' WHERE id='$_id' ");
    header("location:../index.php");
  }
}

//tampil data pada form
$_id = $_GET["update"];
$edit = mysqli_query($link, "SELECT * FROM paket WHERE id = '$_id' ");

if(mysqli_num_rows($edit)==0) header("location:../index.php");

$row_edit = mysqli_fetch_array($edit);


// tampil data
$sql = mysqli_query($link, "SELECT * FROM paket");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>administrator</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3 class="text-left">Input Data</h3>
          <form class="form-inline"action="" method="post">
            <div class="form-group">
              <input name="paket" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row_edit["nama_paket"] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            <button type="reset" class="btn btn-warning" name="batal">Batal</button>
            <input type="hidden" name="id" value="<?php echo $row_edit["id"] ?>">
          </form>

          <h3 class="text-left">Data Paket</h3>

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <tr class="info">
                <th>No</th>
                <th>ID</th>
                <th>Nama Paket</th>
                <th>Action</th>
              </tr>
            <?php if(mysqli_num_rows($sql)>0){ ?>
              <?php $no=1; ?>
              <?php while($row = mysqli_fetch_array($sql)){ ?>

              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["nama_paket"]; ?></td>
                <td>
                  <a href="update.php?update=<?php echo $row["id"]; ?>" class="btn btn-primary">Update</a>
                  <a href="delete.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              <?php $no++; ?>
              <?php } ?>
            <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php

mysqli_close($link);
ob_end_flush();
 ?>
