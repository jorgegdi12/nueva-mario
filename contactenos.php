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
          <h1>Contáctenos</h1>
        </div>
      </div>
      <div class="col-lg-8">
              <form method="post" action="enviar.php">
            <div class="form-group">
              <input type="text" class="form-control campo" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
              <input type="text" class="form-control campo" name="telefono" placeholder="Teléfono">
            </div>
            <div class="form-group">
              <input type="email" class="form-control campo" name="email" placeholder="Correo electónico">
            </div>
            <textarea class="form-control campo" rows="5" name="descripcion" placeholder="Descripción"></textarea>
            <div class="form-group">
              <button type="submit" name="enviar" class="btnenvia">Enviar</button>
            </div>
            </form>
       </div>
      <div class="col-lg-4">
        <img class="img-responsive center-block" src="imagenes/foto_contacto.jpg" alt="contactos">
      </div>
      

    </div>
    <footer>
      <?php
     include("footer.html");
      ?>
     </footer>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>