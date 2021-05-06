<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Ini adalah Laman Persembahan">
  <meta name="author" content="Ginanjar">

  <?php 
  $ceknama = $_POST["namamu"]; 
  if( $ceknama == ":rahmawati1209_") {
    $ceknama = "Rahmawati";
  } if( $ceknama == "_fivin13*") {
    $ceknama = "Fivinnnnnn";
  }
  ?>
  <title> Terimakasih <?php echo $ceknama; ?> </title>
  <link rel="icon" type="img/jpg" href="img/g.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Logo Website -->
          <nav class="navbar navbar-light">

            <a class="navbar-brand" href="/">
              <img src="/img/g.png" width="23" height="23" alt="">
            </a>

            <div class="topbar-divider d-none d-sm-block"></div>

            <div class="navbar-nav-scroll">
              <ul class="navbar-nav bd-navbar-nav flex-row">
              <li class="nav-item">
                <a class="nav-link " href="/"><b>Home</b></a>
              </li>
            <!--  <li class="nav-item">                  
                <a class="nav-link active" href="/teori.php"><b>Teori</b></a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link " href="/tentang.php"><b>Tentang</b></a>
              </li>

              </ul>
            </div>

          </nav>

          <!-- Menubar Website -->
          
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <h1 class="h3 mb-2 text-gray-800">Laman Persembahan</h1>
                <p class="mb-4">Sukses dan semoga dipermudah pula urusanmu :))</a></p>

                <div class="text-center">
                <img src="/img/sipil16.png" width="70%" height="70%" alt="Universitas Janabadra">
                </div>
                <br>

                <!-- Tentang Text -->
          <div class="text-center">
            
            <div class="card col-sm shadow mb-5">
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <td colspan="1">
                  <h4 class="h4 mb-2 text-gray-800">
                  <i><?php echo "Terimakasih "; echo $ceknama; ?></i>
                  </h4>
                  
                  </div>
                  </td>
                  </tr>
                  </thead>

                  <tbody>
                  <tr>
                  <td>
 
                  <script language="JavaScript" src="controller/kata.js"></script>
                  
                  </tr>
                  </td>

                  <tr>
                  <td>

                  <?php 
                  $namamu = $_POST["namamu"];

                  if( $namamu == ":rahmawati1209_") {
                  ?>
                    <!-- Button trigger modal -->
                    <form action="rhmww_1HKRxMPqSQ_zDA_B.php" method="post">
                    <button type="submit" class="btn btn-danger">
                      Hanya <?php echo $ceknama; ?> yang dapat lihat ini, aku mau crita neeh >>
                    </button>
                    </form>
                    <i>====== sst! secret ya =====</i>
                  <?php
                  
                  } if( $namamu == "_fivin13*") {
                  ?>
                    <!-- Button trigger modal -->
                    <form action="fvn_aRFinIIwrtMa_Okldw86g321nsC.php" method="post">
                    <button type="submit" class="btn btn-danger">
                      Hanya <?php echo $ceknama; ?> yang dapat lihat ini, sini vin >>
                    </button>
                    </form>
                    <i>=== rahasia nih ===</i>
                  <?php
                  
                  } else {
                  ?>
                    <!-- Tabel -->
                  
                  <?php
                  }
                  ?>

                  </tr>
                  </td>
                  </tbody>
                  
            </table>
            </div>
            </div>
            </div>

          </div>

        </div>
        
        <!-- /.container-fluid -->

        </div>
        </div>
        </div>
          

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ginanjar Dwi Prasetyo 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
