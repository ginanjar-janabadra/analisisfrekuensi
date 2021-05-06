
<?php
require 'vendor/autoload.php';


        $datah = $_POST["jml_data"];
        $payload = $_POST["datah"];

        //sum data yang di inputkan (sum Xi)
        for($i=0; $i < count($payload); $i++){
            $jumlah= array_sum($payload);
        }

        // menghitung nilai log xi
        for($x=0; $x < count($payload); $x++){
          $logxi2 = log($payload[$x]);
          //echo number_format(round((float)$logxi2,4),4)."<br>";
        }        

        //menghitung nilai sum log xi
        for($sumlog=0; $sumlog<count($payload); $sumlog++){
          $sumlogx[]= log($payload[$sumlog]);
        }
        $sumlogxi= array_sum($sumlogx);
        //echo number_format(round((float)$sumlogxi,4),4)."<br>";

        //menghitung nilai rata Log Xi"
        $rata2 = $sumlogxi/$datah;
        //echo $rata2. "<br>";

                //program mengitung Log Xi- Log X
        for($xi=0; $xi < count($payload); $xi++){
            $logxix= log($payload[$xi])-$rata2;
            //echo number_format(round((float)$logxix,4),4)."<br>";
        }

        //menghitung nilai sum log xi - log x
        for($xi=0; $xi<count($payload); $xi++){
          $sumlogx1[]= log($payload[$xi])-$rata2;
        }
        $sumlogxix= array_sum($sumlogx1);
        //echo number_format(round((float)$sumlogxix,4),4)."<br>";

        //program mengitung (Log Xi- Log X)^2
        for($xi=0; $xi < count($payload); $xi++){
          $logxix2= pow((log($payload[$xi])-$rata2),2);
         //echo $logxix2."<br>";
      }

        //menghitung nilai sum (log xi - log x)^2
        for($xi=0; $xi<count($payload); $xi++){
          $sumlogx2[]= pow((log($payload[$xi])-$rata2),2);
        }
        $sumlogxix2= array_sum($sumlogx2);
        //echo number_format(round((float)$sumlogxix2,4),4)."<br>";

        //program mengitung (Log Xi- Log X)^3
        for($xi=0; $xi < count($payload); $xi++){
          $logxix3= pow((log($payload[$xi])-$rata2),3);
          //echo $logxix3."<br>";
      }

        //menghitung nilai sum (log xi - log x)^3
        for($xi=0; $xi<count($payload); $xi++){
          $sumlogx3[]= pow((log($payload[$xi])-$rata2),3);
        }
        $sumlogxix3= array_sum($sumlogx3);
        //echo number_format(round((float)$sumlogxix3,4),4)."<br>";

        //program mengitung (Log Xi- Log X)^4
        for($xi=0; $xi < count($payload); $xi++){
          $logxix4= pow((log($payload[$xi])-$rata2),4);
          //echo $logxix3."<br>";
      }

        //menghitung nilai sum (log xi - log x)^4
        for($xi=0; $xi<count($payload); $xi++){
          $sumlogx4[]= pow((log($payload[$xi])-$rata2),4);
        }
        $sumlogxix4= array_sum($sumlogx4);

        //program mengitung p X
        for($xi=0; $xi < count($payload); $xi++){
          $logxix3= pow((log($payload[$xi])-$rata2),3);
          //echo $logxix3."<br>";
      }

        //program mengitung Sd
          $Sd2= sqrt($sumlogxix2/($datah-1));
        //echo number_format(round((float)$Sd2,4),4)."<br>";

        //mencari nilai CS
        $pSd = pow($Sd2,3);
        //part mencari CS 
        $Cs2 = $datah*($sumlogxix3/(($datah-1)*($datah-2)*$pSd));
        //echo number_format(round((float)$Cs2,4),4)."<br>";

        //mencari nilai Ck
        $pemSd2 = pow($Sd2,4);    
        $pemn = pow(($datah-1),2);
        //$ck = ((pow($datah,2))*($sumxix4/(($datah-1)*($datah-2)*$pemSD)));
        $ck2 =(($datah*($datah+1))/(($datah-1)*($datah-2)*($datah-3))*($sumlogxix4/$pemSd2))-((3*$pemn)/(($datah-2)*($datah-3)));
        
    
    //mencari nilai Cv
        $cv2 = $Sd2/$rata2;

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log Person</title>
</head>
<body>
  

<!-- pemanggilan di pilihDstr -->      

  <div class="container">
  <div class="row">
  <div class="col-sm">

     <div class="card shadow mb-4">
      <div class="card-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped" style="font-size: 90%">
       <tr><tr>
       
          
<td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Log Xi</th>

                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                        if (is_array($sumlogx) || is_object($sumlogx)){                     
                        }    foreach ($sumlogx as $clogxi){
                            echo "<tr><td>";  echo number_format(round((float)$clogxi,4),4); echo "</tr></td>";
                        }
                        
                  ?>
                  </tr> 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumlogxi,4),4); ?></th>
                  </tr>
                  </tfoot>
                </table>
                </div>
            </div>
          </div>
        </div>
</td>

<td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Log Xi - Log X</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                        if (is_array($sumlogx1) || is_object($sumlogx1)){
                        }    foreach ($sumlogx1 as $csumlogx1){
                            echo "<tr><td>";  echo number_format(round((float)$csumlogx1,4),4); echo "</tr></td>";
                        }                        
                        
                  ?>
                  </tr> 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumlogxix,4),4); ?></th>
                  </tr>
                  </tfoot>
                </table>
                </div>
            </div>
          </div>
        </div>
</td>

<td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Log Xi - Log X)<sup>2</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                        if (is_array($sumlogx2) || is_object($sumlogx2)){                         
                        }    foreach ($sumlogx2 as $csumlogx2){   
                            echo "<tr><td>";  echo number_format(round((float)$csumlogx2,4),4); echo "</tr></td>";
                        }

                        
                  ?>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumlogxix2,4),4); ?></th>
                  </tr>
                  </tfoot>
                </table>
                </div>
            </div>
           </div>
        </div>
</td>

<td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Log Xi - Log X)<sup>3</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                        if (is_array($sumlogx3) || is_object($sumlogx3)){                          
                        }    foreach ($sumlogx3 as $csumlogx3){
                            echo "<tr><td>";  echo number_format(round((float)$csumlogx3,4),4); echo "</tr></td>";                      
                        }
                        
                  ?>
                  </tr> 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumlogxix3,4),4); ?></th>
                  </tr>
                  </tfoot>
                </table>
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      </td>

      <td>


        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Log Xi - Log X)<sup>4</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                    <tr>
                    <?php
                        if (is_array($sumlogx4) || is_object($sumlogx4)){                          
                        }    foreach ($sumlogx4 as $csumlogx4){
                            echo "<tr><td>";  echo number_format(round((float)$csumlogx4,4),4); echo "</tr></td>";                      
                        }
                        
                  ?>
                  </tr> 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumlogxix4,4),4); ?></th>
                  </tr>
                  </tfoot>
                </table>
                </div>
            </div>
           </div>
        </div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>



      <div class="container">
        <div class="row">
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="font-size: 90%">
                  <thead>
                  <tr>
                    <th style="vertical-align : middle; text-align:center">Jumlah Data (n)</th>
                    <th style="vertical-align : middle; text-align:center">Rata Rata Log Xi</th>
                    <th style="vertical-align : middle; text-align:center">Nilai SD</th>
                    <th style="vertical-align : middle; text-align:center">Nilai Cs</th>
                    <th style="vertical-align : middle; text-align:center">Nilai Ck</th>
                    <th style="vertical-align : middle; text-align:center">Nilai Cv</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td style="text-align:center"> <?php echo $datah; ?> </td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$rata2,4),4); ?> </td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$Sd2,4),4); ?></td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$Cs2,4),4); ?></td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$ck2,4),4); ?></td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$cv2,4),4); ?></td>
                  </tr>
                  </tbody>
          </table>
          </div>
          </div>
        </div>   
      </div>
      </div>
      </div>

      <div class="container">
      <div class="row">
       <div class="col-sm">
        <div class="card col-md-20 shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped" style="font-size: 90%">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Pilih Distribusi</th>
                      <th style="text-align:center">Parameter Statistik</th>
                      <th style="text-align:center">Hasil Perhitungan</th>
                      <th style="text-align:center">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="text-align:center">Normal</td>
                      <td><?php if($cs>-1 && $cs<1){
                          $normalcs = "OK";
                        }else{
                          $normalcs = "TIDAK OK";
                        } 
                        echo "Cs ≈ 0";
                        echo "<p></p>";
                        echo "Ck ≈ 3";
                        ?>
                        
                      </td>
                      <td>
                        <?php if($ck>2 && $ck<4){
                          $normalck = "OK";
                        }else{
                          $normalck = "TIDAK OK";
                        } 
                          echo "Cs = "; echo number_format(round((float)$cs,4),4);
                          echo "<p></p>";
                          echo "Ck = "; echo number_format(round((float)$ck,4),4);
                        ?>
                      </td>
                      <td>
                        <?php
                          if($normalcs && $normalck == "OK"){
                            $normalket = "<b>Memenuhi</b>";
                          }else{
                            $normalket = "Tidak Memenuhi";
                          }
                          echo $normalket;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align:center">Log Normal</td>
                      <td>
                        <?php
                          $misx = (pow($cv,3))+(3*$cv);
                          if($Cs2 == $misx){
                            $logncs = "OK";
                          }else{
                            $logncs =  "TIDAK OK";
                          }
                          $misa = (pow($cv,8))+(6*(pow($cv,6)))+(15*(pow($cv,4)))+(16*(pow($cv,2)))+3;
                          if($ck2 == $misx){
                            $lognck = "OK";
                          }else{
                            $lognck = "TIDAK OK";
                          }
                          echo "Cs = Cv<sup>3</sup> + 3 Cv = ";
                          echo number_format(round((float)$misx,4),4);
                          echo "<p></p>";
                          echo "Ck = Cv<sup>8</sup> + 6 Cv<sup>6</sup> + 15 Cv<sup>4</sup> + 16 Cv<sup>2</sup> + 3 = ";
                          echo number_format(round((float)$misa,4),4);

                        ?>                        
                      </td>
                      <td>
                        <?php
                          

                          echo "Cs = ";
                          echo number_format(round((float)$Cs2,4),4);

                          echo "<p></p>";
                          echo "Ck = ";
                          echo number_format(round((float)$ck2,4),4);
                        ?>
                      </td>
                      <td>
                        <?php
                          if($logncs && $lognck == "OK"){
                            $lognket = "<b>Memenuhi</b>";
                          }else{
                            $lognket = "Tidak Memenuhi";
                          }
                          echo $lognket;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align:center">Gumbel</td>
                      <td>
                          <?php
                            if($cs==1.1396){
                              $gumbelcs = "OK";
                            }else{
                              $gumbelcs ="TIDAK OK";
                            }
                            echo "Cs = 1,1396";
                            echo "<p></p>";
                            echo "Ck = 5,4002";
                          ?>
                      </td>
                      <td>
                        <?php
                            if($ck==5.4002){
                              $gumbelck =  "OK";
                            }else{
                              $gumbelck = "TIDAK OK";
                            }
                            echo "Cs = "; echo number_format(round((float)$cs,4),4);
                            echo "<p></p>";
                            echo "Ck = "; echo number_format(round((float)$ck,4),4);
                          ?>
                      </td>
                      <td>
                        <?php
                          if($gumbelcs && $gumbelck == "OK"){
                            $gumbelket = "<b>Memenuhi</b>";
                          }else{
                            $gumbelket = "Tidak Memenuhi";
                          }
                          echo $gumbelket;
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align:center">Log Person tipe III</td>
                      <td colspan="2">Selain nilai di atas</td>
                     
                      <td>
                          <?php
                            if($normalket && $lognket && $gumbelket == "Tidak Memenuhi"){
                              $logn3ket = "<b>Memenuhi</b>";
                            }else{
                              $logn3ket = "Tidak Memenuhi";
                            }
                            echo $logn3ket;
                          ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
        </div>
      </div>
     </div>

<?php

$rowmin[0] = min($payload);
$rowmax[0] = max($payload);
$minxi = min($payload);
$maxxi = max($payload);
$panjangkelas= round(1+3.322*log10($datah),0);
$ef = $datah/$panjangkelas;
$lebarkelas= ($maxxi-$minxi)/$panjangkelas;

?>

<!-- Chi Kuadrat -->
<!-- DISTRIBUSI NORMAL ===================== -->

<br></br>
<div class="container">
  <div class="row">
  <div class="col-sm">

  <div class="container">
            <div class="row">
              <div class="col-sm">
                <h1 class="h3 mb-2 text-gray-800">Uji Chi Kuadrat</h1>
                <p class="mb-4"><b>Derajad Signifikaan = 5%</b></a>.</p>
                <br>
                <p class="mb-4"><b>1. Distribusi Normal</b></a>.</p>
                </div>
              </div>
            </div>

      <div class="card shadow mb-4">
      <div class="card-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped" style="font-size: 100%" >
       <tr><tr>
       <td>

        <div class="col-sm">
        <div class="card shadow md-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">P(x ≤ Xm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                    
                  <tr>
                  <?php

                  echo "<tr><td>"; echo "0 < P ≤ 0.2"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.2 < P ≤ 0.4"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.4 < P ≤ 0.6"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.6 < P ≤ 0.8"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.8 < P ≤ 0.999"; echo "</td></td>";

                  ?>
                  </tr>
                   
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
</td>



<td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                    <tr>
                    <?php

                      for ($ty=1; $ty <= $panjangkelas; $ty++){
                      
                      echo "<tr><td>";
                      echo number_format(round((float)$ef,4),4);
                      echo "</td></td>";
                    }    

                  ?>
                   </tr>
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
</td>            


<td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">p (mm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                    <?php
                    /// N O R M A L   D I S T R I B U S I   F O R   C H I S Q U A R E

                    /// Original C++ implementation found at http://www.wilmott.com/messageview.cfm?catid=10&threadid=38771
                    /// C# implementation found at http://weblogs.asp.net/esanchez/archive/2010/07/29/a-quick-and-dirty-implementation-of-excel-norminv-function-in-c.aspx
                    /*
                    *     Compute the quantile function for the normal distribution.
                    *
                    *     For small to moderate probabilities, algorithm referenced
                    *     below is used to obtain an initial approximation which is
                    *     polished with a final Newton step.
                    *
                    *     For very large arguments, an algorithm of Wichura is used.
                    *
                    *  REFERENCE
                    *
                    *     Beasley, J. D. and S. G. Springer (1977).
                    *     Algorithm AS 111: The percentage points of the normal distribution,
                    *     Applied Statistics, 26, 118-121.
                    *
                    *      Wichura, M.J. (1988).
                    *      Algorithm AS 241: The Percentage Points of the Normal Distribution.
                    *      Applied Statistics, 37, 477-484.
                    */         

                    function normInv($pro, $rata, $SD)
                    {
                        if ($pro < 0 || $pro > 1)
                        {
                            throw "The probality p must be bigger than 0 and smaller than 1";
                        }
                        if ($SD < 0)
                        {
                            throw "The standard deviation sigma must be positive";
                        }

                        if ($pro == 0)
                        {
                            return -INF;
                        }
                        if ($pro == 1)
                        {
                            return INF;
                        }
                        if ($SD == 0)
                        {
                            return $rata;
                        }

                        
                        $q = $pro - 0.5;

                        /*-- use AS 241 --- */
                        /* double ppnd16_(double *p, long *ifault)*/
                        /*      ALGORITHM AS241  APPL. STATIST. (1988) VOL. 37, NO. 3
                                Produces the normal deviate Z corresponding to a given lower
                                tail area of P; Z is accurate to about 1 part in 10**16.
                        */
                        if (abs($q) <= .425)
                        {/* 0.075 <= p <= 0.925 */
                            $r = .180625 - $q * $q;
                            $val =
                                  $q * ((((((($r * 2509.0809287301226727 +
                                              33430.575583588128105) * $r + 67265.770927008700853) * $r +
                                            45921.953931549871457) * $r + 13731.693765509461125) * $r +
                                          1971.5909503065514427) * $r + 133.14166789178437745) * $r +
                                        3.387132872796366608)
                                  / ((((((($r * 5226.495278852854561 +
                                            28729.085735721942674) * $r + 39307.89580009271061) * $r +
                                          21213.794301586595867) * $r + 5394.1960214247511077) * $r +
                                        687.1870074920579083) * $r + 42.313330701600911252) * $r + 1);
                        }
                        else
                        { /* closer than 0.075 from {0,1} boundary */

                            /* r = min(p, 1-p) < 0.075 */
                            if ($q > 0)
                                $r = 1 - $pro;
                            else
                                $r = $pro;

                            $r = sqrt(-log($r));
                            /* r = sqrt(-log(r))  <==>  min(p, 1-p) = exp( - r^2 ) */

                            if ($r <= 5)
                            { /* <==> min(p,1-p) >= exp(-25) ~= 1.3888e-11 */
                                $r += -1.6;
                                $val = ((((((($r * 7.7454501427834140764e-4 +
                                          .0227238449892691845833) * $r + .24178072517745061177) *
                                        $r + 1.27045825245236838258) * $r +
                                        3.64784832476320460504) * $r + 5.7694972214606914055) *
                                      $r + 4.6303378461565452959) * $r +
                                    1.42343711074968357734)
                                    / ((((((($r *
                                            1.05075007164441684324e-9 + 5.475938084995344946e-4) *
                                            $r + .0151986665636164571966) * $r +
                                          .14810397642748007459) * $r + .68976733498510000455) *
                                        $r + 1.6763848301838038494) * $r +
                                        2.05319162663775882187) * $r + 1);
                            }
                            else
                            { /* very close to  0 or 1 */
                                $r += -5;
                                $val = ((((((($r * 2.01033439929228813265e-7 +
                                          2.71155556874348757815e-5) * $r +
                                          .0012426609473880784386) * $r + .026532189526576123093) *
                                        $r + .29656057182850489123) * $r +
                                      1.7848265399172913358) * $r + 5.4637849111641143699) *
                                    $r + 6.6579046435011037772)
                                    / ((((((($r *
                                            2.04426310338993978564e-15 + 1.4215117583164458887e-7) *
                                            r + 1.8463183175100546818e-5) * r +
                                          7.868691311456132591e-4) * r + .0148753612908506148525)
                                        * r + .13692988092273580531) * r +
                                        .59983220655588793769) * r + 1);
                            }

                            if ($q < 0.0)
                            {
                                $val = -$val;
                            }
                        }

                        return $rata + $SD * $val;
                    }


                    // normInv(probabilitas, rata rata, standar deviasi);
                    
                    echo "<tr><td>";
                    $nrm1= normInv(0.2,$rata,$SD);
                    echo number_format(round((float)$nrm1,4),4);
                    echo "</td></td>";  

                    echo "<tr><td>";
                    $nrm2= normInv(0.4,$rata,$SD);
                    echo number_format(round((float)$nrm2,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    $nrm3= normInv(0.6,$rata,$SD);
                    echo number_format(round((float)$nrm3,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    $nrm4= normInv(0.8,$rata,$SD);
                    echo number_format(round((float)$nrm4,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    $nrm5= normInv(0.999,$rata,$SD);
                    echo number_format(round((float)$nrm5,4),4);
                    echo "</td></td>"; 

                  ?>
                  </tr> 
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
</td>


<td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Of</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                    <tr>
                    <?php 
                    // PHP program to count occurrences of an 
                    // element in an unsorted array 

                    function frequency1($a, $n, $x1) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x1) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x1 = $nrm1; 
                      $n = sizeof($a); 
                      $freq1 = frequency1($a, $n, $x1);
                      echo "<tr><td>"; echo number_format(round((float)$freq1,3),3); echo "</td></td>";    
                      // This code is contributed by ajit (edited)
                      
                      function frequency2($a, $n, $x2) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x2) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x2 = $nrm2; 
                      $n = sizeof($a); 
                      $freq2 = frequency2($a, $n, $x2)-$freq1;
                      echo "<tr><td>"; echo number_format(round((float)$freq2,3),3); echo "</td></td>"; 

                      function frequency3($a, $n, $x3) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x3) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x3 = $nrm3; 
                      $n = sizeof($a); 
                      $freq3 = frequency3($a, $n, $x3)-$freq2-$freq1;
                      echo "<tr><td>"; echo number_format(round((float)$freq3,3),3); echo "</td></td>"; 
                      
                      function frequency4($a, $n, $x4) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x4) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x4 = $nrm4; 
                      $n = sizeof($a); 
                      $freq4 = frequency4($a, $n, $x4)-$freq3-$freq2-$freq1;
                      echo "<tr><td>"; echo number_format(round((float)$freq4,3),3); echo "</td></td>"; 

                      function frequency5($a, $n, $x5) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x5) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x5 = $nrm5; 
                      $n = sizeof($a); 
                      $freq5 = frequency5($a, $n, $x5)-$freq4-$freq3-$freq2-$freq1;
                      echo "<tr><td>"; echo number_format(round((float)$freq5,3),3); echo "</td></td>"; 

                    ?> 

                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
</td>
            

<td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Ef-Of)<sup>2</sup> / Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                   <tr> 
                    <?php
                    
                    $squ1= pow(($ef-$freq1),2)/$ef;
                    $squ2= pow(($ef-$freq2),2)/$ef;
                    $squ3= pow(($ef-$freq3),2)/$ef;
                    $squ4= pow(($ef-$freq4),2)/$ef;
                    $squ5= pow(($ef-$freq5),2)/$ef;

                    echo "<tr><td>"; echo number_format(round((float)$squ1,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ2,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ3,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ4,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ5,3),3); echo "</tr></td>";
                    
                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>

        <?php
          echo "<b>Chi Kuadrat hitung harus lebih kecil dari Chi Kuadrat Kritik (tabel) </b><br></br>";
          echo "<b>Hasil Perhitungan :"; echo "</b><br>";
          echo "- Chi Kuadrat hitung = "; 
              $squtotal1= ($squ1+$squ2+$squ3+$squ4+$squ5);
              echo number_format(round((float)$squtotal1,3),3);
          echo "<br>";
          echo "- Derajat Kebebasan (DK) = "; 
          $DK1= ($panjangkelas-2-1);
          echo number_format(round((float)$DK1,0),0);
          echo "<br>";
          echo "- Chi Kuadrat (tabel) = "; 
          if ($DK1==1){
            $CI1= 3.84146;
          }if ($DK1==2){
            $CI1= 5.99147;
          }if ($DK1==3){
            $CI1= 7.81473;
          }if ($DK1==4){
            $CI1= 9.48773;
          }if ($DK1==5){
            $CI1= 11.0705;
          }if ($DK1==6){
            $CI1= 12.5916;
          }if ($DK1==7){
            $CI1= 14.0671;
          }if ($DK1==8){
            $CI1= 15.5073;
          }if ($DK1==9){
            $CI1= 16.9190;
          }if ($DK1==10){
            $CI1= 18.3070;
          }if ($DK1==11){
            $CI1= 19.6751;
          }if ($DK1==12){
            $CI1= 21.0261;
          }if ($DK1==13){
            $CI1= 22.3621;
          }if ($DK1==14){
            $CI1= 23.6848;
          }if ($DK1==15){
            $CI1= 24.9958;
          }if ($DK1==16){
            $CI1= 26.2962;
          }if ($DK1==17){
            $CI1= 27.5871;
          }if ($DK1==18){
            $CI1= 28.8693;
          }if ($DK1==19){
            $CI1= 30.1435;
          }if ($DK1==20){
            $CI1= 31.4104;
          }if ($DK1==21){
            $CI1= 31.6705;
          }if ($DK1==22){
            $CI1= 33.9244;
          }if ($DK1==23){
            $CI1= 35.1725;
          }if ($DK1==24){
            $CI1= 36.4151;
          }if ($DK1==25){
            $CI1= 37.6525;
          }if ($DK1==26){
            $CI1= 38.8852;
          }if ($DK1==27){
            $CI1= 40.1133;
          }if ($DK1==28){
            $CI1= 41.3372;
          }if ($DK1==29){
            $CI1= 42.5569;
          }if ($DK1==30){
            $CI1= 43.7729;
          }if ($DK1==40){
            $CI1= 55.7585;
          }if ($DK1==50){
            $CI1= 67.5048;
          }if ($DK1==60){
            $CI1= 79.0819;
          }

          echo $CI1; echo "<br>";
          
          if( $squtotal1 < $CI1){
            echo "- Distribusi Normal diterima";
          }else{
            echo "- Distribusi Normal tidak memenuhi";
          }
               
        ?>
</div>



<!-- ==================== DISTRIBUSI LOG NORMAL ======================== -->
<br>
<div class="container">
  <div class="row">
  <div class="col-sm">

  <div class="container">
            <div class="row">
              <div class="col-sm">
                <p class="mb-4"><b>2. Distribusi Log Normal</b></a>.</p>
                </div>
              </div>
            </div>

      <div class="card shadow mb-4">
      <div class="card-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
       <tr><tr>
       <td>

        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">P(x ≤ Xm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                  <?php

                  echo "<tr><td>"; echo "0 < P ≤ 0.2"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.2 < P ≤ 0.4"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.4 < P ≤ 0.6"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.6 < P ≤ 0.8"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.8 < P ≤ 0.999"; echo "</td></td>";

                  ?>
                  </tr>                  
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
      </td>


      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php

                      for ($ty=1; $ty <= $panjangkelas; $ty++){
                      
                      echo "<tr><td>";
                      echo number_format(round((float)$ef,4),4);
                      echo "</td></td>";
                    }    

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
        </td>            


        <td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">p (mm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                    <?php
                    /**
                    * LOGINV
                    * Returns the inverse of the normal cumulative distribution
                    * sumber : http://www.osakac.ac.jp/labs/koeda/tmp/phpexcel/Documentation/API/__filesource/fsource_PHPExcel_Calculation__PHPExcelCalculationFunctions.php.html#a4515
                    **/
                    
                    $loginv1= exp($rata2 + $Sd2 * NormSInv(0.2));
                    $loginv2= exp($rata2 + $Sd2 * NormSInv(0.4));
                    $loginv3= exp($rata2 + $Sd2 * NormSInv(0.6));
                    $loginv4= exp($rata2 + $Sd2 * NormSInv(0.8));
                    $loginv5= exp($rata2 + $Sd2 * NormSInv(0.999));
                    
                    echo "<tr><td>";
                    echo number_format(round((float)$loginv1,4),4);
                    echo "</td></td>";  

                    echo "<tr><td>";
                    echo number_format(round((float)$loginv2,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$loginv3,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$loginv4,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$loginv5,4),4);
                    echo "</td></td>"; 

                  ?>
                  </tr> 
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
      </td>            
                  

      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Of</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                    <tr>
                    <?php
                    
                    function frequency11($a, $n, $x11) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x11) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x11 = $loginv1; 
                      $n = sizeof($a); 
                      $freq11 = frequency11($a, $n, $x11);
                      echo "<tr><td>"; echo number_format(round((float)$freq11,3),3); echo "</td></td>";    
                      // This code is contributed by ajit (edited)
                      
                      function frequency12($a, $n, $x12) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x12) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x12 = $loginv2; 
                      $n = sizeof($a); 
                      $freq12 = frequency12($a, $n, $x12)-$freq11;
                      echo "<tr><td>"; echo number_format(round((float)$freq12,3),3); echo "</td></td>"; 

                      function frequency13($a, $n, $x13) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x13) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x13 = $loginv3; 
                      $n = sizeof($a); 
                      $freq13 = frequency13($a, $n, $x13)-$freq12-$freq11;
                      echo "<tr><td>"; echo number_format(round((float)$freq13,3),3); echo "</td></td>"; 
                      
                      function frequency14($a, $n, $x14) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x14) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x14 = $loginv4; 
                      $n = sizeof($a); 
                      $freq14 = frequency14($a, $n, $x14)-$freq13-$freq12-$freq11;
                      echo "<tr><td>"; echo number_format(round((float)$freq14,3),3); echo "</td></td>"; 

                      function frequency15($a, $n, $x15) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x15) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x15 = $loginv5; 
                      $n = sizeof($a); 
                      $freq15 = frequency15($a, $n, $x15)-$freq14-$freq13-$freq12-$freq11;
                      echo "<tr><td>"; echo number_format(round((float)$freq15,3),3); echo "</td></td>";   

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
      </td>            


      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Ef-Of)<sup>2</sup> / Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php

                      $squ11= pow(($ef-$freq11),2)/$ef;
                      $squ12= pow(($ef-$freq12),2)/$ef;
                      $squ13= pow(($ef-$freq13),2)/$ef;
                      $squ14= pow(($ef-$freq14),2)/$ef;
                      $squ15= pow(($ef-$freq15),2)/$ef;
  
                      echo "<tr><td>"; echo number_format(round((float)$squ11,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ12,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ13,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ14,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ15,3),3); echo "</tr></td>";

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
          </td> 

  </tr>
</table>
</div>
</div>
</div>
</div>
</div>

<?php
          echo "<b>Chi Kuadrat hitung harus lebih kecil dari Chi Kuadrat Kritik (tabel) </b><br></br>";
          echo "<b>Hasil Perhitungan :"; echo "</b><br>";
          echo "- Chi Kuadrat hitung = "; 
              $squtotal11= ($squ11+$squ12+$squ13+$squ14+$squ15);
              echo number_format(round((float)$squtotal11,3),3);
          echo "<br>";
          echo "- Derajat Kebebasan (DK) = "; 
          $DK11= ($panjangkelas-2-1);
          echo number_format(round((float)$DK11,0),0);
          echo "<br>";
          echo "- Chi Kuadrat (tabel) = "; 
          if ($DK11==1){
            $CI11= 3.84146;
          }if ($DK11==2){
            $CI11= 5.99147;
          }if ($DK11==3){
            $CI11= 7.81473;
          }if ($DK11==4){
            $CI11= 9.48773;
          }if ($DK11==5){
            $CI11= 11.0705;
          }if ($DK11==6){
            $CI11= 12.5916;
          }if ($DK11==7){
            $CI11= 14.0671;
          }if ($DK11==8){
            $CI11= 15.5073;
          }if ($DK11==9){
            $CI11= 16.9190;
          }if ($DK11==10){
            $CI11= 18.3070;
          }if ($DK11==11){
            $CI11= 19.6751;
          }if ($DK11==12){
            $CI11= 21.0261;
          }if ($DK11==13){
            $CI11= 22.3621;
          }if ($DK11==14){
            $CI11= 23.6848;
          }if ($DK11==15){
            $CI11= 24.9958;
          }if ($DK11==16){
            $CI11= 26.2962;
          }if ($DK11==17){
            $CI11= 27.5871;
          }if ($DK11==18){
            $CI11= 28.8693;
          }if ($DK11==19){
            $CI11= 30.1435;
          }if ($DK11==20){
            $CI11= 31.4104;
          }if ($DK11==21){
            $CI11= 31.6705;
          }if ($DK11==22){
            $CI11= 33.9244;
          }if ($DK11==23){
            $CI11= 35.1725;
          }if ($DK11==24){
            $CI11= 36.4151;
          }if ($DK11==25){
            $CI11= 37.6525;
          }if ($DK11==26){
            $CI11= 38.8852;
          }if ($DK11==27){
            $CI11= 40.1133;
          }if ($DK11==28){
            $CI11= 41.3372;
          }if ($DK11==29){
            $CI11= 42.5569;
          }if ($DK11==30){
            $CI11= 43.7729;
          }if ($DK11==40){
            $CI11= 55.7585;
          }if ($DK11==50){
            $CI11= 67.5048;
          }if ($DK11==60){
            $CI11= 79.0819;
          }

          echo $CI11; echo "<br>";
          
          if( $squtotal11 < $CI11){
            echo "- Distribusi Log Normal diterima";
          }else{
            echo "- Distribusi Log Normal tidak memenuhi";
          }
               
        ?>

</div>




<!-- ==================== DISTRIBUSI GUMBEL ======================== -->
<br>
<div class="container">
  <div class="row">
  <div class="col-sm">

  <div class="container">
            <div class="row">
              <div class="col-sm">
                <p class="mb-4"><b>3. Distribusi Gumbel</b></a>.</p>
                </div>
              </div>
            </div>

      <div class="card shadow mb-4">
      <div class="card-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
       <tr><tr>
       <td>

        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">P(x ≤ Xm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                  <?php

                  echo "<tr><td>"; echo "0 < P ≤ 0.2"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.2 < P ≤ 0.4"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.4 < P ≤ 0.6"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.6 < P ≤ 0.8"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.8 < P ≤ 0.999"; echo "</td></td>";

                  ?>
                  </tr>                  
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
      </td>



      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php

                      for ($ty=1; $ty <= $panjangkelas; $ty++){
                      
                      echo "<tr><td>";
                      echo number_format(round((float)$ef,4),4);
                      echo "</td></td>";
                    }    

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
        </td> 

        
        <td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">p (mm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                    <?php
                    // REFERENSI GUMBELINV :
                    // ANALISIS FREKUENSI DALAM BIDANG SUMBER DAYA AIR                    
                    // MENGGUNAKAN PROGRAM EXCEL                                 
                    // VISUAL BASIC FOR APPLICATION                                
                    // Anang Kurniawan   
                    // Dosen Pembimbing : Ir.Djoko Luknanto,M.Sc,Ph.D.    
                    
                    $alpha= 2.4495*$SD/pi();
                    $U= $rata-(0.5772*$alpha);
                    $Y1= (-(log(-(log(0.2)))));
                    $Y2= (-(log(-(log(0.4)))));
                    $Y3= (-(log(-(log(0.6)))));
                    $Y4= (-(log(-(log(0.8)))));
                    $Y5= (-(log(-(log(0.999)))));

                    $gm1= $U+$Y1*$alpha;
                    $gm2= $U+$Y2*$alpha;
                    $gm3= $U+$Y3*$alpha;
                    $gm4= $U+$Y4*$alpha;
                    $gm5= $U+$Y5*$alpha;

                    
                    echo "<tr><td>";
                    echo number_format(round((float)$gm1,4),4);
                    echo "</td></td>";  

                    echo "<tr><td>";
                    echo number_format(round((float)$gm2,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$gm3,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$gm4,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$gm5,4),4);
                    echo "</td></td>"; 

                  ?>
                  </tr> 
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
      </td>  


      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Of</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                   <tr> 
                    <?php
                    // PHP program to count occurrences of an 
                    // element in an unsorted array 

                    function frequency21($a, $n, $x21) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x21) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x21 = $gm1; 
                      $n = sizeof($a); 
                      $freq21 = frequency21($a, $n, $x21);
                      echo "<tr><td>"; echo number_format(round((float)$freq21,3),3); echo "</td></td>";    
                      // This code is contributed by ajit (edited)
                      
                      function frequency22($a, $n, $x22) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x22) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x22 = $gm2; 
                      $n = sizeof($a); 
                      $freq22 = frequency22($a, $n, $x22)-$freq21;
                      echo "<tr><td>"; echo number_format(round((float)$freq22,3),3); echo "</td></td>"; 

                      function frequency23($a, $n, $x23) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x23) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x23 = $gm3; 
                      $n = sizeof($a); 
                      $freq23 = frequency3($a, $n, $x23)-$freq22-$freq21;
                      echo "<tr><td>"; echo number_format(round((float)$freq23,3),3); echo "</td></td>"; 
                      
                      function frequency24($a, $n, $x24) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x24) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x24 = $gm4; 
                      $n = sizeof($a); 
                      $freq24 = frequency24($a, $n, $x24)-$freq23-$freq22-$freq21;
                      echo "<tr><td>"; echo number_format(round((float)$freq24,3),3); echo "</td></td>"; 

                      function frequency25($a, $n, $x25) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x25) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x25 = $gm5; 
                      $n = sizeof($a); 
                      $freq25 = frequency25($a, $n, $x25)-$freq24-$freq23-$freq22-$freq21;
                      echo "<tr><td>"; echo number_format(round((float)$freq25,3),3); echo "</td></td>"; 

                    ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
      </td> 


      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Ef-Of)<sup>2</sup> / Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                      
                    $squ21= pow(($ef-$freq21),2)/$ef;
                    $squ22= pow(($ef-$freq22),2)/$ef;
                    $squ23= pow(($ef-$freq23),2)/$ef;
                    $squ24= pow(($ef-$freq24),2)/$ef;
                    $squ25= pow(($ef-$freq25),2)/$ef;

                    echo "<tr><td>"; echo number_format(round((float)$squ21,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ22,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ23,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ24,3),3); echo "</tr></td>";
                    echo "<tr><td>"; echo number_format(round((float)$squ25,3),3); echo "</tr></td>";   

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
                </div>
            </div>
            </div>
          </td> 

  </tr>
</table>
</div>
</div>
</div>
</div>
</div>

<?php
          echo "<b>Chi Kuadrat hitung harus lebih kecil dari Chi Kuadrat Kritik (tabel) </b><br></br>";
          echo "<b>Hasil Perhitungan :"; echo "</b><br>";
          echo "- Chi Kuadrat hitung = "; 
              $squtotal21= ($squ21+$squ22+$squ23+$squ24+$squ25);
              echo number_format(round((float)$squtotal21,3),3);
          echo "<br>";
          echo "- Derajat Kebebasan (DK) = "; 
          $DK21= ($panjangkelas-2-1);
          echo number_format(round((float)$DK1,0),0);
          echo "<br>";
          echo "- Chi Kuadrat (tabel) = "; 
          if ($DK21==1){
            $CI21= 3.84146;
          }if ($DK21==2){
            $CI21= 5.99147;
          }if ($DK21==3){
            $CI21= 7.81473;
          }if ($DK21==4){
            $CI21= 9.48773;
          }if ($DK21==5){
            $CI21= 11.0705;
          }if ($DK21==6){
            $CI21= 12.5916;
          }if ($DK21==7){
            $CI21= 14.0671;
          }if ($DK21==8){
            $CI21= 15.5073;
          }if ($DK21==9){
            $CI21= 16.9190;
          }if ($DK21==10){
            $CI21= 18.3070;
          }if ($DK21==11){
            $CI21= 19.6751;
          }if ($DK21==12){
            $CI21= 21.0261;
          }if ($DK21==13){
            $CI21= 22.3621;
          }if ($DK21==14){
            $CI21= 23.6848;
          }if ($DK21==15){
            $CI21= 24.9958;
          }if ($DK21==16){
            $CI21= 26.2962;
          }if ($DK21==17){
            $CI21= 27.5871;
          }if ($DK21==18){
            $CI21= 28.8693;
          }if ($DK21==19){
            $CI21= 30.1435;
          }if ($DK21==20){
            $CI21= 31.4104;
          }if ($DK21==21){
            $CI21= 31.6705;
          }if ($DK21==22){
            $CI21= 33.9244;
          }if ($DK21==23){
            $CI21= 35.1725;
          }if ($DK21==24){
            $CI21= 36.4151;
          }if ($DK21==25){
            $CI21= 37.6525;
          }if ($DK21==26){
            $CI21= 38.8852;
          }if ($DK21==27){
            $CI21= 40.1133;
          }if ($DK21==28){
            $CI21= 41.3372;
          }if ($DK21==29){
            $CI21= 42.5569;
          }if ($DK21==30){
            $CI21= 43.7729;
          }if ($DK21==40){
            $CI21= 55.7585;
          }if ($DK21==50){
            $CI21= 67.5048;
          }if ($DK21==60){
            $CI21= 79.0819;
          }

          echo $CI21; echo "<br>";
          
          if( $squtotal21 < $CI21){
            echo "- Distribusi Gumbel diterima";
          }else{
            echo "- Distribusi Gumbel tidak memenuhi";
          }
               
        ?>

</div>




<!-- ==================== DISTRIBUSI LOG PERSON III ======================== -->
<br>
<div class="container">
  <div class="row">
  <div class="col-sm">

  <div class="container">
            <div class="row">
              <div class="col-sm">
                <p class="mb-4"><b>4. Distribusi Log Person III</b></a>.</p>
                </div>
              </div>
            </div>

      <div class="card shadow mb-4">
      <div class="card-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
       <tr><tr>
       <td>

        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">P(x ≤ Xm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                  <?php

                  echo "<tr><td>"; echo "0 < P ≤ 0.2"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.2 < P ≤ 0.4"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.4 < P ≤ 0.6"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.6 < P ≤ 0.8"; echo "</td></td>";
                  echo "<tr><td>"; echo "0.8 < P ≤ 0.999"; echo "</td></td>";

                  ?>
                  </tr>                  
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
      </td>



      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php

                      for ($ty=1; $ty <= $panjangkelas; $ty++){
                      
                      echo "<tr><td>";
                      echo number_format(round((float)$ef,4),4);
                      echo "</td></td>";
                    }    

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
        </td> 


        <td>
          <div class="col-sm">
          <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">p (mm)</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                  <?php
                  /**
                   * Returns the inverse of the standard normal cumulative distribution. 
                   * The distribution has a mean of zero and a standard deviation of one.
                   * Resources: 
                   *   http://board.phpbuilder.com/showthread.php?10367349-PHP-NORMSINV
                   *   http://www.source-code.biz/snippets/vbasic/9.htm
                   * @param  integer $week number of week
                   * @return float       sales
                   */
                  function NormSInv($probability) {
                    $a1 = -39.6968302866538; 
                    $a2 = 220.946098424521;
                    $a3 = -275.928510446969;
                    $a4 = 138.357751867269;
                    $a5 = -30.6647980661472;
                    $a6 = 2.50662827745924;

                    $b1 = -54.4760987982241;
                    $b2 = 161.585836858041;
                    $b3 = -155.698979859887;
                    $b4 = 66.8013118877197;
                    $b5 = -13.2806815528857;
                    
                    $c1 = -7.78489400243029E-03;
                    $c2 = -0.322396458041136;
                    $c3 = -2.40075827716184;
                    $c4 = -2.54973253934373;
                    $c5 = 4.37466414146497;
                    $c6 = 2.93816398269878;

                    $d1 = 7.78469570904146E-03;
                    $d2 = 0.32246712907004;
                    $d3 = 2.445134137143;
                    $d4 =  3.75440866190742;

                    $p_low = 0.02425;
                    $p_high = 1 - $p_low;
                    $q = 0;
                    $r = 0;
                    $normSInv = 0;
                    if ($probability < 0 ||
                      $probability > 1)
                    {
                      throw new \Exception("normSInv: Argument out of range.");
                    } else if ($probability < $p_low) {

                      $q = sqrt(-2 * log($probability));
                      $normSInv = ((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) / (((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);

                    } else if ($probability <= $p_high) {

                      $q = $probability - 0.5;
                      $r = $q * $q;
                      $normSInv = ((((($a1 * $r + $a2) * $r + $a3) * $r + $a4) * $r + $a5) * $r + $a6) * $q / ((((($b1 * $r + $b2) * $r + $b3) * $r + $b4) * $r + $b5) * $r + 1);

                    } else {

                      $q = sqrt(-2 * log(1 - $probability));
                      $normSInv = -((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) /(((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);
                    
                    }

                    return $normSInv;
                  }
                  ?>

                    <?php
                    // Hitung nilai Z dengan Dist. Normal Standar N(0,1)
                    $zz1 = NormSInv(0.2);
                    //echo $zz1;
                    $zz2 = NormSInv(0.4);
                    $zz3 = NormSInv(0.6);
                    $zz4 = NormSInv(0.8);
                    $zz5 = NormSInv(0.999);
                
                    // Hitung nilai K
                    $K = $Cs2 / 6;
                    
                    // Hitung nilai KT
                    $p2zz1= pow($zz1,2);
                    //echo $p2zz1;
                    $p3zz1= pow($zz1,3);
                    $p2zz2= pow($zz2,2);
                    $p3zz2= pow($zz2,3);
                    $p2zz3= pow($zz3,2);
                    $p3zz3= pow($zz3,3);
                    $p2zz4= pow($zz4,2);
                    $p3zz4= pow($zz4,3);
                    $p2zz5= pow($zz5,2);
                    $p3zz5= pow($zz5,3);

                    $p2K= pow($K,2);
                    $p3K= pow($K,3);
                    $p4K= pow($K,4);
                    $p5K= pow($K,5);

                    $KT1 = $zz1 + ($p2zz1 - 1) * $K + ($p3zz1 - 6 * $zz1) * $p2K - ($p2zz1 - 1) * $p3K + $zz1 * $p4K + $p5K;
                    $KT2 = $zz2 + ($p2zz2 - 1) * $K + ($p3zz2 - 6 * $zz2) * $p2K - ($p2zz2 - 1) * $p3K + $zz2 * $p4K + $p5K;
                    $KT3 = $zz3 + ($p2zz3 - 1) * $K + ($p3zz3 - 6 * $zz3) * $p2K - ($p2zz3 - 1) * $p3K + $zz3 * $p4K + $p5K;
                    $KT4 = $zz4 + ($p2zz4 - 1) * $K + ($p3zz4 - 6 * $zz4) * $p2K - ($p2zz4 - 1) * $p3K + $zz4 * $p4K + $p5K;
                    $KT5 = $zz5 + ($p2zz5 - 1) * $K + ($p3zz5 - 6 * $zz5) * $p2K - ($p2zz5 - 1) * $p3K + $zz5 * $p4K + $p5K;
                
                    // Hitung nilai Y
                    $LOGPERSONINV1 = exp($rata2 + $KT1 * $Sd2);
                    $LOGPERSONINV2 = exp($rata2 + $KT2 * $Sd2);
                    $LOGPERSONINV3 = exp($rata2 + $KT3 * $Sd2);
                    $LOGPERSONINV4 = exp($rata2 + $KT4 * $Sd2);
                    $LOGPERSONINV5 = exp($rata2 + $KT5 * $Sd2);


                    
                    echo "<tr><td>";
                    echo number_format(round((float)$LOGPERSONINV1,4),4);
                    echo "</td></td>";  

                    echo "<tr><td>";
                    echo number_format(round((float)$LOGPERSONINV2,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$LOGPERSONINV3,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$LOGPERSONINV4,4),4);
                    echo "</td></td>"; 

                    echo "<tr><td>";
                    echo number_format(round((float)$LOGPERSONINV5,4),4);
                    echo "</td></td>"; 

                  ?>
                  </tr> 
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
      </td>


      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">Of</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                    // PHP program to count occurrences of an 
                    // element in an unsorted array 

                    function frequency31($a, $n, $x31) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x31) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x31 = $LOGPERSONINV1; 
                      $n = sizeof($a); 
                      $freq31 = frequency31($a, $n, $x31);
                      echo "<tr><td>"; echo number_format(round((float)$freq31,3),3); echo "</td></td>";    
                      // This code is contributed by ajit (edited)
                      
                      function frequency32($a, $n, $x32) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x32) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x32 = $LOGPERSONINV2; 
                      $n = sizeof($a); 
                      $freq32 = frequency32($a, $n, $x32)-$freq31;
                      echo "<tr><td>"; echo number_format(round((float)$freq32,3),3); echo "</td></td>"; 

                      function frequency33($a, $n, $x33) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x33) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x33 = $LOGPERSONINV3; 
                      $n = sizeof($a); 
                      $freq33 = frequency33($a, $n, $x33)-$freq32-$freq31;
                      echo "<tr><td>"; echo number_format(round((float)$freq33,3),3); echo "</td></td>"; 
                      
                      function frequency34($a, $n, $x34) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x34) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x34 = $LOGPERSONINV4; 
                      $n = sizeof($a); 
                      $freq34 = frequency34($a, $n, $x34)-$freq33-$freq32-$freq31;
                      echo "<tr><td>"; echo number_format(round((float)$freq34,3),3); echo "</td></td>"; 

                      function frequency35($a, $n, $x35) 
                    { 
                      $count = 0; 
                      for ($i = 0; $i < $n; $i++) 
                      if ($a[$i] < $x35) 
                        $count++; 
                      return $count; 
                    } 

                      // Driver Code                       
                      $a = $payload;                      
                      $x35 = $LOGPERSONINV5; 
                      $n = sizeof($a); 
                      $freq35 = frequency35($a, $n, $x35)-$freq34-$freq33-$freq32-$freq31;
                      echo "<tr><td>"; echo number_format(round((float)$freq35,3),3); echo "</td></td>"; 

                    ?>
                  </tr>
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
      </td> 


      <td>
        <div class="col-sm">
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 230px">
                  <thead>                  
                    <tr>
                      <th style="text-align:center">(Ef-Of)<sup>2</sup> / Ef</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                      $squ31= pow(($ef-$freq31),2)/$ef;
                      $squ32= pow(($ef-$freq32),2)/$ef;
                      $squ33= pow(($ef-$freq33),2)/$ef;
                      $squ34= pow(($ef-$freq34),2)/$ef;
                      $squ35= pow(($ef-$freq35),2)/$ef;
  
                      echo "<tr><td>"; echo number_format(round((float)$squ31,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ32,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ33,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ34,3),3); echo "</tr></td>";
                      echo "<tr><td>"; echo number_format(round((float)$squ35,3),3); echo "</tr></td>";  

                  ?>
                  </tr> 
                  </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
          </td> 

  </tr>
</table>
</div>
</div>
</div>
</div>
</div>

<?php
          echo "<b>Chi Kuadrat hitung harus lebih kecil dari Chi Kuadrat Kritik (tabel) </b><br></br>";
          echo "<b>Hasil Perhitungan :"; echo "</b><br>";
          echo "- Chi Kuadrat hitung = "; 
              $squtotal31= ($squ31+$squ32+$squ33+$squ34+$squ35);
              echo number_format(round((float)$squtotal31,3),3);
          echo "<br>";
          echo "- Derajat Kebebasan (DK) = "; 
          $DK31= ($panjangkelas-2-1);
          echo number_format(round((float)$DK31,0),0);
          echo "<br>";
          echo "- Chi Kuadrat (tabel) = "; 
          if ($DK31==1){
            $CI31= 3.84146;
          }if ($DK31==2){
            $CI31= 5.99147;
          }if ($DK31==3){
            $CI31= 7.81473;
          }if ($DK31==4){
            $CI31= 9.48773;
          }if ($DK31==5){
            $CI31= 11.0705;
          }if ($DK31==6){
            $CI31= 12.5916;
          }if ($DK31==7){
            $CI31= 14.0671;
          }if ($DK31==8){
            $CI31= 15.5073;
          }if ($DK31==9){
            $CI31= 16.9190;
          }if ($DK31==10){
            $CI31= 18.3070;
          }if ($DK31==11){
            $CI31= 19.6751;
          }if ($DK31==12){
            $CI31= 21.0261;
          }if ($DK31==13){
            $CI31= 22.3621;
          }if ($DK31==14){
            $CI31= 23.6848;
          }if ($DK31==15){
            $CI31= 24.9958;
          }if ($DK31==16){
            $CI31= 26.2962;
          }if ($DK31==17){
            $CI31= 27.5871;
          }if ($DK31==18){
            $CI31= 28.8693;
          }if ($DK31==19){
            $CI31= 30.1435;
          }if ($DK31==20){
            $CI31= 31.4104;
          }if ($DK31==21){
            $CI31= 31.6705;
          }if ($DK31==22){
            $CI31= 33.9244;
          }if ($DK31==23){
            $CI31= 35.1725;
          }if ($DK31==24){
            $CI31= 36.4151;
          }if ($DK31==25){
            $CI31= 37.6525;
          }if ($DK31==26){
            $CI31= 38.8852;
          }if ($DK31==27){
            $CI31= 40.1133;
          }if ($DK31==28){
            $CI31= 41.3372;
          }if ($DK31==29){
            $CI31= 42.5569;
          }if ($DK31==30){
            $CI31= 43.7729;
          }if ($DK31==40){
            $CI31= 55.7585;
          }if ($DK31==50){
            $CI31= 67.5048;
          }if ($DK31==60){
            $CI31= 79.0819;
          }

          echo $CI31; echo "<br>";
          
          if( $squtotal31 < $CI31){
            echo "- Distribusi Log Person III diterima";
          }else{
            echo "- Distribusi Log Person III tidak memenuhi";
          }
               
        ?>

</div>






<!--  Smirnov Kolmogorov -->
<?php
// Standar Deviasi 3
$Sd3= sqrt($rata/($datah-1));
     
?>

<br></br>
<div class="container">
<div class="row">
<div class="col-sm">

<div class="container">
            <div class="row">
              <div class="col-sm">
                <h1 class="h3 mb-2 text-gray-800">Uji Smirnov Kolmogorov</h1>
                <p class="mb-4">Derajad Signifikan = 5% <br>
                <b>Keterangan : </b><br>
                ( 1 ) : Distribusi Normal <br>
                ( 2 ) : Distribusi Log Normal <br>
                ( 3 ) : Distribusi Gumbel <br>
                ( 4 ) : Distribusi Log Person III
                </a></p>
                </div>
              </div>
            </div>

      <div class="card shadow mb-4">
      <div class="card-body">
      <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped" style="font-size: 90%">
       <tr><tr>
       <td>

      <div class="col-sm">
      <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="2" style="text-align:center">Data</th>
             </tr><tr>
             <th style="text-align:center">Xi</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>  
             <?php
                 if (is_array($payload) || is_object($payload)){
                 }    foreach ($payload as $value){
                     echo "<tr><td>"; echo number_format(round((float)$value,2),2); echo "</tr></td>";
                 }
                 
           ?>
           </tr> 
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>

      
      <td>
      <div class="col-sm">
      <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="2" style="text-align:center">Urutan</th>
             </tr><tr>
             <th style="text-align:center">m</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
            <tr> 
             <?php
                    
                    for ($mm = 1; $mm <= $datah; $mm++) {
                      
                      $mm2= $mm;
                      $mm2_ar = explode(', ', $mm2);
                      //var_dump($mm2_ar);

                      
                      if (is_array($mm2_ar) || is_object($mm2_ar)){
                      }    foreach ($mm2_ar as $mm3){
                          echo "<tr><td>"; echo number_format(round((float)$mm3,0),0); echo "</tr></td>";
                      }
            
                      }                      
           ?>
           </tr> 
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>



     <td>
      <div class="col-sm">
      <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="2" style="text-align:center">P</th>
             </tr><tr>
             <th style="text-align:center">m/(N+1)</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
            <tr> 
             <?php

                    for ($mm = 1; $mm <= $datah; $mm++) {
                      
                      $mm2= $mm;
                      $mm2_ar = explode(', ', $mm2);
                      
                      //var_dump($mm2_ar);

                      if (is_array($mm2_ar) || is_object($mm2_ar)){
                      }    foreach ($mm2_ar as $mm3){
                        $mm4 = $mm3/($datah+1);
                        
                          echo "<tr><td>"; echo number_format(round((float)$mm4,3),3); echo "</tr></td>";
                          
                        }
                        
                      }        
                      
           ?>
           </tr> 
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>


<!-- ===============================================================================================
<div class="col-sm">
       <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>                  
             <tr>
               <th style="text-align:center">P(x<)</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
             
             
             <?php
              for ($mm = 1; $mm <= $datah; $mm++) {
                      
                $mm2= $mm;
                $mm2_ar = explode(', ', $mm2);
              
              for ($p3 = 0; $p3 < count ($mm2_ar); $p3++){ 
                $hasilpy= 1-($mm2_ar[$p3]/($datah+1));
              
                //echo "<br>";
                //echo $hasilpx; 
                    echo "<tr><td>"; echo number_format(round((float)$hasilpy,2),2); echo "</tr></td>";
                }
              }
            
           ?>
            
           </tbody>
         </table>
         </div>
     </div>


<div class="col-sm">
       <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>                  
             <tr>
               <th style="text-align:center">f(t)</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
             
             
             <?php
              // 
              for($xi=0; $xi < count($payload); $xi++){
                $ft= ($payload[$xi]-$rata)/$Sd3;
                echo "<tr><td>"; echo number_format(round((float)$ft,2),2); echo "</tr></td>";
            }
                 
           ?>
            
           </tbody>
         </table>
         </div>
     </div>


<div class="col-sm">
       <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>                  
             <tr>
               <th style="text-align:center">p'(x)</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
             
             
             <?php
              for ($mm = 1; $mm <= $datah; $mm++) {
                      
                $mm2= $mm;
                $mm2_ar = explode(', ', $mm2);
              
              for ($p3 = 0; $p3 < count ($mm2_ar); $p3++){ 
                $px3= $mm2_ar[$p3]/($datah-1);
              
                //echo "<br>";
                //echo $hasilpx; 
                    echo "<tr><td>"; echo number_format(round((float)$px3,2),2); echo "</tr></td>";
                }
              }
                 
           ?>
            
           </tbody>
         </table>
         </div>
     </div>


<div class="col-sm">
       <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>                  
             <tr>
               <th style="text-align:center">p'(x<)</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
             
             
             <?php
              for ($mm = 1; $mm <= $datah; $mm++) {
                      
                $mm2= $mm;
                $mm2_ar = explode(', ', $mm2);
              
              for ($p3 = 0; $p3 < count ($mm2_ar); $p3++){ 
                $px4= 1-($mm2_ar[$p3]/($datah-1));
              
                //echo "<br>";
                //echo $hasilpx; 
                    echo "<tr><td>"; echo number_format(round((float)$px4,2),2); echo "</tr></td>";
                }
              }
            
           ?>
            
           </tbody>
         </table>
         </div>
     </div>



<div class="col-sm">
       <div class="table-responsive">
         <table id="example1" class="table table-bordered table-striped">
           <thead>                  
             <tr>
               <th style="text-align:center">D</th>
             </tr>
           </thead>
           <tbody style="text-align:center">
             
             
             <?php
              for ($mm = 1; $mm <= $datah; $mm++) {
                      
                $mm2= $mm;
                $mm2_ar = explode(', ', $mm2);
              
              for ($p3 = 0; $p3 < count ($mm2_ar); $p3++){ 
                $px5= (1-($mm2_ar[$p3]/($datah+1))) - (1-($mm2_ar[$p3]/($datah-1)));
              
                //echo "<br>";
                //echo $hasilpx; 
                    echo "<tr><td>"; echo number_format(round((float)$px5,3),3); echo "</tr></td>";
                }
              }
            
           ?>
            
           </tbody>
         </table>
         </div>
     </div>
     ============================================================================================================================ -->

    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 1 )</th>
                </tr><tr>
                <th style="text-align:center"> P(x<) </th>
             </tr>
           </thead>
           <tbody style="text-align:center">           
            <tr>
            <?php
            // Thomas S. Ferguson is a Professor in the Department of Mathematics and the Department of Statistics at the University of California at Los Angeles.
            //Mailing Address:
            //UCLA Department of Mathematics
            //520 Portola Plaza, Suite 6363
            //Los Angeles, CA 90095-1555
            //e-mail: tom@math.ucla.edu

            // Normal Distribution Function
            // https://www.math.ucla.edu/~tom/distributions/normal.html
            function normalcdf($XX){   //HASTINGS.  MAX ERROR = .000001
              $T=1/(1+0.2316419*abs($XX));
              $D=0.3989423*exp(-$XX*$XX/2);
              $Prob=$D*$T*(0.3193815+$T*(-0.3565638+$T*(1.781478+$T*(-1.821256+$T*1.330274))));

              if ($XX > 0) {
                $Prob=1-$Prob;
              }
              return $Prob;
            }   

            
            for($x=0; $x < count($payload); $x++){
              $datanya = $payload[$x];
            
                if ($SD<0) {
                  echo "The standard deviation must be nonnegative.";
                } else if ($SD == 0) {
                    if ($datanya < $rata){
                        $Prob=0;
                    } else {
                      $Prob=1;
                  }
                } else {
                  $Prob=normalcdf(($datanya-$rata)/$SD);
                  echo "<tr><td>"; echo number_format(round((float)$Prob,3),3); echo "</tr></td>";
                  
                }
              }
               
            ?>
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>


    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 1 )</th>
                </tr><tr>
                <th style="text-align:center"> Do </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>  
           <?php 
            
                  
            $mm5=[];
            
            for ($mm = 1; $mm <= $datah; $mm++) {
                                    
              $mm2= $mm;
              $mm2_ar = explode(', ', $mm2);

              if (is_array($mm2_ar) || is_object($mm2_ar)){
              }  foreach ($mm2_ar as $mm3){
                
                $mm5[] = $mm3/($datah+1);
                
              }
            }
            
            
            $Prob2=[];
            for($x=0; $x < count($payload); $x++){
                  $datanya = $payload[$x];
                  
                    if ($SD<0) {
                      echo "The standard deviation must be nonnegative.";
                    } else if ($SD == 0) {
                        if ($datanya < $rata){
                            $Prob2=0;
                        } else {
                          $Prob2=1;
                      }
                    } else {
                      $Prob2[]=normalcdf(($datanya-$rata)/$SD);                
                
              }   
            }
          

            for ($mm = 0; $mm < $datah; $mm++) {
  
            $mm2= $mm;
            $mm2_ar = explode(', ', $mm2);

            if (is_array($mm2_ar) || is_object($mm2_ar)){
            }    foreach ($mm2_ar as $mm3){
            
            $do1 = abs($mm5[$mm3]-$Prob2[$mm3]);
            $do1_pem = number_format(round((float)$do1,3),3);
            $do1_pem2[] = number_format(round((float)$do1,3),3);
            $arr2 = str_split($do1_pem, 5);
            $do1max = max(($do1_pem2));
          //print_r ($arr2);
            echo "<tr><td>"; echo $do1_pem;  echo "</tr></td>";
            }
          }   

            ?>

            
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>



    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 2 )</th>
                </tr><tr>
                <th style="text-align:center"> P(x<) </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>
           <!-- FORMULAJS 
           Sumber : https://formulajs.info/

           ================ LOG NORMAL DIST FUNCTION ============== -->
         <?php
/*
          for($x=0; $x < count($payload); $x++){
            $datanya = $payload[$x];
         ?>

          <script type="text/javascript">
           
           var rata2 = "<?php echo $rata2; ?>";           
           var Sd2 = "<?php echo $Sd2; ?>";  
           var datanya = "<?php echo $datanya; ?>";                     
           var lnd = formulajs.LOGNORMDIST(datanya, rata2, Sd2, true);
           var pem_lnd = lnd.toFixed(3);          
            
           document.write ("<tr><td>");  document.write(pem_lnd); document.write ("</tr></td>");

          </script>

        <?php    
        
            }
          ;
        */
          
          function erf(float $x): float
          {
              if ($x == 0) {
                  return 0;
              }

              $p  = 0.3275911;
              $t  = 1 / ( 1 + $p * \abs($x) );

              $a₁ = 0.254829592;
              $a₂ = -0.284496736;
              $a₃ = 1.421413741;
              $a₄ = -1.453152027;
              $a₅ = 1.061405429;

              $error = 1 - ( $a₁ * $t + $a₂ * $t ** 2 + $a₃ * $t ** 3 + $a₄ * $t ** 4 + $a₅ * $t ** 5 ) * \exp(-\abs($x) ** 2);

              return ( $x > 0 ) ? $error : -$error;
          }

          
          for($xa=0; $xa < count($payload); $xa++){
            $datanya = $payload[$xa];
            //echo $datanya;
              $μ         = $rata2;   // scale parameter
              $σ         = $Sd2;   // location parameter
              $x         = $datanya;

              $⟮ln x − μ⟯ = \log($x) - $μ;
              $√2σ       = \sqrt(2) * $σ;

              $logNormal = 1 / 2 + 1 / 2 * erf($⟮ln x − μ⟯ / $√2σ);
              
        echo "<tr><td>"; echo number_format(round((float)$logNormal,3),3); echo "</tr></td>";
        }  
        
        ?>

             
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>


    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 2 )</th>
                </tr><tr>
                <th style="text-align:center"> Do </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>  

            <?php 

        $logNormal2= [];
        for($xa=0; $xa < count($payload); $xa++){
          $datanya = $payload[$xa];
          //echo $datanya;
            $μ         = $rata2;   // scale parameter
            $σ         = $Sd2;   // location parameter
            $x         = $datanya;

            $⟮ln x − μ⟯ = \log($x) - $μ;
            $√2σ       = \sqrt(2) * $σ;

            $logNormal2[] = 1 / 2 + 1 / 2 * erf($⟮ln x − μ⟯ / $√2σ);
        }  
           for ($mm = 0; $mm < $datah; $mm++) {
  
            $mm2= $mm;
            $mm2_ar = explode(', ', $mm2);

            if (is_array($mm2_ar) || is_object($mm2_ar)){
            }    foreach ($mm2_ar as $mm3){
            
            $do2 = abs($mm5[$mm3]-$logNormal2[$mm3]);
            $do2_pem = number_format(round((float)$do2,3),3);
            $do2_pem2[] = number_format(round((float)$do2,3),3);
            $arr3 = str_split($do2_pem, 5);
            $do2max = max(($do2_pem2));
          //print_r ($arr2);
            echo "<tr><td>"; echo $do2_pem;  echo "</tr></td>";
            }
          }   
        
            ?>
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
    </td>



    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 3 )</th>
                </tr><tr>
                <th style="text-align:center"> P(x<) </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>  
           <?php 
  
           for($xi=0; $xi < count($payload); $xi++){
            $datanya = $payload[$xi];
            
            // REFERENSI GUMBELDIST :
            // ANALISIS FREKUENSI DALAM BIDANG SUMBER DAYA AIR                    
            // MENGGUNAKAN PROGRAM EXCEL                                 
            // VISUAL BASIC FOR APPLICATION                                
            // Anang Kurniawan   
            // Dosen Pembimbing : Ir.Djoko Luknanto,M.Sc,Ph.D. 
            
            $alpha2 = 2.4495 * $SD / pi();
            $U2 = $rata - (0.5772 * $alpha2);
            $Yy = ($datanya - $U2) / $alpha2;
            $GUMBELDIST = exp(-(exp(-$Yy)));

            echo "<tr><td>"; echo number_format(round((float)$GUMBELDIST,3),3); echo "</tr></td>";
        }
        
            ?>
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>


    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 3 )</th>
                </tr><tr>
                <th style="text-align:center"> Do </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>  
           <?php 
           $GUMBELDIST2 = [];
           for($xi=0; $xi < count($payload); $xi++){
            $datanya = $payload[$xi];
            
            // REFERENSI GUMBELDIST :
            // ANALISIS FREKUENSI DALAM BIDANG SUMBER DAYA AIR                    
            // MENGGUNAKAN PROGRAM EXCEL                                 
            // VISUAL BASIC FOR APPLICATION                                
            // Anang Kurniawan   
            // Dosen Pembimbing : Ir.Djoko Luknanto,M.Sc,Ph.D. 
            
            $alpha2 = 2.4495 * $SD / pi();
            $U2 = $rata - (0.5772 * $alpha2);
            $Yy = ($datanya - $U2) / $alpha2;
            $GUMBELDIST2[] = exp(-(exp(-$Yy)));

           }

           for ($mm = 0; $mm < $datah; $mm++) {
  
            $mm2= $mm;
            $mm2_ar = explode(', ', $mm2);

            if (is_array($mm2_ar) || is_object($mm2_ar)){
            }    foreach ($mm2_ar as $mm3){
            
            $do3 = abs($mm5[$mm3]-$GUMBELDIST2[$mm3]);
            $do3_pem = number_format(round((float)$do3,3),3);
            $do3_pem2[] = number_format(round((float)$do3,3),3);
            $arr4 = str_split($do3_pem, 5);
            $do3max = max(($do3_pem2));
          //print_r ($arr2);
            echo "<tr><td>"; echo $do3_pem;  echo "</tr></td>";
            }
          }  

            ?>
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
    </td>




    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 4 )</th>
                </tr><tr>
                <th style="text-align:center"> P(x<) </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
           <tr>  
           <?php 
           
           // Load tabulated values in an array
           require "ndist_tabulated.php" ;
          $logpearsondist= [];
           for($xh=0; $xh < count($payload); $xh++){
            $datanya = $payload[$xh];
            
            
            // REFERENSI LOGPERSONDIST :
            // ANALISIS FREKUENSI DALAM BIDANG SUMBER DAYA AIR                    
            // MENGGUNAKAN PROGRAM EXCEL                                 
            // VISUAL BASIC FOR APPLICATION                                
            // Anang Kurniawan   
            // Dosen Pembimbing : Ir.Djoko Luknanto,M.Sc,Ph.D.

            //fungsi LOGPEARSONDIST digunakan untuk menghitung probabilitas dari nilai Y dengan menggunakan Distribusi
            //log-Pearson Tipe III apabila diketahui : nilai Y, rerata, simpangan baku

            //I. Hitung nilai KT (lihat Pers. 2.38)
                $KTa = (log($datanya) - $rata2) / $Sd2;
                
            //II.a. Hitung nilai K (lihat Pers. 2.36)
                $Ka = $Cs2 / 6;

            //II.b. Hitung Z dengan menggunakan metode Newton-Rhapson (lihat Pers. 2.39, 2.40, 2.41)
                $za = 0.001;  //Nilai Z trial pertama

                $za2= pow($za,2);
                $za3= pow($za,3);
                $Ka2= pow($Ka,2);
                $Ka3= pow($Ka,3);
                $Ka4= pow($Ka,4);
                $Ka5= pow($Ka,5);

                
                do {
                  $FZ = $za + ($za2 - 1) * $Ka + ($za3 - 6 * $za) * $Ka2 / 3 - ($za2 - 1) * $Ka3 + $za * $Ka4 + $Ka5 / 3 - $KTa;
                  $FZi = 1 + 2 * $Ka * $za + $Ka2 * $za2 - 2 * $Ka2 - 2 * $Ka3 * $za + $Ka4;
                  $deltaZ = $FZ / $FZi;
                  $za = $za - $deltaZ;
                  
                } while ((abs($deltaZ)) < 0.001);  
                //echo $za;  
                  
                // Discriminate upon the absolute value, then the sign of $x
                
                if ( abs( $za ) >= 3.09 ) {
                  
                  $logpearsondist = 0 ;
                    
                } elseif ( $za==0 ) {
                  
                  $logpearsondist = 0.5 ;
                    
                } elseif ( $za<0 ) {
              
                  // find higher boundary (next highest value with 2 decimals)
                  $x2 = number_format( ceil( 100*$za )/100, 2 ) ;
                  //$x2 = (string)$x2 ;
                  
                  // find lower boundary
                  $x1 = number_format( $x2-0.01, 2 ) ;
                  //$x1 = (string)$x1 ;
              
                  // linear interpolate
                  $logpearsondist = $values[$x1] + ( $values[$x2] - $values[$x1] )/0.01*( $za - $x1 ) ;
                  
                } else {		// if x>0
                
                  $logpearsondist = 1 - normsdist( -$za ) ;
                  
                }
                //return number_format( $output, 4 ) ;
                echo "<tr><td>"; echo number_format(round((float)$logpearsondist,3),3); echo "</tr></td>";

              }           
             
          // III. Hitung probabilitas dengan Dist. Normal Standar N(0,1)
                function normsdist( $z ) {

                  // Returns the standard normal cumulative distribution
                  // ---------------------------------------
                  
                  // Load tabulated values in an array
                  require "ndist_tabulated.php" ;
                  
                  // Discriminate upon the absolute value, then the sign of $x
                  
                  if ( abs( $z ) >= 3.09 ) {
                    
                    $logpearsondist2 = 0 ;
                      
                  } elseif ( $z==0 ) {
                    
                    $logpearsondist2 = 0.5 ;
                      
                  } elseif ( $z<0 ) {
                
                    // find higher boundary (next highest value with 2 decimals)
                    $x2 = number_format( ceil( 100*$z )/100, 2 ) ;
                    //$x2 = (string)$x2 ;
                    
                    // find lower boundary
                    $x1 = number_format( $x2-0.01, 2 ) ;
                    //$x1 = (string)$x1 ;
                
                    // linear interpolate
                    $logpearsondist2 = $values[$x1] + ( $values[$x2] - $values[$x1] )/0.01*( $z - $x1 ) ;
                    
                  } else {		// if x>0
                  
                    $logpearsondist2 = 1 - normsdist( -$z ) ;
                    
                  }
                  return number_format( $logpearsondist2, 4 ) ;
                   
                }
          
        ?>
        
           </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td>


    <td>
     <div class="col-sm">
     <div class="card shadow mb-4">
      <div class="card-body">
       <div class="table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>                  
             <tr>
             <th colspan="4" style="text-align:center">( 4 )</th>
                </tr><tr>
                <th style="text-align:center"> Do </th>
             </tr>
           </thead>
           <tbody style="text-align:center">
            <tr> 
           <?php 

            // Load tabulated values in an array
            require "ndist_tabulated.php" ;
            $logpearsondist3= [];
            for($xh=0; $xh < count($payload); $xh++){
              $datanya = $payload[$xh];
              
              
              // REFERENSI LOGPERSONDIST :
              // ANALISIS FREKUENSI DALAM BIDANG SUMBER DAYA AIR                    
              // MENGGUNAKAN PROGRAM EXCEL                                 
              // VISUAL BASIC FOR APPLICATION                                
              // Anang Kurniawan   
              // Dosen Pembimbing : Ir.Djoko Luknanto,M.Sc,Ph.D.

              //fungsi LOGPEARSONDIST digunakan untuk menghitung probabilitas dari nilai Y dengan menggunakan Distribusi
              //log-Pearson Tipe III apabila diketahui : nilai Y, rerata, simpangan baku

              //I. Hitung nilai KT (lihat Pers. 2.38)
                  $KTa = (log($datanya) - $rata2) / $Sd2;
                  
              //II.a. Hitung nilai K (lihat Pers. 2.36)
                  $Ka = $Cs2 / 6;

              //II.b. Hitung Z dengan menggunakan metode Newton-Rhapson (lihat Pers. 2.39, 2.40, 2.41)
                  $za = 0.001;  //Nilai Z trial pertama

                  $za2= pow($za,2);
                  $za3= pow($za,3);
                  $Ka2= pow($Ka,2);
                  $Ka3= pow($Ka,3);
                  $Ka4= pow($Ka,4);
                  $Ka5= pow($Ka,5);

                  
                  do {
                    $FZ = $za + ($za2 - 1) * $Ka + ($za3 - 6 * $za) * $Ka2 / 3 - ($za2 - 1) * $Ka3 + $za * $Ka4 + $Ka5 / 3 - $KTa;
                    $FZi = 1 + 2 * $Ka * $za + $Ka2 * $za2 - 2 * $Ka2 - 2 * $Ka3 * $za + $Ka4;
                    $deltaZ = $FZ / $FZi;
                    $za = $za - $deltaZ;
                    
                  } while ((abs($deltaZ)) < 0.001);  
                  //echo $za;  
                    
                  // Discriminate upon the absolute value, then the sign of $x
                
                  if ( abs( $za ) >= 3.09 ) {
                    
                    $logpearsondist3[] = 0 ;
                      
                  } elseif ( $za==0 ) {
                    
                    $logpearsondist3[] = 0.5 ;
                      
                  } elseif ( $za<0 ) {
                
                    // find higher boundary (next highest value with 2 decimals)
                    $x2 = number_format( ceil( 100*$za )/100, 2 ) ;
                    //$x2 = (string)$x2 ;
                    
                    // find lower boundary
                    $x1 = number_format( $x2-0.01, 2 ) ;
                    //$x1 = (string)$x1 ;
                
                    // linear interpolate
                    $logpearsondist3[] = $values[$x1] + ( $values[$x2] - $values[$x1] )/0.01*( $za - $x1 ) ;
                    
                  } else {		// if x>0
                  
                    $logpearsondist3[] = 1 - normsdist( -$za ) ;
                    
                  }
                  //return number_format( $output, 4 ) ;
                  //echo "<tr><td>"; echo number_format(round((float)$logpearsondist,3),3); echo "</tr></td>";

                }  

          //$arr5=[];
           for ($mm = 0; $mm < $datah; $mm++) {
  
            $mm2= $mm;
            $mm2_ar = explode(', ', $mm2);

            if (is_array($mm2_ar) || is_object($mm2_ar)){
            }    foreach ($mm2_ar as $mm3){
            $do4 = abs($mm5[$mm]-($logpearsondist3[$mm3]));
            $do4_pem = number_format(round((float)$do4,3),3);
            $do4_pem2[] = number_format(round((float)$do4,3),3);
            $arr5 = str_split($do4_pem, 5);
            //echo $do4_pem;
            $do4max = max(($do4_pem2));
            //print_r ($arr5);
            echo "<tr><td>"; echo $do4_pem;  echo "</tr></td>";
            }
          } 

            ?>
         </tr>
           </tbody>
         </table>
         </div>
     </div>
     </div>
     </div>
     </td> 

</tr>
</table>
</div>
</div>
</div>
</div>







</div>
<!-- Dmax Smirnov Kolmogorov-->
<?php

  $dmax_ar = explode(', ', $px5);
  $dmax= max($dmax_ar);

  if( $datah == 5) {
    $dkritis= 0.56;
  }if( $datah == 10) {
    $dkritis= 0.41;
  }if( $datah == 15) {
    $dkritis= 0.34;
  }if( $datah == 20) {
    $dkritis= 0.29;
  }if( $datah == 25) {
    $dkritis= 0.27;
  }if( $datah == 30) {
    $dkritis= 0.24;
  }if( $datah == 35) {
    $dkritis= 0.23;
  }if( $datah == 40) {
    $dkritis= 0.21;
  }if( $datah == 45) {
    $dkritis= 0.2;
  }if( $datah == 50) {
    $dkritis= 0.19;
  }if( $datah > 50) {
    $dkritis= 1.36/(sqrt($datah));
  }
  ?>

  <div class="container">
  <div class="row">
  <div class="col-sm">
  
  <?php
  //print_r ($do4max);
  echo "<b>Hasil Perhitungan :"; echo "</b><br>";
  echo "( 1 ) Distribusi Normal
      <br> D max = "; echo ($do1max); echo "<br>";
  echo "( 2 ) Distribusi Log Normal
      <br> D max = "; echo ($do2max); echo "<br>";
  echo "( 3 ) Distribusi Gumbel
      <br> D max = "; echo ($do3max); echo "<br>";
  echo "( 4 ) Distribusi Log Person III
      <br> D max = "; echo ($do4max); echo "<br></br>";
  //echo "<b>D max = "; echo number_format(round((float)$dmax,3),3); echo "</b>";
  //echo "<br>";
  echo "D max harus kurang dari D kritis."; echo "<br>";
  echo "<b>D kritis = "; echo number_format(round((float)$dkritis,3),3); echo " (Tabel D kritis untuk Uji Smirnov Kolmogorov)"; echo "</b>";
  echo "<br></br>";

  echo "<b>Uji Smirnov Kolmogorov :</b>"; echo "<br>";
  if( $do1max < $dkritis) {
    echo "( 1 ) Distribusi normal <b>diterima</b>.<br>";
  }else{
    echo "( 1 ) Distribusi normal <b>tidak memenuhi</b>.<br>";
  };

  if( $do2max < $dkritis) {
    echo "( 2 ) Distribusi log normal <b>diterima</b>.<br>";
  }else{
    echo "( 2 ) Distribusi log normal <b>tidak memenuhi</b>.<br>";
  };

  if( $do3max < $dkritis) {
    echo "( 3 ) Distribusi gumbel <b>diterima</b>.<br>";
  }else{
    echo "( 3 ) Distribusi gumbel <b>tidak memenuhi</b>.<br>";
  };

  if( $do4max < $dkritis) {
    echo "( 4 ) Distribusi log person III <b>diterima</b>.";
  }else{
    echo "( 4 ) Distribusi log person III <b>tidak memenuhi</b>.";
  };
  ?>
  </div>
  </div>
  </div>
  


</div>

<div class="container">
      <div class="row">
        <div class="col-sm">

    <br></br>

        <div class="container">
            <div class="row">
              <div class="col-sm">
                <h1 class="h3 mb-2 text-gray-800">Rekapitulasi</h1>
                <p class="mb-4">Berikut rekapitulasi perhitungan sebagai dasar pemilihan distribusi hujan</a>.</p>
                </div>
              </div>
            </div>


        <div class="card col-md-20 shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="vertical-align : middle; text-align:center">Distribusi Hujan</th>
                    <th style="vertical-align : middle; text-align:center">Pilih Distribusi</th>
                    <th style="vertical-align : middle; text-align:center">Chi Kuadrat</th>
                    <th style="vertical-align : middle; text-align:center">Smirnov Kolmogorov</th>
                    <th style="vertical-align : middle; text-align:center">Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $dmax_ar2 = [$do1max, $do2max, $do3max, $do4max];
                  $dmaxmin = min($dmax_ar2);
                  //echo $dmaxmin;

                  ?>
                  <tr style="text-align:center">
                    <td>Normal</td>
                    <td> <?php echo $normalket; ?></td>
                    <td> <?php echo number_format(round((float)$squtotal1,4),4); ?> </td>
                    <td> <?php echo $do1max; ?> </td>
                    <td> <?php 
                    if($squtotal1 < $CI1 && $do1max == $dmaxmin){
                    $rekap1 = "<b>Dipilih</b>";
                    }else{
                    $rekap1 = "-";
                    }
                    echo $rekap1;
                    ?> </td>
                  </tr>

                  <tr style="text-align:center">
                    <td>Log Normal</td>
                    <td> <?php echo $lognket; ?></td>
                    <td> <?php echo number_format(round((float)$squtotal11,4),4); ?> </td>
                    <td> <?php echo $do2max; ?> </td>
                    <td> <?php 
                    if($squtotal11 < $CI11 && $do2max == $dmaxmin){
                      $rekap2 = "<b>Dipilih</b>";
                      }else{
                      $rekap2 = "-";
                      }
                      echo $rekap2;
                    ?> </td>
                  </tr>

                  <tr style="text-align:center">                   
                    <td>Gumbel</td>
                    <td> <?php echo $gumbelket; ?> </td>
                    <td> <?php echo number_format(round((float)$squtotal21,4),4); ?> </td>
                    <td> <?php echo $do3max; ?> </td>
                    <td> <?php 
                    if($squtotal21 < $CI21 && $do3max == $dmaxmin){
                      $rekap3 = "<b>Dipilih</b>";
                      }else{
                      $rekap3 = "-";
                      }
                      echo $rekap3;
                    ?> </td>
                  </tr>

                  <tr style="text-align:center"> 
                    <td style="text-align:center">Log Person III</td>
                    <td> <?php echo $logn3ket; ?> </td>
                    <td> <?php echo number_format(round((float)$squtotal31,4),4); ?> </td>
                    <td> <?php echo $do4max; ?> </td>
                    <td> <?php 
                    if($squtotal31 < $CI31 && $do4max == $dmaxmin){
                      $rekap4 = "<b>Dipilih</b>";
                      }else{
                      $rekap4 = "-";
                      }
                      echo $rekap4;
                    ?> </td>
                  </tr>

                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div> 
    </div>
    </div>






</body>
</html>
