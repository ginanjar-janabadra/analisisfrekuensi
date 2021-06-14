<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curah Hujan Rancangan</title>
</head>
<body>

<?php
//SEBARAN NORMAL
    //Kt untuk Normal
    $Kt1= 0; //2 tahun
    $Kt2= 0.84; //5 tahun
    $Kt3= 1.28; //10 tahun
    $Kt4= 1.64; //20 tahun
    $Kt5= 2.05; //50 tahun
    $Kt6= 2.33; //100 tahun

$Xt1=$rata+$Kt1*$SD;
$Xt2=$rata+$Kt2*$SD;
$Xt3=$rata+$Kt3*$SD;
$Xt4=$rata+$Kt4*$SD;
$Xt5=$rata+$Kt5*$SD;
$Xta4=$Xt4+((($Xt5-$Xt4)/(50-20))*(25-20)); //25 tahun
$Xt6=$rata+$Kt6*$SD;


//SEBARAN LOG NORMAL
    //Kt untuk Log Normal
    $Kt7= -0.22; //2 tahun
    $Kt8= 0.64; //5 tahun
    $Kt9= 1.26; //10 tahun
    $Kt10= 1.89; //20 tahun
    $Kt11= 2.1; //25 tahun
    $Kt12= 2.75; //50 tahun
    $Kt13= 3.45; //100 tahun

$Xt7=exp($rata2+($Kt7*$Sd2));
$Xt8=exp($rata2+($Kt8*$Sd2));
$Xt9=exp($rata2+($Kt9*$Sd2));
$Xt10=exp($rata2+($Kt10*$Sd2));
$Xt11=exp($rata2+($Kt11*$Sd2));
$Xt12=exp($rata2+($Kt12*$Sd2));
$Xt13=exp($rata2+($Kt13*$Sd2));


//SEBARAN GUMBEL
    //Yt untuk Gumbel
    $Yt1= 0.3065; //2 tahun
    $Yt2= 1.4999; //5 tahun
    $Yt3= 2.2504; //10 tahun
    $Yt4= 2.9702; //20 tahun
    //$Yt5= 3.1985; //25 tahun
    $Yt6= 3.9019; //50 tahun
    $Yt7= 4.6001; //100 tahun

    //Sn dan Yn untuk Gumbel
    $datah = $_POST["jml_data"];
    if( $datah == 10) {
        $Sn= 0.9496;
        $Yn=0.4592;
    }if( $datah == 11) {
        $Sn=0.9676;
        $Yn=0.4999;
    }if( $datah == 12) {
        $Sn=0.9933;
        $Yn=0.5053;
    }if( $datah == 13) {
        $Sn=0.9971;
        $Yn=0.507;
    }if( $datah == 14) {
        $Sn=1.0095;
        $Yn=0.51;
    }if( $datah == 15) {
        $Sn=1.0206;
        $Yn=0.5128;
    }if( $datah == 16) {
        $Sn=1.0316;
        $Yn=0.5157;
    }if( $datah == 17) {
        $Sn=1.0411;
        $Yn=0.5181;
    }if( $datah == 18) {
        $Sn=1.0493;
        $Yn=0.5202;
    }if( $datah == 19) {
        $Sn=1.0565;
        $Yn=0.522;
    }if( $datah == 20) {
        $Sn=1.0628;
        $Yn=0.5236;
    }if( $datah == 21) {
        $Sn=1.0696;
        $Yn=0.5252;
    }if( $datah == 22) {
        $Sn=1.0754;
        $Yn=0.5258;
    }if( $datah == 23) {
        $Sn=1.0811;
        $Yn=0.5283;
    }if( $datah == 24) {
        $Sn=1.0864;
        $Yn=0.5296;
    }if( $datah == 25) {
        $Sn=1.0915;
        $Yn=0.5309;    
    }if( $datah == 26) {
        $Sn=1.1961;
        $Yn=0.532;           
    }if( $datah == 27) {
        $Sn=1.1004;
        $Yn=0.5332;    
    }if( $datah == 28) {
        $Sn=1.1047;
        $Yn=0.5343;    
    }if( $datah == 29) {
        $Sn=1.1086;
        $Yn=0.5353;    
    }if( $datah == 30) {
        $Sn=1.1124;
        $Yn=0.5362;    
    }if( $datah == 31) {
        $Sn=1.1159;
        $Yn=0.5371;    
    }if( $datah == 32) {
        $Sn=1.1193;
        $Yn=0.538;    
    }if( $datah == 33) {
        $Sn=1.1226;
        $Yn=0.5388;    
    }if( $datah == 34) {
        $Sn=1.1255;
        $Yn=0.5396;    
    }if( $datah == 35) {
        $Sn=1.1285;
        $Yn=0.5402;    
    }if( $datah == 36) {
        $Sn=1.1313;
        $Yn=0.541;    
    }if( $datah == 37) {
        $Sn=1.1339;
        $Yn=0.5418;    
    }if( $datah == 38) {
        $Sn=1.1363;
        $Yn=0.5424;    
    }if( $datah == 39) {
        $Sn=1.388;
        $Yn=0.543;    
    }if( $datah == 40) {
        $Sn=1.1413;
        $Yn=0.5436;    
    }if( $datah == 41) {
        $Sn=1.1436;
        $Yn=0.5442;    
    }if( $datah == 42) {
        $Sn=1.1458;
        $Yn=0.5448;    
    }if( $datah == 43) {
        $Sn=1.48;
        $Yn=0.5453;    
    }if( $datah == 44) {
        $Sn=1.1499;
        $Yn=0.5458;    
    }if( $datah == 45) {
        $Sn=1.1519;
        $Yn=0.5463;    
    }if( $datah == 46) {
        $Sn=1.1538;
        $Yn=0.5468;    
    }if( $datah == 47) {
        $Sn=1.1557;
        $Yn=0.5473;    
    }if( $datah == 48) {
        $Sn=1.1574;
        $Yn=0.5477;    
    }if( $datah == 49) {
        $Sn=1.159;
        $Yn=0.5481;    
    }if( $datah == 50) {
        $Sn=1.1607;
        $Yn=0.5485;
    }if( $datah == 51) {
        $Sn=1.1623;
        $Yn=0.5489;
    }if( $datah == 52) {
        $Sn=1.1638;
        $Yn=0.5493;
    }if( $datah == 53) {
        $Sn=1.1658;
        $Yn=0.5497;
    }if( $datah == 54) {
        $Sn=1.1667;
        $Yn=0.5501;
    }if( $datah == 55) {
        $Sn=1.1681;
        $Yn=0.5504;
    }if( $datah == 56) {
        $Sn=1.1696;
        $Yn=0.5508;
    }if( $datah == 57) {
        $Sn=1.1708;
        $Yn=0.5511;
    }if( $datah == 58) {
        $Sn=1.1721;
        $Yn=0.5518;
    }if( $datah == 59) {
        $Sn=1.1734;
        $Yn=0.5519;
    }if( $datah == 60) {
        $Sn=1.1747;
        $Yn=0.5521;
    }if( $datah == 61) {
        $Sn=1.1759;
        $Yn=0.5524;
    }if( $datah == 62) {
        $Sn=1.177;
        $Yn=0.5527;
    }if( $datah == 63) {
        $Sn=1.1782;
        $Yn=0.553;
    }if( $datah == 64) {
        $Sn=1.1793;
        $Yn=0.5533;
    }if( $datah == 65) {
        $Sn=1.1803;
        $Yn=0.5535;
    }if( $datah == 66) {
        $Sn=1.1814;
        $Yn=0.5538;
    }if( $datah == 67) {
        $Sn=1.1824;
        $Yn=0.554;
    }if( $datah == 68) {
        $Sn=1.1834;
        $Yn=0.5543;
    }if( $datah == 69) {
        $Sn=1.1844;
        $Yn=0.5545;
    }if( $datah == 70) {
        $Sn=1.1854;
        $Yn=0.5548;
    }if( $datah == 71) {
        $Sn=1.1863;
        $Yn=0.555;
    }if( $datah == 72) {
        $Sn=1.1873;
        $Yn=0.5552;
    }if( $datah == 73) {
        $Sn=1.1881;
        $Yn=0.5555;
    }if( $datah == 74) {
        $Sn=1.189;
        $Yn=0.5557;
    }if( $datah == 75) {
        $Sn=1.1898;
        $Yn=0.5559;
    }if( $datah == 76) {
        $Sn=1.1906;
        $Yn=0.5561;
    }if( $datah == 77) {
        $Sn=1.1915;
        $Yn=0.5563;
    }if( $datah == 78) {
        $Sn=1.1923;
        $Yn=0.5565;
    }if( $datah == 79) {
        $Sn=1.193;
        $Yn=0.5567;
    }if( $datah == 80) {
        $Sn=1.1938;
        $Yn=0.5569;
    }if( $datah == 81) {
        $Sn=1.1945;
        $Yn=0.557;
    }if( $datah == 82) {
        $Sn=1.1953;
        $Yn=0.5572;
    }if( $datah == 83) {
        $Sn=1.1959;
        $Yn=0.5574;
    }if( $datah == 84) {
        $Sn=1.1967;
        $Yn=0.5576;
    }if( $datah == 85) {
        $Sn=1.1973;
        $Yn=0.5578;
    }if( $datah == 86) {
        $Sn=1.198;
        $Yn=0.558;
    }if( $datah == 87) {
        $Sn=1.1987;
        $Yn=0.5581;
    }if( $datah == 88) {
        $Sn=1.1994;
        $Yn=0.5583;
    }if( $datah == 89) {
        $Sn=1.2001;
        $Yn=0.5585;
    }if( $datah == 90) {
        $Sn=1.2007;
        $Yn=0.5586;
    }if( $datah == 91) {
        $Sn=1.2013;
        $Yn=0.5587;
    }if( $datah == 92) {
        $Sn=1.2020;
        $Yn=0.5589;
    }if( $datah == 93) {
        $Sn=1.2026;
        $Yn=0.5591;
    }if( $datah == 94) {
        $Sn=1.2032;
        $Yn=0.5592;
    }if( $datah == 95) {
        $Sn=1.2038;
        $Yn=0.5593;
    }if( $datah == 96) {
        $Sn=1.2044;
        $Yn=0.5595;
    }if( $datah == 97) {
        $Sn=1.2049;
        $Yn=0.5596;
    }if( $datah == 98) {
        $Sn=1.2055;
        $Yn=0.5598;
    }if( $datah == 99) {
        $Sn=1.206;
        $Yn=0.5599;
    }if( $datah == 100) {
        $Sn=1.2063;
        $Yn=0.56;
    }


$Xt14=$rata+(($SD/$Sn)*($Yt1-$Yn));
$Xt15=$rata+(($SD/$Sn)*($Yt2-$Yn));
$Xt16=$rata+(($SD/$Sn)*($Yt3-$Yn));
$Xt17=$rata+(($SD/$Sn)*($Yt4-$Yn));
$Xt19=$rata+(($SD/$Sn)*($Yt6-$Yn));
$Xt18=$Xt17+(($Xt19-$Xt17)/(50-20)*(25-20));
$Xt20=$rata+(($SD/$Sn)*($Yt7-$Yn));


//SEBARAN LOG PERSON TIPE III --> 
    //K untuk log person III untuk $Cs2
    if( $Cs2 == 3) {
        $ku1= -0.396; //2 tahun
        $ku2= 0.42; //5 tahun
        $ku3= 1.18; //10 tahun
        $ku5= 2.278; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 3.152; //50 tahun
        $ku7= 4.051; //100 tahun
    }if($Cs2 == 2.5) {
        $ku1= -0.36; //2 tahun
        $ku2= 0.518; //5 tahun
        $ku3= 1.25; //10 tahun
        $ku5= 2.262; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 3.048; //50 tahun
        $ku7= 3.845; //100 tahun
    }if($Cs2>2.5 && $Cs2<3) {
        $ku1= -0.396+(-0.36-(-0.396))/(2.5-3)*($Cs2-3);
        $ku2= 0.42+(0.518-0.42)/(2.5-3)*($Cs2-3);
        $ku3= 1.18+(1.25-1.18)/(2.5-3)*($Cs2-3);
        $ku5= 2.278+(2.262-2.278)/(1.18-1.25)*($ku3-1.25);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 3.152+(3.048-3.152)/(2.5-3)*($Cs2-3);
        $ku7= 4.051+(3.845-4.051)/(2.5-3)*($Cs2-3);
    }if($Cs2 == 2.2) {
        $ku1= -0.33; //2 tahun
        $ku2= 0.574; //5 tahun
        $ku3= 1.284; //10 tahun
        $ku5= 2.24; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.97; //50 tahun
        $ku7= 3.705; //100 tahun
    }if($Cs2>2.2 && $Cs2<2.5) {
        $ku1= -0.36+(-0.33-(-0.36))/(2.2-2.5)*($Cs2-2.5);
        $ku2= 0.574+(0.42-0.574)/(2.2-2.25)*($Cs2-2.5);
        $ku3= 1.25+(1.284-1.25)/(2.2-2.5)*($Cs2-2.5);
        $ku5= 2.262+(2.24-2.262)/(1.25-1.284)*($ku3-1.284);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 3.048+(2.97-3.048)/(2.2-2.5)*($Cs2-2.5);
        $ku7= 3.845+(3.705-3.845)/(2.2-2.5)*($Cs2-2.5);
    }if($Cs2 == 2) {
        $ku1= -0.307; //2 tahun
        $ku2= 0.609; //5 tahun
        $ku3= 1.302; //10 tahun
        $ku5= 2.219; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.912; //50 tahun
        $ku7= 3.605; //100 tahun
    }if($Cs2>2 && $Cs2<2.2) {
        $ku1= -0.33+(-0.307-(-0.33))/(2-2.2)*($Cs2-2.2);
        $ku2= 0.574+(0.609-0.574)/(2-2.2)*($Cs2-2.2);
        $ku3= 1.284+(1.302-1.284)/(2-2.2)*($Cs2-2.2);
        $ku5= 2.24+(2.219-2.224)/(2-2.2)*($Cs2-2.2);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.97+(2.912-2.97)/(2-2.2)*($Cs2-2.2);
        $ku7= 3.705+(3.605-3.705)/(2-2.2)*($Cs2-2.2);
    }if($Cs2 == 1.8) {
        $ku1= -0.282; //2 tahun
        $ku2= 0.643; //5 tahun
        $ku3= 1.318; //10 tahun
        $ku5= 2.193; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.848; //50 tahun
        $ku7= 3.499; //100 tahun
    }if($Cs2>1.8 && $Cs2<2) {
        $ku1= -0.307+(-0.282-(-0.307))/(1.8-2)*($Cs2-2);
        $ku2= 0.609+(0.643-0.609)/(1.8-2)*($Cs2-2);
        $ku3= 1.302+(1.318-1.302)/(1.8-2)*($Cs2-2);
        $ku5= 2.219+(2.193-2.219)/(1.8-2)*($Cs2-2);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.912+(2.848-2.912)/(1.8-2)*($Cs2-2);
        $ku7= 3.605+(3.499-3.605)/(1.8-2)*($Cs2-2);
    }if($Cs2 == 1.6) {
        $ku1= -0.254; //2 tahun
        $ku2= 0.675; //5 tahun
        $ku3= 1.329; //10 tahun
        $ku5= 2.163; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.78; //50 tahun
        $ku7= 3.388; //100 tahun
    }if($Cs2>1.6 && $Cs2<1.8) {                                         // COBA ===================
        $ku1= -0.282+(-0.254-(-0.282))/(1.6-1.8)*($Cs2-1.8);
        $ku2= 0.643+(0.675-0.643)/(1.6-1.8)*($Cs2-1.8);
        $ku3= 1.318+(1.329-1.318)/(1.6-1.8)*($Cs2-1.8);
        $ku5= 2.193+(2.163-2.193)/(1.6-1.8)*($Cs2-1.8);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.848+(2.78-2.848)/(1.6-1.8)*($Cs2-1.8);
        $ku7= 3.499+(3.388-3.499)/(1.6-1.8)*($Cs2-1.8);
    }if($Cs2 == 1.4) {
        $ku1= -0.225; //2 tahun
        $ku2= 0.705; //5 tahun
        $ku3= 1.337; //10 tahun
        $ku5= 2.128; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.706; //50 tahun
        $ku7= 3.271; //100 tahun
    }if($Cs2>1.4 && $Cs2<1.6) {
        $ku1= -0.254+(-0.225-(-0.254))/(1.4-1.6)*($Cs2-1.6);
        $ku2= 0.675+(0.705-0.675)/(1.4-1.6)*($Cs2-1.6);
        $ku3= 1.329+(1.337-1.329)/(1.4-1.6)*($Cs2-1.6);
        $ku5= 2.163+(2.128-2.163)/(1.4-1.6)*($Cs2-1.6);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.78+(2.706-2.78)/(1.4-1.6)*($Cs2-1.6);
        $ku7= 3.388+(3.271-3.388)/(1.4-1.6)*($Cs2-1.6);
    }if($Cs2 == 1.2) {                                              //
        $ku1= -0.195; //2 tahun
        $ku2= 0.732; //5 tahun
        $ku3= 1.34; //10 tahun
        $ku5= 2.087; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.626; //50 tahun
        $ku7= 3.149; //100 tahun
    }if($Cs2>1.2 && $Cs2<1.4) {
        $ku1= -0.254+(-0.225-(-0.254))/(1.2-1.4)*($Cs2-1.4);
        $ku2= 0.675+(0.705-0.675)/(1.2-1.4)*($Cs2-1.4);
        $ku3= 1.329+(1.337-1.329)/(1.2-1.4)*($Cs2-1.4);
        $ku5= 2.163+(2.128-2.163)/(1.2-1.4)*($Cs2-1.4);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.78+(2.706-2.78)/(1.2-1.4)*($Cs2-1.4);
        $ku7= 3.388+(3.271-3.388)/(1.2-1.4)*($Cs2-1.4);
    }if($Cs2 == 1) {
        $ku1= -0.164; //2 tahun
        $ku2= 0.758; //5 tahun
        $ku3= 1.34; //10 tahun
        $ku5= 2.043; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.542; //50 tahun
        $ku7= 3.022; //100 tahun
    }if($Cs2>1 && $Cs2<1.2) {
        $ku1= -0.225+(-0.164-(-0.225))/(1-1.2)*($Cs2-1.2);
        $ku2= 0.705+(0.758-0.705)/(1-1.2)*($Cs2-1.2);
        $ku3= 1.337+(1.34-1.337)/(1-1.2)*($Cs2-1.2);
        $ku5= 2.128+(2.043-2.128)/(1-1.2)*($Cs2-1.2);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.706+(2.542-2.706)/(1-1.2)*($Cs2-1.2);
        $ku7= 3.271+(3.022-3.271)/(1-1.2)*($Cs2-1.2);
    }if($Cs2 == 0.9) {
        $ku1= -0.148; //2 tahun
        $ku2= 0.769; //5 tahun
        $ku3= 1.339; //10 tahun
        $ku5= 2.018; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.498; //50 tahun
        $ku7= 2.957; //100 tahun
    }if($Cs2>0.9 && $Cs2<1) {
        $ku1= -0.164+(-0.148-(-0.164))/(0.9-1)*($Cs2-1);
        $ku2= 0.758+(0.769-0.758)/(0.9-1)*($Cs2-1);
        $ku3= 1.34+(1.339-1.34)/(0.9-1)*($Cs2-1);
        $ku5= 2.043+(2.018-2.043)/(0.9-1)*($Cs2-1);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.542+(2.498-2.542)/(0.9-1)*($Cs2-1);
        $ku7= 3.022+(2.957-3.022)/(0.9-1)*($Cs2-1);
    }if($Cs2 == 0.8) {
        $ku1= -0.132; //2 tahun
        $ku2= 0.78; //5 tahun
        $ku3= 1.336; //10 tahun
        $ku5= 1.998; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.453; //50 tahun
        $ku7= 2.891; //100 tahun
    }if($Cs2>0.8 && $Cs2<0.9) {
        $ku1= -0.148+(-0.132-(-0.148))/(0.8-0.9)*($Cs2-0.9);
        $ku2= 0.769+(0.78-0.769)/(0.8-0.9)*($Cs2-0.9);
        $ku3= 1.339+(1.336-1.339)/(0.8-0.9)*($Cs2-0.9);
        $ku5= 2.018+(1.998-2.018)/(0.8-0.9)*($Cs2-0.9);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.498+(2.453-2.498)/(0.8-0.9)*($Cs2-0.9);
        $ku7= 2.957+(2.891-2.957)/(0.8-0.9)*($Cs2-0.9);
    }if($Cs2 == 0.7) {
        $ku1= -0.116; //2 tahun
        $ku2= 0.79; //5 tahun
        $ku3= 1.333; //10 tahun
        $ku5= 1.967; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.407; //50 tahun
        $ku7= 2.824; //100 tahun
    }if($Cs2>0.7 && $Cs2<0.8) {
        $ku1= -0.132+(-0.116-(-0.132))/(0.7-0.8)*($Cs2-0.8);
        $ku2= 0.78+(0.79-0.78)/(0.7-0.8)*($Cs2-0.8);
        $ku3= 1.336+(1.333-1.336)/(0.7-0.8)*($Cs2-0.8);
        $ku5= 1.998+(1.967-1.998)/(0.7-0.8)*($Cs2-0.8);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.453+(2.407-2.453)/(0.7-0.8)*($Cs2-0.8);
        $ku7= 2.891+(2.824-2.891)/(0.7-0.8)*($Cs2-0.8);
    }if($Cs2 == 0.6) {
        $ku1= -0.099; //2 tahun
        $ku2= 0.8; //5 tahun
        $ku3= 1.328; //10 tahun
        $ku5= 1.939; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.359; //50 tahun
        $ku7= 2.755; //100 tahun
    }if($Cs2>0.6 && $Cs2<0.7) {
        $ku1= -0.116+(-0.099-(-0.116))/(0.6-0.7)*($Cs2-0.7);
        $ku2= 0.79+(0.8-0.79)/(0.6-0.7)*($Cs2-0.7);
        $ku3= 1.333+(1.328-1.333)/(0.6-0.7)*($Cs2-0.7);
        $ku5= 1.967+(1.939-1.967)/(0.6-0.7)*($Cs2-0.7);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.407+(2.359-2.407)/(0.6-0.7)*($Cs2-0.7);
        $ku7= 2.824+(2.755-2.824)/(0.6-0.7)*($Cs2-0.7);
    }if($Cs2 == 0.5) {
        $ku1= -0.083; //2 tahun
        $ku2= 0.808; //5 tahun
        $ku3= 1.323; //10 tahun
        $ku5= 1.91; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.311; //50 tahun
        $ku7= 2.686; //100 tahun
    }if($Cs2>0.5 && $Cs2<0.6) {
        $ku1= -0.099+(-0.083-(-0.099))/(0.5-0.6)*($Cs2-0.6);
        $ku2= 0.8+(0.808-0.8)/(0.5-0.6)*($Cs2-0.6);
        $ku3= 1.328+(1.323-1.328)/(0.5-0.6)*($Cs2-0.6);
        $ku5= 1.939+(1.91-1.939)/(0.5-0.6)*($Cs2-0.6);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.359+(2.311-2.359)/(0.5-0.6)*($Cs2-0.6);
        $ku7= 2.755+(2.686-2.755)/(0.5-0.6)*($Cs2-0.6);
    }if($Cs2 == 0.4) {
        $ku1= -0.066; //2 tahun
        $ku2= 0.816; //5 tahun
        $ku3= 1.317; //10 tahun
        $ku5= 1.88; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.261; //50 tahun
        $ku7= 2.615; //100 tahun
    }if($Cs2>0.4 && $Cs2<0.5) {
        $ku1= -0.083+(-0.066-(-0.083))/(0.4-0.5)*($Cs2-0.5);
        $ku2= 0.808+(0.816-0.808)/(0.4-0.5)*($Cs2-0.5);
        $ku3= 1.323+(1.317-1.323)/(0.4-0.5)*($Cs2-0.5);
        $ku5= 1.91+(1.88-1.91)/(0.4-0.5)*($Cs2-0.5);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.311+(2.261-2.311)/(0.4-0.5)*($Cs2-0.5);
        $ku7= 2.686+(2.615-2.686)/(0.4-0.5)*($Cs2-0.5);
    }if($Cs2 == 0.3) {
        $ku1= -0.05; //2 tahun
        $ku2= 0.824; //5 tahun
        $ku3= 1.309; //10 tahun
        $ku5= 1.849; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.211; //50 tahun
        $ku7= 2.544; //100 tahun
    }if($Cs2>0.3 && $Cs2<0.4) {
        $ku1= -0.066+(-0.05-(-0.066))/(0.3-0.4)*($Cs2-0.4);
        $ku2= 0.816+(0.824-0.816)/(0.3-0.4)*($Cs2-0.4);
        $ku3= 1.317+(1.309-1.317)/(0.3-0.4)*($Cs2-0.4);
        $ku5= 1.88+(1.849-1.88)/(0.3-0.4)*($Cs2-0.4);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.261+(2.211-2.261)/(0.3-0.4)*($Cs2-0.4);
        $ku7= 2.615+(2.544-2.615)/(0.3-0.4)*($Cs2-0.4);
    }if($Cs2 == 0.2) {
        $ku1= -0.033; //2 tahun
        $ku2= 0.83; //5 tahun
        $ku3= 1.301; //10 tahun
        $ku5= 1.818; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.159; //50 tahun
        $ku7= 2.472; //100 tahun
    }if($Cs2>0.2 && $Cs2<0.3) {
        $ku1= -0.05+(-0.033-(-0.05))/(0.2-0.3)*($Cs2-0.3);
        $ku2= 0.824+(0.83-0.824)/(0.2-0.3)*($Cs2-0.3);
        $ku3= 1.309+(1.301-1.309)/(0.2-0.3)*($Cs2-0.3);
        $ku5= 1.849+(1.818-1.849)/(0.2-0.3)*($Cs2-0.3);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.211+(2.159-2.211)/(0.2-0.3)*($Cs2-0.3);
        $ku7= 2.544+(2.472-2.544)/(0.2-0.3)*($Cs2-0.3);
    }if($Cs2 == 0.1) {
        $ku1= -0.017; //2 tahun
        $ku2= 0.836; //5 tahun
        $ku3= 1.292; //10 tahun
        $ku5= 1.785; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.107; //50 tahun
        $ku7= 2.4; //100 tahun
    }if($Cs2>0.1 && $Cs2<0.2) {
        $ku1= -0.033+(-0.017-(-0.033))/(0.1-0.2)*($Cs2-0.2);
        $ku2= 0.83+(0.836-0.83)/(0.1-0.2)*($Cs2-0.2);
        $ku3= 1.301+(1.292-1.301)/(0.1-0.2)*($Cs2-0.2);
        $ku5= 1.818+(1.785-1.818)/(0.1-0.2)*($Cs2-0.2);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.159+(2.107-2.159)/(0.1-0.2)*($Cs2-0.2);
        $ku7= 2.472+(2.4-2.472)/(0.1-0.2)*($Cs2-0.2);
    }if($Cs2 == 0) {
        $ku1= 0; //2 tahun
        $ku2= 0.842; //5 tahun
        $ku3= 1.282; //10 tahun
        $ku5= 1.751; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2.054; //50 tahun
        $ku7= 2.326; //100 tahun
    }if($Cs2>0 && $Cs2<0.1) {
        $ku1= -0.017+(0-(-0.017))/(0-0.1)*($Cs2-0.1);
        $ku2= 0.836+(0.842-0.836)/(0-0.1)*($Cs2-0.1);
        $ku3= 1.292+(1.282-1.292)/(0-0.1)*($Cs2-0.1);
        $ku5= 1.785+(1.751-1.785)/(0-0.1)*($Cs2-0.1);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.107+(2.054-2.171)/(0-0.1)*($Cs2-0.1);
        $ku7= 2.4+(2.326-2.4)/(0-0.1)*($Cs2-0.1);
    }if($Cs2 == -0.1) {
        $ku1= 0.017; //2 tahun
        $ku2= 0.836; //5 tahun
        $ku3= 1.27; //10 tahun
        $ku5= 1.761; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 2; //50 tahun
        $ku7= 2.252; //100 tahun
    }if($Cs2>-0.1 && $Cs2<0) {
        $ku1= 0+(0.017-0)/(-0.1-0)*($Cs2-(0));
        $ku2= 0.842+(0.836-0.842)/(-0.1-0)*($Cs2-(0));
        $ku3= 1.282+(1.27-1.282)/(-0.1-0)*($Cs2-(0));
        $ku5= 1.751+(1.761-1.751)/(-0.1-0)*($Cs2-(0));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2.054+(2-2.054)/(-0.1-0)*($Cs2-(0));
        $ku7= 2.326+(2.252-2.326)/(-0.1-0)*($Cs2-(0));
    }if($Cs2 == -0.2) {
        $ku1= 0.033; //2 tahun
        $ku2= 0.85; //5 tahun
        $ku3= 1.258; //10 tahun
        $ku5= 1.68; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.945; //50 tahun
        $ku7= 2.178; //100 tahun
    }if($Cs2>-0.2 && $Cs2<-0.1) {
        $ku1= 0.017+(0.033-0.017)/(-0.2-(-0.1))*($Cs2-(-0.1));
        $ku2= 0.836+(0.85-0.836)/(-0.2-(-0.1))*($Cs2-(-0.1));
        $ku3= 1.27+(1.258-1.27)/(-0.2-(-0.1))*($Cs2-(-0.1));
        $ku5= 1.68+(1.761-1.68)/(1.258-1.27)*(1.258-$ku3);
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 2+(1.945-2)/(-0.2-(-0.1))*($Cs2-(-0.1));
        $ku7= 2.252+(2.178-2.252)/(-0.2-(-0.1))*($Cs2-(-0.1));
    }if($Cs2 == -0.3) {
        $ku1= 0.05; //2 tahun
        $ku2= 0.853; //5 tahun
        $ku3= 1.245; //10 tahun
        $ku5= 1.643; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.89; //50 tahun
        $ku7= 2.104; //100 tahun
    }if($Cs2>-0.3 && $Cs2<-0.2) {
        $ku1= 0.033+(0.05-0.033)/(-0.3-(-0.2))*($Cs2-(-0.2));
        $ku2= 0.85+(0.853-0.85)/(-0.3-(-0.2))*($Cs2-(-0.2));
        $ku3= 1.258+(1.245-1.258)/(-0.3-(-0.2))*($Cs2-(-0.2));
        $ku5= 1.68+(1.643-1.68)/(-0.3-(-0.2))*($Cs2-(-0.2));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.945+(1.89-1.945)/(-0.3-(-0.2))*($Cs2-(-0.2));
        $ku7= 2.178+(2.104-2.178)/(-0.3-(-0.2))*($Cs2-(-0.2));
    }if($Cs2 == -0.4) {
        $ku1= 0.066; //2 tahun
        $ku2= 0.855; //5 tahun
        $ku3= 1.231; //10 tahun
        $ku5= 1.606; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.834; //50 tahun
        $ku7= 2.029; //100 tahun
    }if($Cs2>-0.4 && $Cs2<-0.3) {
        $ku1= 0.05+(0.066-0.05)/(-0.4-(-0.3))*($Cs2-(-0.3));
        $ku2= 0.853+(0.855-0.853)/(-0.4-(-0.3))*($Cs2-(-0.3));
        $ku3= 1.245+(1.231-1.245)/(-0.4-(-0.3))*($Cs2-(-0.3));
        $ku5= 1.643+(1.606-1.643)/(-0.4-(-0.3))*($Cs2-(-0.3));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.89+(1.834-1.89)/(-0.4-(-0.3))*($Cs2-(-0.3));
        $ku7= 2.104+(2.029-2.104)/(-0.4-(-0.3))*($Cs2-(-0.3));
    }if($Cs2 == -0.5) {
        $ku1= 0.083; //2 tahun
        $ku2= 0.856; //5 tahun
        $ku3= 1.216; //10 tahun
        $ku5= 1.567; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.777; //50 tahun
        $ku7= 1.955; //100 tahun
    }if($Cs2>-0.5 && $Cs2<-0.4) {
        $ku1= 0.066+(0.083-0.066)/(-0.5-(-0.4))*($Cs2-(-0.4));
        $ku2= 0.855+(0.856-0.855)/(-0.5-(-0.4))*($Cs2-(-0.4));
        $ku3= 1.231+(1.216-1.231)/(-0.5-(-0.4))*($Cs2-(-0.4));
        $ku5= 1.606+(1.567-1.606)/(-0.5-(-0.4))*($Cs2-(-0.4));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.834+(1.777-1.834)/(-0.5-(-0.4))*($Cs2-(-0.4));
        $ku7= 2.029+(1.955-2.029)/(-0.5-(-0.4))*($Cs2-(-0.4));
    }if($Cs2 == -0.6) {
        $ku1= 0.099; //2 tahun
        $ku2= 0.857; //5 tahun
        $ku3= 1.2; //10 tahun
        $ku5= 1.528; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.72; //50 tahun
        $ku7= 1.88; //100 tahun
    }if($Cs2>-0.6 && $Cs2<-0.5) {
        $ku1= 0.083+(0.099-0.083)/(-0.6-(-0.5))*($Cs2-(-0.5));
        $ku2= 0.856+(0.857-0.856)/(-0.6-(-0.5))*($Cs2-(-0.5));
        $ku3= 1.216+(1.2-1.216)/(-0.6-(-0.5))*($Cs2-(-0.5));
        $ku5= 1.567+(1.528-1.567)/(-0.6-(-0.5))*($Cs2-(-0.5));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.777+(1.72-1.777)/(-0.6-(-0.5))*($Cs2-(-0.5));
        $ku7= 1.955+(1.88-1.955)/(-0.6-(-0.5))*($Cs2-(-0.5));
    }if($Cs2 == -0.7) {
        $ku1= 0.116; //2 tahun
        $ku2= 0.857; //5 tahun
        $ku3= 1.183; //10 tahun
        $ku5= 1.488; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.663; //50 tahun
        $ku7= 1.806; //100 tahun
    }if($Cs2>-0.7 && $Cs2<-0.6) {
        $ku1= 0.099+(0.116-0.099)/(-0.7-(-0.6))*($Cs2-(-0.6));
        $ku2= 0.857+(0.857-0.857)/(-0.7-(-0.6))*($Cs2-(-0.6));
        $ku3= 1.2+(1.183-1.2)/(-0.7-(-0.6))*($Cs2-(-0.6));
        $ku5= 1.528+(1.488-1.528)/(-0.7-(-0.6))*($Cs2-(-0.6));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.72+(1.663-1.72)/(-0.7-(-0.6))*($Cs2-(-0.6));
        $ku7= 1.88+(1.806-1.88)/(-0.7-(-0.6))*($Cs2-(-0.6));
    }if($Cs2 == -0.8) {
        $ku1= 0.132; //2 tahun
        $ku2= 0.856; //5 tahun
        $ku3= 1.166; //10 tahun
        $ku5= 1.488; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.606; //50 tahun
        $ku7= 1.733; //100 tahun
    }if($Cs2>-0.8 && $Cs2<-0.7) {
        $ku1= 0.116+(0.132-0.116)/(-0.8-(-0.7))*($Cs2-(-0.7));
        $ku2= 0.857+(0.856-0.857)/(-0.8-(-0.7))*($Cs2-(-0.7));
        $ku3= 1.183+(1.166-1.183)/(-0.8-(-0.7))*($Cs2-(-0.7));
        $ku5= 1.488+(1.488-1.488)/(-0.8-(-0.7))*($Cs2-(-0.7));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.663+(1.606-1.663)/(-0.8-(-0.7))*($Cs2-(-0.7));
        $ku7= 1.806+(1.773-1.806)/(-0.8-(-0.7))*($Cs2-(-0.7));
    }if($Cs2 == -0.9) {
        $ku1= 0.148; //2 tahun
        $ku2= 0.854; //5 tahun
        $ku3= 1.147; //10 tahun
        $ku5= 1.407; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.549; //50 tahun
        $ku7= 1.66; //100 tahun
    }if($Cs2>-0.9 && $Cs2<-0.8) {
        $ku1= 0.132+(0.148-0.132)/(-0.9-(-0.8))*($Cs2-(-0.8));
        $ku2= 0.856+(0.854-0.856)/(-0.9-(-0.8))*($Cs2-(-0.8));
        $ku3= 1.166+(1.147-1.166)/(-0.9-(-0.8))*($Cs2-(-0.8));
        $ku5= 1.488+(1.407-1.488)/(-0.9-(-0.8))*($Cs2-(-0.8));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.606+(1.549-1.606)/(-0.9-(-0.8))*($Cs2-(-0.8));
        $ku7= 1.773+(1.66-1.773)/(-0.9-(-0.8))*($Cs2-(-0.8));
    }if($Cs2 == -1) {
        $ku1= 0.164; //2 tahun
        $ku2= 0.852; //5 tahun
        $ku3= 1.128; //10 tahun
        $ku5= 1.366; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.492; //50 tahun
        $ku7= 1.588; //100 tahun
    }if($Cs2>-1 && $Cs2<-0.9) {
        $ku1= 0.148+(0.164-0.148)/(-1-(-0.9))*($Cs2-(-0.9));
        $ku2= 0.854+(0.852-0.854)/(-1-(-0.9))*($Cs2-(-0.9));
        $ku3= 1.147+(1.128-1.147)/(-1-(-0.9))*($Cs2-(-0.9));
        $ku5= 1.407+(1.366-1.407)/(-1-(-0.9))*($Cs2-(-0.9));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.549+(1.492-1.549)/(-1-(-0.9))*($Cs2-(-0.9));
        $ku7= 1.66+(1.588-1.66)/(-1-(-0.9))*($Cs2-(-0.9));
    }if($Cs2 == -1.2) {
        $ku1= 0.195; //2 tahun
        $ku2= 0.844; //5 tahun
        $ku3= 1.086; //10 tahun
        $ku5= 1.282; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.379; //50 tahun
        $ku7= 1.449; //100 tahun
    }if($Cs2>-1.2 && $Cs2<-1) {
        $ku1= 0.164+(0.195-0.164)/(-1.2-(-1))*($Cs2-(-1));
        $ku2= 0.852+(0.844-0.852)/(-1.2-(-1))*($Cs2-(-1));
        $ku3= 1.128+(1.086-1.128)/(-1.2-(-1))*($Cs2-(-1));
        $ku5= 1.366+(1.282-1.366)/(-1.2-(-1))*($Cs2-(-1));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.492+(1.379-1.492)/(-1.2-(-1))*($Cs2-(-1));
        $ku7= 1.588+(1.449-1.588)/(-1.2-(-1))*($Cs2-(-1));
    }if($Cs2 == -1.4) {
        $ku1= 0.225; //2 tahun
        $ku2= 0.832; //5 tahun
        $ku3= 1.041; //10 tahun
        $ku5= 1.198; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.27; //50 tahun
        $ku7= 1.318; //100 tahun
    }if($Cs2>-1.4 && $Cs2<-1.2) {
        $ku1= 0.195+(0.225-0.195)/(-1.4-(-1.2))*($Cs2-(-1.2));
        $ku2= 0.844+(0.832-0.844)/(-1.4-(-1.2))*($Cs2-(-1.2));
        $ku3= 1.086+(1.041-1.086)/(-1.4-(-1.2))*($Cs2-(-1.2));
        $ku5= 1.282+(1.198-1.282)/(-1.4-(-1.2))*($Cs2-(-1.2));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.379+(1.27-1.379)/(-1.4-(-1.2))*($Cs2-(-1.2));
        $ku7= 1.449+(1.318-1.449)/(-1.4-(-1.2))*($Cs2-(-1.2));
    }if($Cs2 == -1.6) {
        $ku1= 0.254; //2 tahun
        $ku2= 0.817; //5 tahun
        $ku3= 0.994; //10 tahun
        $ku5= 1.116; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.166; //50 tahun
        $ku7= 1.2; //100 tahun
    }if($Cs2>-1.6 && $Cs2<-1.4) {
        $ku1= 0.225+(0.254-0.225)/(-1.6-(-1.4))*($Cs2-(-1.4));
        $ku2= 0.832+(0.817-0.832)/(-1.6-(-1.4))*($Cs2-(-1.4));
        $ku3= 1.041+(0.994-1.041)/(-1.6-(-1.4))*($Cs2-(-1.4));
        $ku5= 1.198+(1.116-1.198)/(-1.6-(-1.4))*($Cs2-(-1.4));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.27+(1.166-1.27)/(-1.6-(-1.4))*($Cs2-(-1.4));
        $ku7= 1.318+(1.2-1.318)/(-1.6-(-1.4))*($Cs2-(-1.4));
    }if($Cs2 == -1.8) {
        $ku1= 0.282; //2 tahun
        $ku2= 0.799; //5 tahun
        $ku3= 0.945; //10 tahun
        $ku5= 1.035; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 1.069; //50 tahun
        $ku7= 1.089; //100 tahun
    }if($Cs2>-1.8 && $Cs2<-1.6) {
        $ku1= 0.254+(0.282-0.254)/(-1.8-(-1.6))*($Cs2-(-1.6));
        $ku2= 0.817+(0.799-0.817)/(-1.8-(-1.6))*($Cs2-(-1.6));
        $ku3= 0.994+(0.945-0.994)/(-1.8-(-1.6))*($Cs2-(-1.6));
        $ku5= 1.116+(1.035-1.116)/(-1.8-(-1.6))*($Cs2-(-1.6));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.166+(1.069-1.166)/(-1.8-(-1.6))*($Cs2-(-1.6));
        $ku7= 1.2+(1.089-1.2)/(-1.8-(-1.6))*($Cs2-(-1.6));
    }if($Cs2 == -2) {
        $ku1= 0.307; //2 tahun
        $ku2= 0.777; //5 tahun
        $ku3= 0.895; //10 tahun
        $ku5= 0.959; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 0.98; //50 tahun
        $ku7= 0.99; //100 tahun
    }if($Cs2>-2 && $Cs2<-1.8) {
        $ku1= 0.282+(0.307-0.282)/(-2-(-1.8))*($Cs2-(-1.8));
        $ku2= 0.799+(0.777-0.799)/(-2-(-1.8))*($Cs2-(-1.8));
        $ku3= 0.945+(0.895-0.945)/(-2-(-1.8))*($Cs2-(-1.8));
        $ku5= 1.035+(0.959-1.035)/(-2-(-1.8))*($Cs2-(-1.8));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 1.069+(0.98-1.069)/(-2-(-1.8))*($Cs2-(-1.8));
        $ku7= 1.089+(0.99-1.089)/(-2-(-1.8))*($Cs2-(-1.8));
    }if($Cs2 == -2.2) {
        $ku1= 0.33; //2 tahun
        $ku2= 0.752; //5 tahun
        $ku3= 0.844; //10 tahun
        $ku5= 0.888; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 0.9; //50 tahun
        $ku7= 0.905; //100 tahun
    }if($Cs2>-2.2 && $Cs2<-2) {
        $ku1= 0.307+(0.33-0.307)/(-2.2-(-2))*($Cs2-(-2));
        $ku2= 0.777+(0.752-0.777)/(-2.2-(-2))*($Cs2-(-2));
        $ku3= 0.895+(0.844-0.895)/(-2.2-(-2))*($Cs2-(-2));
        $ku5= 0.959+(0.888-0.959)/(-2.2-(-2))*($Cs2-(-2));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 0.98+(0.9-0.98)/(-2.2-(-2))*($Cs2-(-2));
        $ku7= 0.99+(0.905-0.99)/(-2.2-(-2))*($Cs2-(-2));
    }if($Cs2 == -2.5) {
        $ku1= 0.36; //2 tahun
        $ku2= 0.711; //5 tahun
        $ku3= 0.771; //10 tahun
        $ku5= 0.793; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 0.798; //50 tahun
        $ku7= 0.799; //100 tahun
    }if($Cs2>-2.5 && $Cs2<-2.2) {
        $ku1= 0.33+(0.36-0.33)/(-2.5-(-2.2))*($Cs2-(-2.2));
        $ku2= 0.752+(0.711-0.752)/(-2.5-(-2.2))*($Cs2-(-2.2));
        $ku3= 0.844+(0.771-0.844)/(-2.5-(-2.2))*($Cs2-(-2.2));
        $ku5= 0.888+(0.793-0.888)/(-2.5-(-2.2))*($Cs2-(-2.2));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 0.9+(0.798-0.9)/(-2.5-(-2.2))*($Cs2-(-2.2));
        $ku7= 0.905+(0.799-0.905)/(-2.5-(-2.2))*($Cs2-(-2.2));
    }if($Cs2 == -3) {
        $ku1= 0.396; //2 tahun
        $ku2= 0.636; //5 tahun
        $ku3= 0.66; //10 tahun
        $ku5= 0.666; //25 tahun
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun        
        $ku6= 0.666; //50 tahun
        $ku7= 0.667; //100 tahun
    }if($Cs2>-3 && $Cs2<-2.5) {
        $ku1= 0.36+(0.396-0.36)/(-3-(-2.5))*($Cs2-(-2.5));
        $ku2= 0.711+(0.636-0.711)/(-3-(-2.5))*($Cs2-(-2.5));
        $ku3= 0.771+(0.66-0.771)/(-3-(-2.5))*($Cs2-(-2.5));
        $ku5= 0.793+(0.666-0.793)/(-3-(-2.5))*($Cs2-(-2.5));
        $ku4= $ku3+((($ku5-$ku3)/(25-10))*(20-10)); //20 tahun
        $ku6= 0.798+(0.666-0.798)/(-3-(-2.5))*($Cs2-(-2.5));
        $ku7= 0.799+(0.667-0.799)/(-3-(-2.5))*($Cs2-(-2.5));
    }

    
$Ya1=$rata2+($ku1*$Sd2);
$Yb1=exp($Ya1);
$Ya2=$rata2+($ku2*$Sd2);
$Yb2=exp($Ya2);
$Ya3=$rata2+($ku3*$Sd2);
$Yb3=exp($Ya3);
$Ya4=$rata2+($ku4*$Sd2);
$Yb4=exp($Ya4);
$Ya5=$rata2+($ku5*$Sd2);
$Yb5=exp($Ya5);
$Ya6=$rata2+($ku6*$Sd2);
$Yb6=exp($Ya6);
$Ya7=$rata2+($ku7*$Sd2);
$Yb7=exp($Ya7);

//echo number_format(round((float)$ku1,4),4); echo "<br></br>";
//echo number_format(round((float)$ku2,4),4); echo "<br></br>";
//echo number_format(round((float)$ku3,4),4); echo "<br></br>";
//echo number_format(round((float)$ku4,4),4); echo "<br></br>";
//echo number_format(round((float)$ku5,4),4); echo "<br></br>";
//echo number_format(round((float)$ku6,4),4); echo "<br></br>";
//echo number_format(round((float)$ku7,4),4); echo "<br></br>";



?>

        <!-- pemanggilan di anfrek -->
     <div class="container">
      <div class="row">
        <div class="col-sm">

    <br></br>

        <div class="container">
            <div class="row">
              <div class="col-sm">
                <h1 class="h3 mb-2 text-gray-800">Curah Hujan Rancangan</h1>
                <p class="mb-4">Perhitungan Curah Hujan Rancangan</a>.</p>
                </div>
              </div>
            </div>


        <div class="card col-md-20 shadow mb-4">
          <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align : middle; text-align:center">Kala Ulang (tahun)</th>
                    <th colspan="4" style="text-align:center">Curah Hujan Rancangan (mm)</th>
                    </tr><tr>
                    <th style="vertical-align : middle; text-align:center">Normal</th>
                    <th style="vertical-align : middle; text-align:center">Log Normal</th>
                    <th style="vertical-align : middle; text-align:center">Gumbel</th>
                    <th style="vertical-align : middle; text-align:center">Log Person III</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr style="text-align:center">
                    <td>2</td>
                    <td> <?php echo number_format(round((float)$Xt1,4),4); ?></td>
                    <td> <?php echo number_format(round((float)$Xt7,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt14,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb1,4),4); ?> </td>
                  </tr>

                  <tr style="text-align:center">
                    <td>5</td>
                    <td> <?php echo number_format(round((float)$Xt2,4),4); ?></td>
                    <td> <?php echo number_format(round((float)$Xt8,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt15,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb2,4),4); ?> </td>
                  </tr>

                  <tr style="text-align:center">                   
                    <td>10</td>
                    <td> <?php echo number_format(round((float)$Xt3,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt9,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt16,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb3,4),4); ?> </td>
                  </tr>

                  <tr style="text-align:center"> 
                    <td style="text-align:center">20</td>
                    <td> <?php echo number_format(round((float)$Xt4,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt10,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt17,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb4,4),4); ?> </td>
                  </tr>

                  <tr style="text-align:center"> 
                    <td style="text-align:center">25</td>
                    <td> <?php echo number_format(round((float)$Xta4,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt11,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt18,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb5,4),4); ?> </td>

                  <tr style="text-align:center"> 
                    <td style="text-align:center">50</td>
                    <td> <?php echo number_format(round((float)$Xt5,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt12,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt19,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb6,4),4); ?> </td>
                  </tr>

                  <tr style="text-align:center"> 
                    <td style="text-align:center">100</td>
                    <td> <?php echo number_format(round((float)$Xt6,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt13,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Xt20,4),4); ?> </td>
                    <td> <?php echo number_format(round((float)$Yb7,4),4); ?> </td> 
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