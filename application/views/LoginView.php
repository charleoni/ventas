<html lang="en">
  <title>Informes Ventas</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Evitda</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/style.css">
    
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
        <h1 class="mt-5"><?php echo $titulo; ?></h1>
    </main>

    <div class="container stylos">
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <div class="form-group">
            <label for="exampleFormControlInput1">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control">
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <div class="form-group">
            <label for="exampleFormControlInput1">Contraseña</label>
            <input type="password" name="clave" id="clave" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="form-group">
            <button id="btnAceptar" type="button" class="btn btn-primary" > Aceptar </button>
          </div>
        </div>
      </div>  
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Desarrollado por Ingeniero Carlos Alcala Payares - @2018</span>
      </div>
    </footer>

    <div id="loading" class="loading" style="display:none;">
      <p><img src="./img/ajax-loader.gif" /> Cargando información...</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script src="<?php echo base_url(); ?>sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src='<?php echo base_url(); ?>js/login.js'></script>
  </body>
</html>
