<?php
        $datah = $_POST["jml_data"];
        $payload = $_POST["datah"];
        
        //sum data yang diinputkan (sum Xi)
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

        //program mengitung Xi-X
        for($xi=0; $xi < count($payload); $xi++){
            $hasilxi= $payload[$xi]-$rata;
            // echo number_format(round((float)$hasilxi,2),3)."<br>";
        }

        //program menghitung (Xi-X)^2
        for($xi2=0; $xi2 < count($payload); $xi2++){
            $hasilxi2= pow(($payload[$xi2]-$rata),2);
            // echo number_format(round((float)$hasilxi2,2),3)."<br>";
        }

        //program menghitung (Xi-X)^3
        for($xi3=0; $xi3 < count($payload); $xi3++){
            $hasilxi3= pow(($payload[$xi3]-$rata),2);
            // echo number_format(round((float)$hasilxi3,2),3)."<br>";
        }

        //program menghitung (Xi-X)^4
        for($xi4=0; $xi4 < count($payload); $xi4++){
            $hasilxi4= pow(($payload[$xi4]-$rata),2);
            // echo number_format(round((float)$hasilxi4,2),3)."<br>";
        }

        //menghitung nilai sum xi-x
        for($sumx=0; $sumx<count($payload); $sumx++){
            $sumxi[]= ($payload[$sumx]-$rata);
        }
        $sumxix = array_sum($sumxi);

        //menghitung nilai sum pangkat 2
        for($f=0; $f<count($payload); $f++){
            $l[]= pow(($payload[$f]-$rata),2);
        }
        $sum2 = array_sum($l);

        //menghitung nilai sum xi-x pangkat3
        for($sumx3=0; $sumx3<count($payload); $sumx3++){
            $sumxi3[]= pow(($payload[$sumx3]-$rata),3);
        }
        $sumxix3= array_sum($sumxi3);

        //menghitung nilai sum xi-x pangkat3
        for($sumx4=0; $sumx4<count($payload); $sumx4++){
            $sumxi4[]= pow(($payload[$sumx4]-$rata),4);
        }
        $sumxix4= array_sum($sumxi4);

        //menghitung nilai SD
        $SD = sqrt($sum2/($datah-1));
        //mencari nilai CS
            $pSD = pow($SD,3);
            //part mencari CS 
            $cs = $datah*($sumxix3/(($datah-1)*($datah-2)*$pSD));
            // echo "<br> <br> Hasil nilai CS: "; echo $cs;
        
        //mencari nilai Ck
            $pemSD = pow($SD,4);    
            $pemn = pow(($datah-1),2);
            //$ck = ((pow($datah,2))*($sumxix4/(($datah-1)*($datah-2)*$pemSD)));
            $ck =(($datah*($datah+1))/(($datah-1)*($datah-2)*($datah-3))*($sumxix4/$pemSD))-((3*$pemn)/(($datah-2)*($datah-3)));
            
        
        //mencari nilai Cv
            $cv = $SD/$rata;

        //menghitung syarat
        
        //syarat cs normal
        
?>


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
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$jumlah,2),2); ?></th>
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
                      <th style="text-align:center">Xi - X</th>

                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>
                    <?php
                        if (is_array($sumxi) || is_object($sumxi)){                     
                        }    foreach ($sumxi as $tes){
                            echo "<tr><td>";  echo number_format(round((float)$tes,2),2); echo "</tr></td>";
                        }
                        
                  ?>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumxix,2),2); ?></th>
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
                      <th style="text-align:center">(Xi - X)<sup>2</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr> 
                    <?php
                        if (is_array($l) || is_object($l)){
                        }    foreach ($l as $xix2){
                            echo "<tr><td>";  echo number_format(round((float)$xix2,2),2); echo "</tr></td>";
                        }                        
                        
                  ?>
                  </tr> 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sum2,2),2); ?></th>
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
                      <th style="text-align:center">(Xi - X)<sup>3</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                        if (is_array($sumxi3) || is_object($sumxi3)){                         
                        }    foreach ($sumxi3 as $xix3){   
                            echo "<tr><td>";  echo number_format(round((float)$xix3,2),2); echo "</tr></td>";
                        }

                        
                  ?>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumxix3,2),2); ?></th>
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
                      <th style="text-align:center">(Xi - X)<sup>4</sup></th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center">
                  <tr>  
                    <?php
                        if (is_array($sumxi4) || is_object($sumxi4)){                          
                        }    foreach ($sumxi4 as $xix4){
                            echo "<tr><td>";  echo number_format(round((float)$xix4,2),2); echo "</tr></td>";                      
                        }
                        
                  ?>
                  </tr> 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="text-align:center"><?php echo number_format(round((float)$sumxix4,2),2); ?></th>
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
                    <th style="vertical-align : middle; text-align:center">Nilai Xrt</th>
                    <th style="vertical-align : middle; text-align:center">Nilai SD</th>
                    <th style="vertical-align : middle; text-align:center">Nilai Cs</th>
                    <th style="vertical-align : middle; text-align:center">Nilai Ck</th>
                    <th style="vertical-align : middle; text-align:center">Nilai Cv</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td style="text-align:center"> <?php echo $datah; ?> </td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$rata,4),4); ?> </td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$SD,4),4); ?></td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$cs,4),4); ?></td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$ck,4),4); ?></td>
                    <td style="text-align:center"> <?php echo number_format(round((float)$cv,4),4); ?></td>
                  </tr>
                  </tbody>
          </table>
          </div>
          </div>
        </div>   
      </div>
      </div>
      </div>
       
            

        
      
                          

