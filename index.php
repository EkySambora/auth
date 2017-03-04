<?php
ob_start();
include_once "function/config.php";
include_once "function/delete.php";

// simpan data
if(isset($_POST["simpan"])){
  $paket = $_POST["paket"];
  if(!empty(trim($paket))){
    mysqli_query($link, "INSERT INTO paket VALUES ('','$paket')");
    header("location:index.php");
  }
}

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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
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
              <input name="paket" type="text" class="form-control" id="exampleInputEmail1">
            </div>
             <div class="form-group">
               <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary" name="simpan" required>Simpan</button>
            <button type="reset" class="btn btn-warning" name="batal">Batal</button>

          </form>

          <form action="upload.php" method="post" enctype="multipart/form-data">
              Select image to upload:
              <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="submit" value="Upload Image" name="submit">
          </form>

          <h3 class="text-left">Data Paket</h3>

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <tr class="info lebar" >
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
                  <a href="function/update.php?update=<?php echo $row["id"]; ?>" class="btn btn-primary">Update</a>
                  <a href="function/delete.php?delete=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
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
