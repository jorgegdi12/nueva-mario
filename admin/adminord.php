<?php
require ("funciones.php");
$error = 0;

 seguridad(); //comprobamos que se esté logueado

if(isset($_POST['salir']))
{    
    
    destruirCookie($_COOKIE['identificado']);
    
    $_SESSION = array();
 
    //guardar el nombre de la sessión para luego borrar las cookies
    $session_name = session_name();
 
    //Para destruir una variable en específico
    unset($_SESSION['usuario']);
 
    // Finalmente, destruye la sesión
    session_destroy();
 
    // Para borrar las cookies asociadas a la sesión
    // Es necesario hacer una petición http para que el navegador las elimine
    if ( isset( $_COOKIE[ $session_name ] ) ) {
        setcookie($session_name, '', time()-3600, '/');   
    }
    if(isset($_COOKIE['identificado'])){
        setcookie('identificado', '', time()-3600, '/'); 
    }
    header("Location: admin.php");
    exit();
   
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mario Marín Hincapié</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
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
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <figure id="logo"><img class="img-responsive center-block" src="imagenes/logo_icon.png" alt="logo"></figure>
          </div>
          <div class="col-lg-8">
          <nav class="navbar navbar-default" id="menu" role="navigation"> 
             <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
             </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav text-center">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="noticias.html">Noticias</a></li>
                <li><a href="galeria.html">Galeria</a></li>
                <li><a href="contactenos.html">Contáctenos</a></li>
              </ul>
             </div>
          </nav>
        </div>
      </div>
    </div>
    </header>
    </section>
    <section class="admin">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p><i class="icon-user isep"></i>Hola Norma</p>
          </div>
          <div class="col-lg-6">
            <p class="text-right"><i class="icon-off isep"></i><a href="#">cerrar sesión</a></p>
          </div>
        </div>
      </div>
    </section>
    <section id="pilares">
      <div class="container">
        <div class="row">
                  <div class="col-lg-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Ingresar ordenanzas</h3>
                        </div>
                        <!-- .panel-heading -->
                            <div class="panel-body">
                                <form role="form" action="ingord.php" enctype="multipart/form-data" method="post">
                                          <div class="form-group">
                                              <label>Titulo</label>
                                              <input class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label>Resumen</label>
                                              <textarea class="form-control" rows="3"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label>File input</label>
                                              <input type="file">
                                          </div>
                                          <a class="btn btn-lg btn-danger btn-block" href="#">Ingresar</a>
                                </form>
                            </div>
                        </div>
                        <!-- .panel-body -->
<?php
}
if (isset($_GET['utcdesa'])){
  $idorden=$_GET['utcdesa'];
  $_SESSION['utcdesa'] = $idorden;
  
  $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
  $tildes = $mysql->query("SET NAMES 'utf8'");
  $buslider = "SELECT * FROM ordenanzas WHERE id_ordenanza=$idorden ";
  
  if (!$reslider = mysqli_query($mysql,$buslider))
  {
  die('Error: ' . mysqli_error());
  }
  $desa = mysqli_fetch_array($reslider);
  echo'
  <form role="form" action="ingord.php" enctype="multipart/form-data" method="post">
      <div class="form-group">
      <label>Titulo</label>
      <input type="text" name="titulo" class="campo" value="'.$desa['titulo'].'" class="form-control">
      </div>
        <div class="form-group">
            <label>Resumen</label>
            <textarea class="form-control" rows="3" name="resumen" id="resumen" />'.$desa['resumen'].'</textarea>
        </div>
        <div class="form-group">
            <label>File input</label>
            <input type="file" name="pdf" id="pdf">
        </div>
      <input type="submit" name="login" id="login" value="Ingresar"class="btn btn-lg btn-danger btn-block" />
 </form>';

  mysql_close($mysql);
}
?>

<?php 
 $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
  $tildes = $mysql->query("SET NAMES 'utf8'"); //Para que se muestren las tíldes     
  
$buslider = "SELECT id_ordenanza,titulo FROM ordenanzas";
  
  if (!$reslider = mysqli_query($mysql,$buslider))
  {
  die('Error: ' . mysql_error());
  }
  ?>
  <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Ordenanzas</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
  <?php
  while($desa = mysqli_fetch_array($reslider)){
echo'
      <tr>
          <td>'.$desa['titulo'].' </td>
          <td><a class="btn btn-lg btn-danger btn-block" href="ordenanzas.php?utcdesa='.$desa['id_ordenanza'].'">Eliminar</a></td>
          <td><a class="btn btn-lg btn-danger btn-block" href="ordenanzas.php?utcdesa='.$desa['id_ordenanza'].'">Modificar</a></td>
      </tr>';
  }
  ?>
                                      </tbody>
                                </table>
                                <input type="submit" name="login" id="login" value="Volver al menu principal" class="btn btn-lg btn-danger btn-block" />
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    </div>
                    <!-- /.panel -->
  <?php
mysqli_close($mysql);
echo'</table>';
  if($_GET['delok']==1)echo "se ha eliminado correctamente";
  if($_GET['modok']==1)echo "la modificación fue correcta";
echo'</section>';
?>

                        
                                        

        </div>
      </div>
    </section>
     <footer>
       <div class="container">
         <div class="row">
           <div class="col-lg-4">
             <p>Síguenos a través de: </p>
             <div class="row">
               <div class="col-lg-6">
                 <ul>
                  <li><a href="index.html">Inicio</a></li>
                  <li><a href="#sobremi">Sobre mi</a></li>
                  <li><a href="galeria.html">Galería</a></li>
                  <li><a href="noticias.html">Noticias</a></li>
                 </ul>
               </div>
               <div class="col-lg-6">
                 <ul>
                   <li><a href="contactenos.html">Contáctenos</a></li>
                   <li><a href="#">Links relacionados</a></li>
                 </ul>
               </div>
             </div>
           </div>
           <div class="col-lg-4 contactos">
             <p><img src="imagenes/telefono_icon.png" alt="celular">
             3136615126</p>
             <p><img src="imagenes/correo_icon.png" alt="correo">
             mario.418@hotmail.com</p>
             <p><img src="imagenes/seguir_icon.png" alt="seguir">
             Síguenos:
             <img src="imagenes/twitter_icon.png" alt="twittet">
             <img src="imagenes/facebook_icon.png" alt="facebook">
             </p>
           </div>
           <div class="col-lg-4 partido">
             <img src="imagenes/partido_icon.png" alt="partido">
           </div>
         </div>
       </div>
     </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>