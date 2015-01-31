<?php
       $idorden=$_GET['utcdesa'];
      $_SESSION['idorden'] = $idorden;
      
      $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
      $tildes = $mysql->query("SET NAMES 'utf8'");
      $buslider = "SELECT * FROM ordenanzas WHERE id_ordenanza=$idorden ";
      
      if (!$reslider = mysqli_query($mysql,$buslider))
      {
      die('Error: ' . mysqli_error());
      }
      $desa = mysqli_fetch_array($reslider);
      echo'
      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Ingresar ordenanzas</h3>
                        </div>
                            <div class="panel-body">
      <form role="form" action="modord.php" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo" value="'.$desa['titulo'].'">
            </div>
            <div class="form-group">
                <label>Resumen</label>
                <textarea class="form-control" rows="3" name="resumen" id="resumen">'.$desa['resumen'].'</textarea>
            </div>
            <div class="form-group">
                <label>Pdf</label>
                <input class="form-control" type="file" name="pdf" id="pdf">
            </div>
            <div class="form-group">
                <input type="submit" name="modificar" value="modificar" class="btn btn-lg btn-danger btn-block">
            </div>
      </form>
      </div>
      </div>';
      mysqli_close($mysql);
   
    ?>