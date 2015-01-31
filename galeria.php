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
    <!-- animate.css -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

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
    <section class="galeria1">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 text-center">
          <h1>Galería</h1>
        </div>
      </div>
    </section>
    <section id="portfolio">
        <div class="container">
            <div class="center">
               <p class="lead">Aquí encontraras todas las imagenes del diputado</p>
            </div>
            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">Todas las galerias</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".familia">Familia</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".ambiente">Medio Ambiente</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".deporte">Deporte</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".campana">Campaña</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".eventos">Eventos</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".copa">Copa Mario Marín </a></li>
            </ul><!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
                  <?php
  $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
  $tildes = $mysql->query("SET NAMES 'utf8'"); //Para que se muestren las tíldes     
  $buscar = "SELECT * FROM  galeria";
  
  if (!$resultado = mysqli_query($mysql,$buscar))
    {
    die('Error: ' . mysqli_error());
    }
   while($rs = mysqli_fetch_array($resultado)){
     ?>
    <div class="portfolio-item <?php echo $rs['categoria'];?> col-xs-12 col-sm-4 col-md-3">
        <div class="recent-work-wrap">
            <img class="img-responsive" src="<?php echo $rs['thumb'];?>" alt="">
            <div class="overlay">
                <div class="recent-work-inner">
                    <h3><a href="#"><?php echo $rs['titulo'];?></a></h3>
                    <p><?php echo $rs['descripcion'];?></p>
                    <a class="preview" href="<?php echo $rs['imagen'];?>" rel="prettyPhoto"><i class="fa fa-eye"></i> Ver</a>
                </div> 
            </div>
        </div>
    </div><!--/.portfolio-item-->
<?php
}
?>
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
     <footer>
       <?php
     include("footer.html");
      ?>
     </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
         <script src="js/main.js"></script>
         <script src="js/jquery.prettyPhoto.js"></script>
         <script src="js/jquery.isotope.min.js"></script>
         <script src="js/wow.min.js"></script>
  </body>
</html>