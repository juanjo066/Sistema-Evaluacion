<?php 
require_once("inicio.php");
?>   
<section class="content">
  <?php 
    //Verificar la conexión
    $conex = datosConex();
    if ($conex==true){
      datosEvaluador();
    }

  	$_SESSION['idEvaluador'] = 1; //Tengo que obtener el agente que se logueó


    function datosEvaluador(){
      global $conexion;
      echo "<p>Bienvenido! Id evaluador: ".$_SESSION['idEvaluador']."</p>";
      //Nombre y apellido del evaluador
      $consulta = "SELECT  apellido, nombre FROM agente WHERE idAgente = ".$_SESSION['idEvaluador'];
      $datos = mysqli_query($conexion, $consulta);
      if (mysqli_num_rows($datos) > 0) {

        while($fila = mysqli_fetch_assoc($datos))
        echo "<p>El usuario es: ".$fila["apellido"]." ".$fila["nombre"]."</p>";
        
      }else{
        echo "<p>Sin resultados</p>";
      }
      $consulta = "SELECT sector FROM agente WHERE idAgente = ".$_SESSION['idEvaluador'];
      $datos = mysqli_query($conexion, $consulta);

      if (mysqli_num_rows($datos) > 0) {

        while($fila = mysqli_fetch_assoc($datos)) {
        $_SESSION['sector'] = $fila['sector'];
        echo "El sector del usuario es: ".$_SESSION['sector']."<br/>";
        }

      echo "<div class = 'botonesNavegacion'>
        <a href='agentes.php' id='btnIndex'><button type='button' class='btn btn-block btn-primary btn-sm-4' onclick='clickIndex()'>Evaluar Agentes</button></a>
        <br/>
        <a href='encargados.php'><button type='button' class='btn btn-block btn-info btn-sm-5'>Para Encargados</button></a> 
      </div>";
      }else{
        echo "<p>Sin resultados</p>";
      }
    }

?>

<?php
 include "fin.php";
?>

