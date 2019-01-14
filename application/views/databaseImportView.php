<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Evitda</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
  </head>
  <body>

    <header>
        <h1>-</h1>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Fixed navbar</a>
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
        <h1 class="mt-5"><?php //echo $titulo; ?></h1>
    </main>

<table class="table">
    <thead>
      <tr>
        <th>CUENTA</th>
        <th>SALDO_INICIAL</th>
        <th>DEBITO</th>
        <th>CREDITO</th>
        <th>SALDO FINAL</th>
        <th>CO</th>
        <th>CC</th>
      </tr>
    </thead>
    <tbody>
    <?php    
//        foreach($user_entrys as $fila)
//        {
//            $queryInsert = "";
//            $queryValue = "";
//            
//            $queryInsert = "INSERT INTO EVITDA (CUENTA,
//                                              SALDO_INICIAL,
//                                              DEBITO,
//                                              CREDITO,
//                                              NUEVO_SALDO,
//                                              ID_CO,
//                                              ID_CCONIV4)
//                    VALUES (";
    ?>
<!--        <tr>
            <td><?php $cuenta = $fila->CUENTA; echo $cuenta; $queryValue .= $cuenta.",";?></td>
            <td><?php $saldoInicial = $fila->SALDO_INICIAL; echo $saldoInicial; $queryValue .= $saldoInicial.","; ?></td>
            <td><?php $debito = $fila->DEBITO; echo $debito; $queryValue .= $debito.","; ?></td>
            <td><?php $credito = $fila->CREDITO; echo $credito; $queryValue .= $credito.","; ?></td>
            <td><?php $nuevoSaldo = $fila->NUEVO_SALDO; echo $nuevoSaldo; $queryValue .= $nuevoSaldo.",'"; ?></td>
            <td><?php $idCo = $fila->ID_CO; echo $idCo; $queryValue .= $idCo."','"; ?></td>
            <td><?php $idCconiv4 = $fila->ID_CCONIV4; echo $idCconiv4; $queryValue .= $idCconiv4."')"; ?></td>
        </tr>-->
    <?php    
        
//       }
    ?>
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
  </body>
</html>