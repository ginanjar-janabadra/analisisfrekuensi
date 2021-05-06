<?php
        $datah = $_POST["jml_data"];
        $payload = $_POST["datah"];

        //sum data yang di inputkan (sum Xi)
        for($i=0; $i < count($payload); $i++){
            $jumlah= array_sum($payload);
        }

        //menghitung nilai rata"
        $rata = $jumlah/$datah;

        // Program Menampilkan Data yang di inputkan sebagai berikut:
        for($x=0; $x < count($payload); $x++){
            $datanya = $payload[$x];
            // echo $datanya."<br>";
        }

        //program mengitung Px v
        for($i=0; $i < count($payload); $i++){
            $Px= $payload[$i]/($datah-1);
            // echo number_format(round((float)$Px,2),3)."<br>";
        }

        //program menghitung P(x<) v
        for($Px=0; $xi < count($payload); $Px++){
            $px= 1-$payload[$Px];
            // echo number_format(round((float)$px,2),3)."<br>";
        }

        //menghitung nilai SD v
        $SD3 = sqrt($rata/($datah-1));

        //program menghitung f(t) v
        for($xi=0; $xi < count($payload); $xi++){
            $ft= ($payload[$xi]-$rata)/$SD3;
            // echo number_format(round((float)$ft,2),3)."<br>";
        }

        //program menghitung p'(x) v
        for($i=0; $i < count($payload); $i++){
            $px1= $payload[$i]/($datah-1);
            // echo number_format(round((float)$px1,2),3)."<br>";
        }

        //menghitung nilai p'(x<) v
        for($px1=0; $px1<count($payload); $px1++){
            $px2= 1-$payload[$px1];
        }

        //menghitung nilai D v
        for($px2=0; $px2<count($payload); $px2++)
        for($px=0; $px<count($payload); $px++){
            $D= $payload[$px2]-$payload[$px];
        }

        
?>
        <!-- pemanggilan di pilihDstr -->
          <table id="example3" class="table table-bordered table-hover">
          <div class="col-md-2">
            <div class="card">
              
              <!-- /.card-header -->
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th>Xi</th> -->
                    <th>Xi</th>
                    <!-- <th>(Xi-X)^2</th> -->
                    <!-- <th>(Xi-X)^3</th> -->
                    <!-- <th>(Xi-X)^4</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                        if (is_array($payload) || is_object($payload))
                        {
                            foreach ($payload as $value)
                            {
                              echo "<tr><td>$value</td></tr>";
                            }
                        } 
                      ?>
                    </tr>                         
                  </tbody>
                  <tr>
                    <th><?php echo number_format(round((float)$jumlah,2),3); ?></th>

                  </tr>
                  </tfoot>
                </table>  
              </div>
            </div>
            </div>

            <div class="col-md-2">
            <div class="card">
              
              <!-- /.card-header -->
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th>Xi</th> -->
                    <th>M</th>
                    <!-- <th>(Xi-X)^2</th> -->
                    <!-- <th>(Xi-X)^3</th> -->
                    <!-- <th>(Xi-X)^4</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                        if (is_array($payload) || is_object($payload))
                        {
                            foreach ($payload as $datah)
                            {
                              echo "<tr><td>$datah</td></tr>";
                            }
                        } 
                      ?>
                    </tr>                         
                  </tbody>
                </table>  
              </div>
            </div>
            </div>


                </table>
              

