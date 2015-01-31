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
    <script src="js/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
    <header id="encabezado">
      <?php
     include("header.html");
      ?>
    </header>
  <section class="galeria">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 text-center">
          <h1>Noticias</h1>
        </div>
      </div>
      <?php
  $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
  $tildes = $mysql->query("SET NAMES 'utf8'"); //Para que se muestren las tíldes     
  $buscar = "SELECT * FROM  noticias";
  if (!$resultado = mysqli_query($mysql,$buscar))
    {
    die('Error: ' . mysqli_error());
    }
  
  while($rs = mysqli_fetch_array($resultado)){
  $fecha = $rs['fecha']; 
list($anio, $mes, $dia) = explode("-",$fecha);
  ?>
      <div class="row">
        <div class="col-lg-1 fechanoti">
          <?php 
           if($mes==01){echo "Enero";}
           if($mes==02){echo "Febrero";}
           if($mes==03){echo "Marzo";}
           if($mes==04){echo "Abril";}
           if($mes==05){echo "Mayo";}
           if($mes==06){echo "Junio";}
           if($mes==07){echo "Julio";}
           if($mes==08){echo "Agosto";}
           if($mes==09){echo "Septiembre";}
           if($mes==10){echo "Octubre";}
           if($mes==11){echo "Noviembre";}
           if($mes==12){echo "Diciembre";}
          ?> <br>
          <span class="dianoti"><?php echo $dia;?></span>
        </div>
        <div class="col-lg-11 reco">
         <p><?php echo $rs['titulo'];?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <img src="<?php echo $rs['imagen'];?>" alt="noticia" class="notimg">
        </div>
        <div class="col-lg-6 col-lg-offset-1 parranoti">
          <?php echo $rs['contenido'];?>
        </div>
      </div>
    <hr class="barra">
    <div class="row">
      <div class="col-lg-2 col-lg-offset-10">
        <a href="#"><img src="imagenes/twitter_icon_rojo.png" alt="twitter-rojo"></a>
        <a href="#"><img src="imagenes/facebook_icon_rojo.png" alt="facebook-rojo"></a>
      </div>
    </div>
    <hr class="barra">
    <?php
    }
    ?>
    </div>
  </section> 
     <footer>
       <?php
     include("footer.html");
      ?>
     </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- gallery -->
 </body>
</html>