<?php
require ("funciones.php");

seguridadIndex();

$error = 0;
$registrar=0;

if(isset($_POST['registrar']))
{    
    $registrar = 1;
    $error = registrarUsuario(limpiar($_POST['user']), $_POST['pass']);
   
}
else if(isset($_POST['login']))
{
    $recordarme=0;
    if(isset($_POST['recordarme']))$recordarme=1;
    $error = login(limpiar($_POST['user']), $_POST['pass'],$recordarme);
    if($error>0)
    {
        header("Location: admin.php");
        exit();
    }
    
}
?>

<!doctype html>
<html>
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
    <section id="pilares">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Bienvenidos ingresar los datos</h3>
                    </div>
                    <div class="panel-body">
             <form name="login" method="post" action="">
                      <table cellspacing="20">
                          <tr><td><label for="usuario">Usuario: </label></td>   <td><input type="text" id="user" name="user" <?php if($registrar && $error>0) echo 'value="'.limpiar($_POST['user']).'"'; ?>/></td></tr>
                          <tr><td> <label for="usuario"> Clave: </label></td>   <td><input type="password" id="pass" name="pass" /></td></tr>
                          <tr><td> </td>
                              <td align="right"><!--<input type="submit" name="registrar" id="registrar" value="Registrar" />--><input type="submit" name="login" id="login" value="Login" /></td></tr>
                      </table>
                  </div>
                </div>
            </div>
          <?php
            switch ($error) {
                case -1://login
                    echo '<br/><strong>Usuario o clave incorrecta</strong>';
                    break;
                case -2://registro
                    echo '<br/><strong>Error al registrarse. Usuario ya existente.</strong>';
                    break;
                case -3://registro
                    echo '<br/><strong>El usuario y la contraseña deben tener como mínimo 4 carácteres.</strong>';
                    break;
                default:
                    if($registrar) echo '<br/><strong>Se ha registrado correctamente.</strong>';
                    break;
            }
          ?>
          </form>
          </div>
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