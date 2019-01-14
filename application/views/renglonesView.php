<?php use \Exception as Exception;
error_reporting(error_reporting() & ~E_NOTICE); ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Evitda - Detallado</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
    
  </head>
  <body>

    <header>
        <h1>-</h1>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">CLC - Combustibles liquidos de Colombia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5"><?php echo $titulo; ?></h1>
    </main>
    
    
        <table border="">
          <thead>
            <tr>
              <th> PYG JUNIO 2018 </th>
              <th> Planta Yumbo </th>
              <th> Prom.</th>
              <th> Dep. Buenaventura </th>
              <th> Prom. </th>
              <th> Dep. Popayán </th>
              <th> Prom. </th>
              <th> Planta Chinchina </th>
              <th> Prom. </th>
              <th> Dep. Armenia </th>
              <th> Prom.</th>
              <th> Dep. Riosucio </th>
              <th> Prom. </th>
              <th> Planta Rionegro </th>
              <th> Prom. </th>
              <th> Dep. Copacabana </th>
              <th> Prom. </th>
              <th> Planta Villeta </th>
              <th> Prom.</th>
              <th> Planta Guateque </th>
              <th> Prom. </th>
              <th> Planta Ubaque </th>
              <th> Prom. </th>
              <th> Planta San Francisco </th>
              <th> Prom. </th>
              <th> Dep. Suba </th>
              <th> Prom. </th>
              <th> Dep. Soacha </th>
              <th> Prom. </th>
              <th> Total Mes </th>
              <th> Prom. </th>
            </tr>
          </thead>
          <tbody>
          <?php              
              /*Cilindos CLI*/
              foreach($cilindros_cli as $fila){
                $cilindrosCli[$fila->ID_CO] =  $fila->valor;
              }
              /*echo "<br>Cilindros cli";
              var_dump($cilindrosCli);*/

              /*Cilindos Costo de ventas*/
              foreach($costo_ventas as $fila){
                $netoMes =  $fila->Neto_mes;
              }
              /*echo "<br>Cilindros cli";
              var_dump($cilindrosCli);*/


              /*Cilindros CT2*/
              foreach($cilindros_ct2 as $fila){
                $cilindrosCt2_1[$fila->ID_CO] =  $fila->ID_CUENTA;
                $cilindrosCt2_2[$fila->ID_CO] =  $fila->valor;
              }

              /*echo "<br>Cilindros ct2";
              var_dump($cilindrosCt2_1);echo "<br>";
              var_dump($cilindrosCt2_2);*/

              /*Renglon Granel*/
              foreach($renglon_granel as $fila){
                $renglonGranel[$fila->ID_CO] =  $fila->valor;
              }

              /*echo "<br>Renglon granel";
              var_dump($renglon_granel_1);*/
              
              /*echo "Manizales: ".$renglon_granel_1['C01'];
              throw new ViewWasNotFound( $message );*/

              /*Cuenta Costo*/
              foreach($cuenta_costo as $fila){
                $cuentaCosto[$fila->ID_CO] =  $fila->valor;
              }
              /*echo "<br>Cuenta costo";
              var_dump($cuentaCosto);*/

              /*Renglon Montacargas*/
              foreach($renglon_montacargas as $fila){
                $renglonMontacargas[$fila->ID_CO] =  $fila->valor;
              }
              /*echo "<br>Renglon Montacarga";
              var_dump($renglonMontacargas);*/

              /*Otros Ingresos*/
              foreach($otros_ingresos as $fila){
                $otrosIngresos[$fila->ID_CO] =  $fila->valor;
              }
              /*echo "<br>Otros Ingresos";
              var_dump($otrosIngresos);*/              

              /*Ventas Comercial*/
              foreach($ventas_comercial as $fila){
                $ventasComercial_1[$fila->ID_CO][$fila->linea] =  $fila->kilos;
              }
              /*echo "<br>Ventas comercial";
              var_dump($ventasComercial_1); echo "<br>";*/

              $CERO=0;

              //Cálculo del total de ventas en Kg por Centro opertivo.
              $TOTAL_CIL=$ventasComercial_1['Y01']['0103']+$ventasComercial_1['BT1']['0103']+$ventasComercial_1['DP1']['0103']+$ventasComercial_1['M01']['0103']+$ventasComercial_1['DA1']['0103']+$ventasComercial_1['DR1']['0103']+$ventasComercial_1['R01']['0103']+$ventasComercial_1['DB1']['0103']+$ventasComercial_1['V01']['0103']+$ventasComercial_1['G01']['0103']+$ventasComercial_1['U01']['0103']+$ventasComercial_1['S01']['0103']+$ventasComercial_1['DN1']['0103']+$ventasComercial_1['DS1']['0103'];
              $TOTAL_GRA=$ventasComercial_1['Y01']['0101']+$ventasComercial_1['BT1']['0101']+$ventasComercial_1['DP1']['0101']+$ventasComercial_1['M01']['0101']+$ventasComercial_1['DA1']['0101']+$ventasComercial_1['DR1']['0101']+$ventasComercial_1['R01']['0101']+$ventasComercial_1['DB1']['0101']+$ventasComercial_1['V01']['0101']+$ventasComercial_1['G01']['0101']+$ventasComercial_1['U01']['0101']+$ventasComercial_1['S01']['0101']+$ventasComercial_1['DN1']['0101']+$ventasComercial_1['DS1']['0101'];
              $TOTAL_MTC=$ventasComercial_1['Y01']['0105']+$ventasComercial_1['BT1']['0105']+$ventasComercial_1['DP1']['0105']+$ventasComercial_1['M01']['0105']+$ventasComercial_1['DA1']['0105']+$ventasComercial_1['DR1']['0105']+$ventasComercial_1['R01']['0105']+$ventasComercial_1['DB1']['0105']+$ventasComercial_1['V01']['0105']+$ventasComercial_1['G01']['0105']+$ventasComercial_1['U01']['0105']+$ventasComercial_1['S01']['0105']+$ventasComercial_1['DN1']['0105']+$ventasComercial_1['DS1']['0105'];

              //Total Ingresos por Cilindro en Pesos
              $INGRESOS_CIL=$cilindrosCli['Y01']+$cilindrosCli['BT1']+$cilindrosCli['DP1']+$cilindrosCli['M01']+$cilindrosCli['DA1']+$cilindrosCli['DR1']+$cilindrosCli['R01']+$cilindrosCli['DB1']+$cilindrosCli['V01']+$cilindrosCli['G01']+$cilindrosCli['U01']+$cilindrosCli['S01']+$cilindrosCli['DN1']+$cilindrosCli['DS1'];

              //Total Ingresos por Montacargas en Pesos
              $INGRESOS_MON=$renglonMontacargas['Y01']+$renglonMontacargas['BT1']+$renglonMontacargas['DP1']+$renglonMontacargas['M01']+$renglonMontacargas['DA1']+$renglonMontacargas['DR1']+$renglonMontacargas['R01']+$renglonMontacargas['DB1']+$renglonMontacargas['V01']+$renglonMontacargas['G01']+$renglonMontacargas['U01']+$renglonMontacargas['S01']+$renglonMontacargas['DN1']+$renglonMontacargas['DS1'];

              //Total Ingresos por Granel en Pesos
              $INGRESOS_GRA=$renglonGranel['Y01']+$renglonGranel['BT1']+$renglonGranel['DP1']+$renglonGranel['M01']+$renglonGranel['DA1']+$renglonGranel['DR1']+$renglonGranel['R01']+$renglonGranel['DB1']+$renglonGranel['V01']+$renglonGranel['G01']+$renglonGranel['U01']+$renglonGranel['S01']+$renglonGranel['DN1']+$renglonGranel['DS1'];              

              //Total Ingresos por Otros Ingresos en Pesos
              $INGRESOS_OIN=$otrosIngresos['Y01']+$otrosIngresos['BT1']+$otrosIngresos['DP1']+$otrosIngresos['M01']+$otrosIngresos['DA1']+$otrosIngresos['DR1']+$otrosIngresos['R01']+$otrosIngresos['DB1']+$otrosIngresos['V01']+$otrosIngresos['G01']+$otrosIngresos['U01']+$otrosIngresos['S01']+$otrosIngresos['DN1']+$otrosIngresos['DS1'];              

              //Total Ingresos por Centros opertivos en Kilos
              $VENTASKG_Y01=$ventasComercial_1['Y01']['0101']+$ventasComercial_1['Y01']['0103']+$ventasComercial_1['Y01']['0105'];
              $VENTASKG_BT1=$ventasComercial_1['BT1']['0101']+$ventasComercial_1['BT1']['0103']+$ventasComercial_1['BT1']['0105'];
              $VENTASKG_DP1=$ventasComercial_1['DP1']['0101']+$ventasComercial_1['DP1']['0103']+$ventasComercial_1['DP1']['0105'];
              $VENTASKG_M01=$ventasComercial_1['M01']['0101']+$ventasComercial_1['M01']['0103']+$ventasComercial_1['M01']['0105'];
              $VENTASKG_DA1=$ventasComercial_1['DA1']['0101']+$ventasComercial_1['DA1']['0103']+$ventasComercial_1['DA1']['0105'];
              $VENTASKG_DR1=$ventasComercial_1['DR1']['0101']+$ventasComercial_1['DR1']['0103']+$ventasComercial_1['DR1']['0105'];
              $VENTASKG_R01=$ventasComercial_1['R01']['0101']+$ventasComercial_1['R01']['0103']+$ventasComercial_1['R01']['0105'];
              $VENTASKG_DB1=$ventasComercial_1['DB1']['0101']+$ventasComercial_1['DB1']['0103']+$ventasComercial_1['DB1']['0105'];
              $VENTASKG_V01=$ventasComercial_1['V01']['0101']+$ventasComercial_1['V01']['0103']+$ventasComercial_1['V01']['0105'];
              $VENTASKG_G01=$ventasComercial_1['G01']['0101']+$ventasComercial_1['G01']['0103']+$ventasComercial_1['G01']['0105'];
              $VENTASKG_U01=$ventasComercial_1['U01']['0101']+$ventasComercial_1['U01']['0103']+$ventasComercial_1['U01']['0105'];
              $VENTASKG_S01=$ventasComercial_1['S01']['0101']+$ventasComercial_1['S01']['0103']+$ventasComercial_1['S01']['0105'];
              $VENTASKG_DN1=$ventasComercial_1['DN1']['0101']+$ventasComercial_1['DN1']['0103']+$ventasComercial_1['DN1']['0105'];
              $VENTASKG_DS1=$ventasComercial_1['DS1']['0101']+$ventasComercial_1['DS1']['0103']+$ventasComercial_1['DS1']['0105'];

              //Total Ventas en Kilos
              $TOTAL=$TOTAL_CIL+$TOTAL_MTC+$TOTAL_GRA;

              //Total Ingresos por Centros opertivos en Pesos
              $VENTAPES_Y01=$cilindrosCli['Y01']+$renglonMontacargas['Y01']+$renglonGranel['Y01']+$otrosIngresos['Y01'];
              $VENTAPES_BT1=$cilindrosCli['BT1']+$renglonMontacargas['BT1']+$renglonGranel['BT1']+$otrosIngresos['BT1'];
              $VENTAPES_DP1=$cilindrosCli['DP1']+$renglonMontacargas['DP1']+$renglonGranel['DP1']+$otrosIngresos['DP1'];
              $VENTAPES_M01=$cilindrosCli['M01']+$renglonMontacargas['M01']+$renglonGranel['M01']+$otrosIngresos['M01'];
              $VENTAPES_DA1=$cilindrosCli['DA1']+$renglonMontacargas['DA1']+$renglonGranel['DA1']+$otrosIngresos['DA1'];
              $VENTAPES_DR1=$cilindrosCli['DR1']+$renglonMontacargas['DR1']+$renglonGranel['DR1']+$otrosIngresos['DR1'];
              $VENTAPES_R01=$cilindrosCli['R01']+$renglonMontacargas['R01']+$renglonGranel['R01']+$otrosIngresos['R01'];
              $VENTAPES_DB1=$cilindrosCli['DB1']+$renglonMontacargas['DB1']+$renglonGranel['DB1']+$otrosIngresos['DB1'];
              $VENTAPES_V01=$cilindrosCli['V01']+$renglonMontacargas['V01']+$renglonGranel['V01']+$otrosIngresos['V01'];
              $VENTAPES_G01=$cilindrosCli['G01']+$renglonMontacargas['G01']+$renglonGranel['G01']+$otrosIngresos['G01'];
              $VENTAPES_U01=$cilindrosCli['U01']+$renglonMontacargas['U01']+$renglonGranel['U01']+$otrosIngresos['U01'];
              $VENTAPES_S01=$cilindrosCli['S01']+$renglonMontacargas['S01']+$renglonGranel['S01']+$otrosIngresos['S01'];
              $VENTAPES_DN1=$cilindrosCli['DN1']+$renglonMontacargas['DN1']+$renglonGranel['DN1']+$otrosIngresos['DN1'];
              $VENTAPES_DS1=$cilindrosCli['DS1']+$renglonMontacargas['DS1']+$renglonGranel['DS1']+$otrosIngresos['DS1'];

              //Total Ventas en Peso
              $TOTAL_PES=$INGRESOS_CIL+$INGRESOS_GRA+$INGRESOS_MON+$INGRESOS_OIN;              

              //Prmedio de Ventas por Ingresos en cilindros
                if ($ventasComercial_1['Y01']['0103']<>0){
                    $pro_ing_cil_y01=($cilindrosCli['Y01']/$ventasComercial_1['Y01']['0103']);
                  }else{
                    $pro_ing_cil_y01=0;
                  }
                if($ventasComercial_1['BT1']['0103']<>0){  
                   $pro_ing_cil_bt1=($cilindrosCli['BT1']/$ventasComercial_1['BT1']['0103']);
                  }else{
                   $pro_ing_cil_bt1=0;
                  }
                 if($ventasComercial_1['DP1']['0103']<>0){
                    $pro_ing_cil_dp1=($cilindrosCli['DP1']/$ventasComercial_1['DP1']['0103']);
                  }else{
                    $pro_ing_cil_dp1=0;  
                  }
                if($ventasComercial_1['M01']['0103']<>0){
                  $pro_ing_cil_m01=($cilindrosCli['M01']/$ventasComercial_1['M01']['0103']);
                  }else{
                    $pro_ing_cil_m01=0;
                  }
                if($ventasComercial_1['DA1']['0103']<>0){
                  $pro_ing_cil_da1=($cilindrosCli['DA1']/$ventasComercial_1['DA1']['0103']);
                  }else{
                    $pro_ing_cil_da1=0;
                  }
                if($ventasComercial_1['DR1']['0103']<>0){
                  $pro_ing_cil_dr1=($cilindrosCli['DR1']/$ventasComercial_1['DR1']['0103']);
                  }else{
                    $pro_ing_cil_dr1=0;
                  }
                if($ventasComercial_1['R01']['0103']<>0){
                  $pro_ing_cil_r01=($cilindrosCli['R01']/$ventasComercial_1['R01']['0103']);
                  }else{
                    $pro_ing_cil_r01=0;
                  }
                if($ventasComercial_1['DB1']['0103']<>0){
                  $pro_ing_cil_db1=($cilindrosCli['DB1']/$ventasComercial_1['DB1']['0103']);
                  }else{
                    $pro_ing_cil_db1=0;
                  }
                if($ventasComercial_1['V01']['0103']<>0){
                  $pro_ing_cil_v01=($cilindrosCli['V01']/$ventasComercial_1['V01']['0103']);  
                  }else{
                    $pro_ing_cil_v01=0;
                  }
                if($ventasComercial_1['G01']['0103']<>0){
                  $pro_ing_cil_g01=($cilindrosCli['G01']/$ventasComercial_1['G01']['0103']);
                  }else{
                    $pro_ing_cil_g01=0;
                  }
                if($ventasComercial_1['U01']['0103']<>0){
                  $pro_ing_cil_u01=($cilindrosCli['U01']/$ventasComercial_1['U01']['0103']);
                  }else{
                    $pro_ing_cil_u01=0;
                  }
                if($ventasComercial_1['S01']['0103']<>0){
                  $pro_ing_cil_s01=($cilindrosCli['S01']/$ventasComercial_1['S01']['0103']);
                  }else{
                    $pro_ing_cil_s01=0;
                  }
                if($ventasComercial_1['DN1']['0103']<>0){
                    $pro_ing_cil_dn1=($cilindrosCli['DN1']/$ventasComercial_1['DN1']['0103']);
                  }else{
                    $pro_ing_cil_dn1=0;
                  }
                if($ventasComercial_1['DS1']['0103']<>0){
                    $pro_ing_cil_ds1=($cilindrosCli['DS1']/$ventasComercial_1['DS1']['0103']);
                  }else{
                    $pro_ing_cil_ds1=0;
                  }

              //Prmedio de Ventas por Ingresos en montacargas
                if ($ventasComercial_1['Y01']['0105']<>0){
                    $pro_ing_mon_y01=($renglonMontacargas['Y01']/$ventasComercial_1['Y01']['0105']);
                  }else{
                    $pro_ing_mon_y01=0;
                  }
                if($ventasComercial_1['BT1']['0105']<>0){  
                   $pro_ing_mon_bt1=($renglonMontacargas['BT1']/$ventasComercial_1['BT1']['0105']);
                  }else{
                   $pro_ing_mon_bt1=0;
                  }
                 if($ventasComercial_1['DP1']['0105']<>0){
                    $pro_ing_mon_dp1=($renglonMontacargas['DP1']/$ventasComercial_1['DP1']['0105']);
                  }else{
                    $pro_ing_mon_dp1=0;  
                  }
                if($ventasComercial_1['M01']['0105']<>0){
                  $pro_ing_mon_m01=($renglonMontacargas['M01']/$ventasComercial_1['M01']['0105']);
                  }else{
                    $pro_ing_mon_m01=0;
                  }
                if($ventasComercial_1['DA1']['0105']<>0){
                  $pro_ing_mon_da1=($renglonMontacargas['DA1']/$ventasComercial_1['DA1']['0105']);
                  }else{
                    $pro_ing_mon_da1=0;
                  }
                if($ventasComercial_1['DR1']['0105']<>0){
                  $pro_ing_mon_dr1=($renglonMontacargas['DR1']/$ventasComercial_1['DR1']['0105']);
                  }else{
                    $pro_ing_mon_dr1=0;
                  }
                if($ventasComercial_1['R01']['0105']<>0){
                  $pro_ing_mon_r01=($renglonMontacargas['R01']/$ventasComercial_1['R01']['0105']);
                  }else{
                    $pro_ing_mon_r01=0;
                  }
                if($ventasComercial_1['DB1']['0105']<>0){
                  $pro_ing_mon_db1=($renglonMontacargas['DB1']/$ventasComercial_1['DB1']['0105']);
                  }else{
                    $pro_ing_mon_db1=0;
                  }
                if($ventasComercial_1['V01']['0105']<>0){
                  $pro_ing_mon_v01=($renglonMontacargas['V01']/$ventasComercial_1['V01']['0105']);  
                  }else{
                    $pro_ing_mon_v01=0;
                  }
                if($ventasComercial_1['G01']['0105']<>0){
                  $pro_ing_mon_g01=($renglonMontacargas['G01']/$ventasComercial_1['G01']['0105']);
                  }else{
                    $pro_ing_mon_g01=0;
                  }
                if($ventasComercial_1['U01']['0105']<>0){
                  $pro_ing_mon_u01=($renglonMontacargas['U01']/$ventasComercial_1['U01']['0105']);
                  }else{
                    $pro_ing_mon_u01=0;
                  }
                if($ventasComercial_1['S01']['0105']<>0){
                  $pro_ing_mon_s01=($renglonMontacargas['S01']/$ventasComercial_1['S01']['0105']);
                  }else{
                    $pro_ing_mon_s01=0;
                  }
                if($ventasComercial_1['DN1']['0105']<>0){
                    $pro_ing_mon_dn1=($renglonMontacargas['DN1']/$ventasComercial_1['DN1']['0105']);
                  }else{
                    $pro_ing_mon_dn1=0;
                  }
                if($ventasComercial_1['DS1']['0105']<>0){
                    $pro_ing_mon_ds1=($renglonMontacargas['DS1']/$ventasComercial_1['DS1']['0105']);
                  }else{
                    $pro_ing_mon_ds1=0;
                  }

              //Prmedio de Ventas por Ingresos en Granel
                if ($ventasComercial_1['Y01']['0101']<>0){
                    $pro_ing_gra_y01=($renglonGranel['Y01']/$ventasComercial_1['Y01']['0101']);
                  }else{
                    $pro_ing_gra_y01=0;
                  }
                if($ventasComercial_1['BT1']['0101']<>0){  
                   $pro_ing_gra_bt1=($renglonGranel['BT1']/$ventasComercial_1['BT1']['0101']);
                  }else{
                   $pro_ing_gra_bt1=0;
                  }
                 if($ventasComercial_1['DP1']['0101']<>0){
                    $pro_ing_gra_dp1=($renglonGranel['DP1']/$ventasComercial_1['DP1']['0101']);
                  }else{
                    $pro_ing_gra_dp1=0;  
                  }
                if($ventasComercial_1['M01']['0101']<>0){
                    $pro_ing_gra_m01=($renglonGranel['M01']/$ventasComercial_1['M01']['0101']);
                  }else{
                    $pro_ing_gra_m01=0;
                  }
                if($ventasComercial_1['DA1']['0101']<>0){
                    $pro_ing_gra_da1=($renglonMontacargas['DA1']/$ventasComercial_1['DA1']['0101']);
                  }else{
                    $pro_ing_gra_da1=0;
                  }
                if($ventasComercial_1['DR1']['0101']<>0){
                    $pro_ing_gra_dr1=($renglonGranel['DR1']/$ventasComercial_1['DR1']['0101']);
                  }else{
                    $pro_ing_gra_dr1=0;
                  }
                if($ventasComercial_1['R01']['0101']<>0){
                    $pro_ing_gra_r01=($renglonGranel['R01']/$ventasComercial_1['R01']['0101']);
                  }else{
                    $pro_ing_gra_r01=0;
                  }
                if($ventasComercial_1['DB1']['0101']<>0){
                    $pro_ing_gra_db1=($renglonGranel['DB1']/$ventasComercial_1['DB1']['0105']);
                  }else{
                    $pro_ing_gra_db1=0;
                  }
                if($ventasComercial_1['V01']['0101']<>0){
                    $pro_ing_gra_v01=($renglonGranel['V01']/$ventasComercial_1['V01']['0101']);  
                  }else{
                    $pro_ing_gra_v01=0;
                  }
                if($ventasComercial_1['G01']['0101']<>0){
                    $pro_ing_gra_g01=($renglonGranel['G01']/$ventasComercial_1['G01']['0101']);
                  }else{
                    $pro_ing_gra_g01=0;
                  }
                if($ventasComercial_1['U01']['0101']<>0){
                    $pro_ing_gra_u01=($renglonGranel['U01']/$ventasComercial_1['U01']['0101']);
                  }else{
                    $pro_ing_gra_u01=0;
                  }
                if($ventasComercial_1['S01']['0101']<>0){
                    $pro_ing_gra_s01=($renglonGranel['S01']/$ventasComercial_1['S01']['0101']);
                  }else{
                    $pro_ing_gra_s01=0;
                  }
                if($ventasComercial_1['DN1']['0101']<>0){
                    $pro_ing_gra_dn1=($renglonGranel['DN1']/$ventasComercial_1['DN1']['0101']);
                  }else{
                    $pro_ing_gra_dn1=0;
                  }
                if($ventasComercial_1['DS1']['0101']<>0){
                    $pro_ing_gra_ds1=($renglonGranel['DS1']/$ventasComercial_1['DS1']['0101']);
                  }else{
                    $pro_ing_gra_ds1=0;
                  }

              //Promedio de Ventas por Ingresos en Otros ingresos
                if ($VENTASKG_Y01<>0){
                    $pro_ing_gra_y01=($otrosIngresos['Y01']/$VENTASKG_Y01);
                  }else{
                    $pro_ing_gra_y01=0;
                  }
                if ($VENTASKG_BT1<>0){  
                    $pro_ing_gra_bt1=($otrosIngresos['BT1']/$VENTASKG_BT1);
                  }else{
                    $pro_ing_gra_bt1=0;
                  }
                 if($VENTASKG_DP1<>0){
                    $pro_ing_gra_dp1=($otrosIngresos['DP1']/$VENTASKG_DP1);
                  }else{
                    $pro_ing_gra_dp1=0;  
                  }
                if($VENTASKG_M01<>0){
                    $pro_ing_gra_m01=($otrosIngresos['M01']/$VENTASKG_M01);
                  }else{
                    $pro_ing_gra_m01=0;
                  }
                if($VENTASKG_DA1<>0){
                    $pro_ing_gra_da1=($otrosIngresos['DA1']/$VENTASKG_DA1);
                  }else{
                    $pro_ing_gra_da1=0;
                  }
                if($VENTASKG_DR1<>0){
                    $pro_ing_gra_dr1=($otrosIngresos['DR1']/$VENTASKG_DR1);
                  }else{
                    $pro_ing_gra_dr1=0;
                  }
                  if($VENTASKG_R01<>0){
                    $pro_ing_gra_r01=($otrosIngresos['R01']/$VENTASKG_R01);
                  }else{
                    $pro_ing_gra_r01=0;
                  }
                if($VENTASKG_DB1<>0){
                    $pro_ing_gra_db1=($otrosIngresos['DB1']/$VENTASKG_DB1);
                  }else{
                    $pro_ing_gra_db1=0;
                  }
                if($VENTASKG_V01<>0){
                    $pro_ing_gra_v01=($otrosIngresos['V01']/$VENTASKG_V01);  
                  }else{
                    $pro_ing_gra_v01=0;
                  }
                if($VENTASKG_G01<>0){
                    $pro_ing_gra_g01=($otrosIngresos['G01']/$VENTASKG_G01);
                  }else{
                    $pro_ing_gra_g01=0;
                  }
                if($VENTASKG_U01<>0){
                    $pro_ing_oti_u01=($otrosIngresos['U01']/$VENTASKG_U01);
                  }else{
                    $pro_ing_oti_u01=0;
                  }
                if($VENTASKG_S01<>0){
                    $pro_ing_oti_s01=($otrosIngresos['S01']/$VENTASKG_S01);
                  }else{
                    $pro_ing_oti_s01=0;
                  }
                if($VENTASKG_DN1<>0){
                    $pro_ing_oti_dn1=($otrosIngresos['DN1']/$VENTASKG_DN1);
                  }else{
                    $pro_ing_oti_dn1=0;
                  }
                if($VENTASKG_DS1<>0){
                    $pro_ing_oti_ds1=($otrosIngresos['DS1']/$VENTASKG_DS1);
                  }else{
                    $pro_ing_oti_ds1=0;
                  }                

                //Promedio de Ventas Totales
                if ($VENTASKG_Y01<>0){
                    $pro_ing_tot_y01=($VENTAPES_Y01/$VENTASKG_Y01);
                  }else{
                    $pro_ing_tot_y01=0;
                  }
                if ($VENTASKG_BT1<>0){  
                    $pro_ing_tot_bt1=($VENTAPES_BT1/$VENTASKG_BT1);
                  }else{
                    $pro_ing_tot_bt1=0;
                  }
                 if($VENTASKG_DP1<>0){
                    $pro_ing_tot_dp1=($VENTAPES_DP1/$VENTASKG_DP1);
                  }else{
                    $pro_ing_tot_dp1=0;  
                  }
                if($VENTASKG_M01<>0){
                    $pro_ing_tot_m01=($VENTAPES_M01/$VENTASKG_M01);
                  }else{
                    $pro_ing_tot_m01=0;
                  }
                if($VENTASKG_DA1<>0){
                    $pro_ing_tot_da1=($VENTAPES_DA1/$VENTASKG_DA1);
                  }else{
                    $pro_ing_tot_da1=0;
                  }
                if($VENTASKG_DR1<>0){
                    $pro_ing_tot_dr1=($VENTAPES_DR1/$VENTASKG_DR1);
                  }else{
                    $pro_ing_tot_dr1=0;
                  }
                if($VENTASKG_R01<>0){
                    $pro_ing_tot_r01=($VENTAPES_R01/$VENTASKG_R01);
                  }else{
                    $pro_ing_tot_r01=0;
                  }
                if($VENTASKG_DB1<>0){
                    $pro_ing_tot_db1=($VENTAPES_DB1/$VENTASKG_DB1);
                  }else{
                    $pro_ing_tot_db1=0;
                  }
                if($VENTASKG_V01<>0){
                    $pro_ing_tot_v01=($VENTAPES_V01/$VENTASKG_V01);  
                  }else{
                    $pro_ing_tot_v01=0;
                  }
                if($VENTASKG_G01<>0){
                    $pro_ing_tot_g01=($VENTAPES_G01/$VENTASKG_G01);
                  }else{
                    $pro_ing_tot_g01=0;
                  }
                if($VENTASKG_U01<>0){
                    $pro_ing_tot_u01=($VENTAPES_U01/$VENTASKG_U01);
                  }else{
                    $pro_ing_tot_u01=0;
                  }
                if($VENTASKG_S01<>0){
                    $pro_ing_tot_s01=($VENTAPES_S01/$VENTASKG_S01);
                  }else{
                    $pro_ing_tot_s01=0;
                  }
                if($VENTASKG_DN1<>0){
                    $pro_ing_tot_dn1=($VENTAPES_DN1/$VENTASKG_DN1);
                  }else{
                    $pro_ing_tot_dn1=0;
                  }
                if($VENTASKG_DS1<>0){
                    $pro_ing_tot_ds1=($VENTAPES_DS1/$VENTASKG_DS1);
                  }else{
                    $pro_ing_tot_ds1=0;
                  }                

                //Promedio de Costo de ventas

                $pro_cos_ventas=$netoMes/$TOTAL;

                //Costos renglón Cilindros
                
                $cos_cil_y01=$ventasComercial_1['Y01']['0103']*$pro_cos_ventas;
                $cos_cil_bt1=$ventasComercial_1['BT1']['0103']*$pro_cos_ventas;
                $cos_cil_dp1=$ventasComercial_1['DP1']['0103']*$pro_cos_ventas;
                $cos_cil_m01=$ventasComercial_1['M01']['0103']*$pro_cos_ventas;
                $cos_cil_da1=$ventasComercial_1['DA1']['0103']*$pro_cos_ventas;
                $cos_cil_dr1=$ventasComercial_1['DR1']['0103']*$pro_cos_ventas;
                $cos_cil_r01=$ventasComercial_1['R01']['0103']*$pro_cos_ventas;
                $cos_cil_db1=$ventasComercial_1['DB1']['0103']*$pro_cos_ventas;
                $cos_cil_v01=$ventasComercial_1['V01']['0103']*$pro_cos_ventas;
                $cos_cil_g01=$ventasComercial_1['G01']['0103']*$pro_cos_ventas;
                $cos_cil_u01=$ventasComercial_1['U01']['0103']*$pro_cos_ventas;
                $cos_cil_s01=$ventasComercial_1['S01']['0103']*$pro_cos_ventas;
                $cos_cil_dn1=$ventasComercial_1['DN1']['0103']*$pro_cos_ventas;
                $cos_cil_ds1=$ventasComercial_1['DS1']['0103']*$pro_cos_ventas;
                $tot_cos_cil=$cos_cil_y01+$cos_cil_bt1+$cos_cil_dp1+$cos_cil_m01+$cos_cil_da1+$cos_cil_dr1+$cos_cil_r01+$cos_cil_db1+$cos_cil_v01+$cos_cil_g01+$cos_cil_u01+$cos_cil_s01+$cos_cil_dn1+$cos_cil_ds1;

                //Costos renglón Montacargas
                
                $cos_mtc_y01=$ventasComercial_1['Y01']['0105']*$pro_cos_ventas;
                $cos_mtc_bt1=$ventasComercial_1['BT1']['0105']*$pro_cos_ventas;
                $cos_mtc_dp1=$ventasComercial_1['DP1']['0105']*$pro_cos_ventas;
                $cos_mtc_m01=$ventasComercial_1['M01']['0105']*$pro_cos_ventas;
                $cos_mtc_da1=$ventasComercial_1['DA1']['0105']*$pro_cos_ventas;
                $cos_mtc_dr1=$ventasComercial_1['DR1']['0105']*$pro_cos_ventas;
                $cos_mtc_r01=$ventasComercial_1['R01']['0105']*$pro_cos_ventas;
                $cos_mtc_db1=$ventasComercial_1['DB1']['0105']*$pro_cos_ventas;
                $cos_mtc_v01=$ventasComercial_1['V01']['0105']*$pro_cos_ventas;
                $cos_mtc_g01=$ventasComercial_1['G01']['0105']*$pro_cos_ventas;
                $cos_mtc_u01=$ventasComercial_1['U01']['0105']*$pro_cos_ventas;
                $cos_mtc_s01=$ventasComercial_1['S01']['0105']*$pro_cos_ventas;
                $cos_mtc_dn1=$ventasComercial_1['DN1']['0105']*$pro_cos_ventas;
                $cos_mtc_ds1=$ventasComercial_1['DS1']['0105']*$pro_cos_ventas;
                $tot_cos_mtc=$cos_mtc_y01+$cos_mtc_bt1+$cos_mtc_dp1+$cos_mtc_m01+$cos_mtc_da1+$cos_mtc_dr1+$cos_mtc_r01+$cos_mtc_db1+$cos_mtc_v01+$cos_mtc_g01+$cos_mtc_u01+$cos_mtc_s01+$cos_mtc_dn1+$cos_mtc_ds1;

                //Costos renglón Granel
                
                $cos_gra_y01=$ventasComercial_1['Y01']['0101']*$pro_cos_ventas;
                $cos_gra_bt1=$ventasComercial_1['BT1']['0101']*$pro_cos_ventas;
                $cos_gra_dp1=$ventasComercial_1['DP1']['0101']*$pro_cos_ventas;
                $cos_gra_m01=$ventasComercial_1['M01']['0101']*$pro_cos_ventas;
                $cos_gra_da1=$ventasComercial_1['DA1']['0101']*$pro_cos_ventas;
                $cos_gra_dr1=$ventasComercial_1['DR1']['0101']*$pro_cos_ventas;
                $cos_gra_r01=$ventasComercial_1['R01']['0101']*$pro_cos_ventas;
                $cos_gra_db1=$ventasComercial_1['DB1']['0101']*$pro_cos_ventas;
                $cos_gra_v01=$ventasComercial_1['V01']['0101']*$pro_cos_ventas;
                $cos_gra_g01=$ventasComercial_1['G01']['0101']*$pro_cos_ventas;
                $cos_gra_u01=$ventasComercial_1['U01']['0101']*$pro_cos_ventas;
                $cos_gra_s01=$ventasComercial_1['S01']['0101']*$pro_cos_ventas;
                $cos_gra_dn1=$ventasComercial_1['DN1']['0101']*$pro_cos_ventas;
                $cos_gra_ds1=$ventasComercial_1['DS1']['0101']*$pro_cos_ventas;
                $tot_cos_gra=$cos_gra_y01+$cos_gra_bt1+$cos_gra_dp1+$cos_gra_m01+$cos_gra_da1+$cos_gra_dr1+$cos_gra_r01+$cos_gra_db1+$cos_gra_v01+$cos_gra_g01+$cos_gra_u01+$cos_gra_s01+$cos_gra_dn1+$cos_gra_ds1;                

                //Costos renglón Montacargas

                //Costos renglón Granel 

          ?>                  
              <tr>
                  <td>Kilos Cilindros</td>
                  <td><?php echo number_format($ventasComercial_1['Y01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['BT1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DP1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['M01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DA1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DR1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['R01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DB1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['V01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>  
                  <td><?php echo number_format($ventasComercial_1['G01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['U01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['S01']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DN1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DS1']['0103'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($TOTAL_CIL,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
              </tr>
              <tr>    
                  <td>Kilos Granel</td>
                  <td><?php echo number_format($ventasComercial_1['Y01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['BT1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DP1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['M01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DA1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DR1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['R01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DB1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['V01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>  
                  <td><?php echo number_format($ventasComercial_1['G01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['U01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['S01']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DN1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DS1']['0101'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($TOTAL_GRA,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
              </tr>
              <tr>    
                  <td>Kilos Montacarga</td>
                  <td><?php echo number_format($ventasComercial_1['Y01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['BT1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DP1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['M01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DA1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DR1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['R01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DB1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['V01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>  
                  <td><?php echo number_format($ventasComercial_1['G01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['U01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['S01']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DN1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($ventasComercial_1['DS1']['0105'],2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($TOTAL_MTC,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
              </tr>
              <tr>    
                  <td>Total Ventas KLS</td>
                  <td><?php echo number_format($VENTASKG_Y01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_BT1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_DP1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_M01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_DA1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_DR1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_R01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_DB1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_V01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>  
                  <td><?php echo number_format($VENTASKG_G01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_U01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_S01,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_DN1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($VENTASKG_DS1,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
                  <td><?php echo number_format($TOTAL,2)?></td>
                  <td><?php echo number_format($CERO,2)?></td>
              </tr>
              <tr>    
                  <td>INGRESOS...</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>    
                  <td>CILINDROS $</td>
                  <td><?php echo number_format($cilindrosCli['Y01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_y01,2)?></td>
                  <td><?php echo number_format($cilindrosCli['BT1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_bt1,2)?></td>
                  <td><?php echo number_format($cilindrosCli['DP1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_dp1,2)?></td>
                  <td><?php echo number_format($cilindrosCli['M01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_m01,2)?></td>
                  <td><?php echo number_format($cilindrosCli['DA1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_da1,2)?></td>
                  <td><?php echo number_format($cilindrosCli['DR1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_dr1,2)?></td>
                  <td><?php echo number_format($cilindrosCli['R01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_r01,2)?></td>
                  <td><?php echo number_format($cilindrosCli['DB1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_db1,2)?></td>
                  <td><?php echo number_format($cilindrosCli['V01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_v01,2)?></td>  
                  <td><?php echo number_format($cilindrosCli['G01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_g01,2)?></td>
                  <td><?php echo number_format($cilindrosCli['U01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_u01,2)?></td>
                  <td><?php echo number_format($cilindrosCli['S01'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_s01,2)?></td>
                  <td><?php echo number_format($cilindrosCli['DN1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_dn1,2)?></td>
                  <td><?php echo number_format($cilindrosCli['DS1'],2)?></td>
                  <td><?php echo number_format($pro_ing_cil_ds1,2)?></td>
                  <td><?php echo number_format($INGRESOS_CIL,2)?></td>
                  <td><?php echo number_format($INGRESOS_CIL/$TOTAL_CIL,2)?></td>
              </tr>
              <tr>    
                  <td>MONTACARGAS $</td>
                  <td><?php echo number_format($renglonMontacargas['Y01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_y01,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['BT1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_bt1,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['DP1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_dp1,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['M01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_m01,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['DA1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_da1,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['DR1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_dr1,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['R01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_r01,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['DB1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_db1,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['V01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_v01,2)?></td>  
                  <td><?php echo number_format($renglonMontacargas['G01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_g01,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['U01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_u01,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['S01'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_s01,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['DN1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_dn1,2)?></td>
                  <td><?php echo number_format($renglonMontacargas['DS1'],2)?></td>
                  <td><?php echo number_format($pro_ing_mon_ds1,2)?></td>
                  <td><?php echo number_format($INGRESOS_MON,2)?></td>
                  <td><?php echo number_format($INGRESOS_MON/$TOTAL_MTC,2)?></td>
              </tr>
              <tr>    
                  <td>GRANEL $</td>
                  <td><?php echo number_format($renglonGranel['Y01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_y01,2)?></td>
                  <td><?php echo number_format($renglonGranel['BT1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_bt1,2)?></td>
                  <td><?php echo number_format($renglonGranel['DP1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_dp1,2)?></td>
                  <td><?php echo number_format($renglonGranel['M01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_m01,2)?></td>
                  <td><?php echo number_format($renglonGranel['DA1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_da1,2)?></td>
                  <td><?php echo number_format($renglonGranel['DR1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_dr1,2)?></td>
                  <td><?php echo number_format($renglonGranel['R01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_r01,2)?></td>
                  <td><?php echo number_format($renglonGranel['DB1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_db1,2)?></td>
                  <td><?php echo number_format($renglonGranel['V01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_v01,2)?></td>  
                  <td><?php echo number_format($renglonGranel['G01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_g01,2)?></td>
                  <td><?php echo number_format($renglonGranel['U01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_u01,2)?></td>
                  <td><?php echo number_format($renglonGranel['S01'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_s01,2)?></td>
                  <td><?php echo number_format($renglonGranel['DN1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_dn1,2)?></td>
                  <td><?php echo number_format($renglonGranel['DS1'],2)?></td>
                  <td><?php echo number_format($pro_ing_gra_ds1,2)?></td>
                  <td><?php echo number_format($INGRESOS_GRA,2)?></td>
                  <td><?php echo number_format($INGRESOS_GRA/$TOTAL_GRA,2)?></td>
              </tr>                                
              <tr>    
                  <td>OTROS INGRESOS OPERACIONALES$</td>
                  <td><?php echo number_format($otrosIngresos['Y01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_y01,2)?></td>
                  <td><?php echo number_format($otrosIngresos['BT1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_bt1,2)?></td>
                  <td><?php echo number_format($otrosIngresos['DP1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_dp1,2)?></td>
                  <td><?php echo number_format($otrosIngresos['M01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_m01,2)?></td>
                  <td><?php echo number_format($otrosIngresos['DA1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_da1,2)?></td>
                  <td><?php echo number_format($otrosIngresos['DR1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_dr1,2)?></td>
                  <td><?php echo number_format($otrosIngresos['R01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_r01,2)?></td>
                  <td><?php echo number_format($otrosIngresos['DB1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_db1,2)?></td>
                  <td><?php echo number_format($otrosIngresos['V01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_v01,2)?></td>  
                  <td><?php echo number_format($otrosIngresos['G01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_g01,2)?></td>
                  <td><?php echo number_format($otrosIngresos['U01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_u01,2)?></td>
                  <td><?php echo number_format($otrosIngresos['S01'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_s01,2)?></td>
                  <td><?php echo number_format($otrosIngresos['DN1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_dn1,2)?></td>
                  <td><?php echo number_format($otrosIngresos['DS1'],2)?></td>
                  <td><?php echo number_format($pro_ing_oti_ds1,2)?></td>
                  <td><?php echo number_format($INGRESOS_OTI,2)?></td>
                  <td><?php echo number_format($INGRESOS_OTI/$TOTAL,2)?></td>
              </tr>
              <tr>    
                  <td>TOTAL INGRESOS EN PESOS$</td>
                  <td><?php echo number_format($VENTAPES_Y01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_y01,2)?></td>
                  <td><?php echo number_format($VENTAPES_BT1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_bt1,2)?></td>
                  <td><?php echo number_format($VENTAPES_DP1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_dp1,2)?></td>
                  <td><?php echo number_format($VENTAPES_M01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_m01,2)?></td>
                  <td><?php echo number_format($VENTAPES_DA1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_da1,2)?></td>
                  <td><?php echo number_format($VENTAPES_DR1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_dr1,2)?></td>
                  <td><?php echo number_format($VENTAPES_R01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_r01,2)?></td>
                  <td><?php echo number_format($VENTAPES_DB1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_db1,2)?></td>
                  <td><?php echo number_format($VENTAPES_V01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_v01,2)?></td>  
                  <td><?php echo number_format($VENTAPES_G01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_g01,2)?></td>
                  <td><?php echo number_format($VENTAPES_U01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_u01,2)?></td>
                  <td><?php echo number_format($VENTAPES_S01,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_s01,2)?></td>
                  <td><?php echo number_format($VENTAPES_DN1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_dn1,2)?></td>
                  <td><?php echo number_format($VENTAPES_DS1,2)?></td>
                  <td><?php echo number_format($pro_ing_tot_ds1,2)?></td>
                  <td><?php echo number_format($TOTAL_PES,2)?></td>
                  <td><?php echo number_format($TOTAL_PES/$TOTAL,2)?></td>
              </tr>                                
              <tr>    
                  <td>COSTO CILINDROS</td>
                  <td><?php echo number_format($cos_cil_y01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_bt1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_dp1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_m01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_da1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_dr1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_r01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_db1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_v01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>  
                  <td><?php echo number_format($cos_cil_g01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_u01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_s01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_dn1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_cil_ds1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($tot_cos_cil,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
              </tr>                                
              <tr>    
                  <td>COSTO MONTACRGAS</td>
                  <td><?php echo number_format($cos_mtc_y01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_bt1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_dp1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_m01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_da1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_dr1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_r01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_db1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_v01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>  
                  <td><?php echo number_format($cos_mtc_g01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_u01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_s01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_dn1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_mtc_ds1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($tot_cos_mtc,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
              </tr>                                
              <tr>    
                  <td>COSTO GRANEL</td>
                  <td><?php echo number_format($cos_gra_y01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_bt1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_dp1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_m01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_da1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_dr1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_r01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_db1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_v01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>  
                  <td><?php echo number_format($cos_gra_g01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_u01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_s01,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_dn1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($cos_gra_ds1,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
                  <td><?php echo number_format($tot_cos_gra,2)?></td>
                  <td><?php echo number_format($pro_cos_ventas,2)?></td>
              </tr>                                

          </tbody>
      </table>      
  <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
  </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <script src="<?php echo base_url(); ?>/bootstrap/js/funciones.js"></script>
  </body>
</html>
