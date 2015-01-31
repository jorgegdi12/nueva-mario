<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mario Marín Hincapié</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fuentes.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header id="encabezado">
      <?php
     include("header.html");
      ?>
    </header>
    <div class="container galeria">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 text-center">
          <h1>Ordenanzas</h1>
        </div>
      </div>
    <?php
  $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
  $tildes = $mysql->query("SET NAMES 'utf8'"); //Para que se muestren las tíldes     
  $buscar = "SELECT * FROM  ordenanzas";
  
  if (!$resultado = mysqli_query($mysql,$buscar))
    {
    die('Error: ' . mysqli_error());
    }
  $i=1;
  while($rs = mysqli_fetch_array($resultado)){
     ?>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading<?php echo $i?>">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i?>" aria-expanded="true" aria-controls="collapse<?php echo $i?>">
         <?php echo $rs['titulo']?>
          </a>
        </h4>
      </div>
      <div id="collapse<?php echo $i?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $i?>">
        <div class="panel-body">
          <?php echo $rs['resumen']?><br>
          <a href="<?php echo $rs['pdf']?>">Ver pdf</a>
        </div>
      </div>
    </div>
  </div>
<?php 
 $i++;
}
  mysqli_free_result($resultado);
  mysqli_close($mysql);
  ?>
  </div>
    <footer>
       <?php
     include("header.html");
      ?>
     </footer>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- gallery -->
 </body>
</html>