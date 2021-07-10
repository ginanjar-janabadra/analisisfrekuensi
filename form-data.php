<?php
function validasiAngka(){
	$input = $_POST["j_data"];
	$var = "/^[0-9]*$/";
	if (!preg_match($var, $input)) {
		echo "
		<script>
			alert('Data tidak sesuai ketentuan, Hanya menerima inputan angka');
			document.location.href='index.php';
		</script>
		";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Analisis Frekuensi Curah Hujan</title>
  <link rel="icon" type="img/jpg" href="img/g.png">
  <meta name="description" content="Website analisis frekuensi curah hujan ini dibuat untuk mempermudah perhitungan."/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="core/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="core/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="core/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body class="login-page" style="height: auto">

<br><br><br>
<img src="/img/Universitas-Janabadra.png" width="265" height="100" alt="Universitas Janabadra">


<div class="login-box">
  <div class="login-logo">
    <p><h5>Form Input Data</h5></p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukkan jumlah data Anda!</p>

      <form action="" method="post">
        <div style="text-align: center">
                <label for="">Jumlah Data (n):</label>
        </div>
		<?php if (isset($_POST["submit"])) : ?>
        <div class="input-group mb-3" style="text-align: center">
		    <?php $btnReset = true; ?>
                <input style="text-align: center" class="form-control"  min="15" value="<?= $_POST["j_data"]; ?>" type="number" id="j_data" name="j_data" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            <?php else : ?>
                <input style="text-align: center" class="form-control" min="15" placeholder="Minimum 15 (tahun)" type="number" id="j_data" name="j_data" required s onkeypress="return event.charCode >= 48 && event.charCode <= 57">
            <?php endif ?>
            
        </div>
       
        <div class="row">
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">Submit</button>
          </div>
          <div class="col-6">
            <a href="form-data.php" class="btn btn-danger btn-block" >Reset</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

        <?php if (isset($_POST["submit"])) : ?>
            <?php validasiAngka(); ?>
            <div class="container" style="text-align: center">
            <br>
            <form action="analisisfrekuensi.php" method="post">
          
            <p class="login-box-msg">=====================<br>
            Urutkan data Anda <br>
            dari yang terkecil ke terbesar.<br>
            =====================</p>


                <?php for ($i=1; $i<= $_POST["j_data"]; $i++) :?>
                    <div class="input-group mb-1">
                            <div class="form-group" style="width: 275px;">
                            <label for="nama<?= $i; ?>">Data Hujan/Debit <?= $i; ?> </label><br>
                            <input style="text-align: center" class="form-control" min="0" type="float" id="datah<?= $i; ?>" name="datah[]" placeholder="Gunakan (.) untuk desimal" required>
                            <input class="form-control" type="number" id="jml_alat" name="jml_data" value="<?= $_POST["j_data"]; ?>" hidden="hidden">
                        </div>
                    </div>
                <?php endfor ?>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="footer">
                <button type="submit" id="enter" name="enter" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="clear"></div>
            </div>
            <?php endif ?>
                <div class="clear"></div>
                    
      


      <!-- <p class="mt-3 mb-1">
        <a href="#"></a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- Footer -->
<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020 Ginanjar Dwi Prasetyo | Teknik Sipil</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

<!-- jQuery -->
<script src="core/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="core/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="core/dist/js/adminlte.min.js"></script>

</body>
</html>
