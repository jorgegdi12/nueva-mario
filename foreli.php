<?php 
             $mysql = mysqli_connect("localhost", "mariomar_marin", "Marin123","mariomar_mario")or die("Error " . mysqli_error($mysql));
              $tildes = $mysql->query("SET NAMES 'utf8'"); //Para que se muestren las tíldes     
              
            $buslider = "SELECT id_ordenanza,titulo FROM ordenanzas";
              
              if (!$reslider = mysqli_query($mysql,$buslider))
              {
              die('Error: ' . mysqli_error());
              }
              while($desa = mysqli_fetch_array($reslider)){
            echo'
                        <tbody>
                            <tr>
                                <td>'.$desa['titulo'].'</td>
                                <td><a class="btn btn-lg btn-danger btn-block" href="eliord.php?utcdesa='.$desa['id_ordenanza'].'">Eliminar</a></td>
                                <td><a class="btn btn-lg btn-danger btn-block" href="adminord.php?utcdesa='.$desa['id_ordenanza'].'">Modificar</a></td>
                            </tr>
                        </tbody>';
            }
            mysqli_close($mysql);
            echo $_GET['mensaje'] ;
 ?> 