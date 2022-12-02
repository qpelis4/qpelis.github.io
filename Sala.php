<?php
    class Sala{
        private $id_sala;
        private $tipo_sala;
        private $horario;

        public function inicializar($id_sala,$tipo_sala,$horario){
            $this->id_sala=$id_sala;
            $this->tipo_sala=$tipo_sala;
            $this->horario=$horario;
        }

        public function conectarBD(){
            $con=mysqli_connect("localhost","root","","quepeliz") or die("Problemas con la conexión a la base de datos");
            return $con;
        }
        public function ingresarSala(){
            $id=mysqli_query($this->conectarBD(),"SELECT * from sala where id_sala='$this->id_sala'")or die(mysqli_error($this->conectarBD()));
            if ($reg=mysqli_fetch_array($id)){
                    echo "El id de sucursal ingresado ya existe";
            }
            else{
            mysqli_query($this->conectarBD(),"INSERT INTO sala(id_sala,tipo_sala,horario)
            VALUES('$this->id_sala','$this->tipo_sala','$this->horario')")
            or die("Problemas en el insert".mysqli_error($this->conectarBD()));
            echo '<div class="confirmacion"> 
            <h6>La nueva sala se almaceno.</h6>
            <div class="regresar"><a href="mantenerSala.php">Regresar</a></div>
            <div>';
            }
        }          
        public function listarSala(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM sala") or die ("Problemas para listar salas".mysqli_error($this->conectarBD()));
            echo '<div class="fotoperfil">
            <div class="estrenos"><h1>¡Sa<span class="main-color">l</span>as!</h1>
            </div>
            <table class="table_pelicula">';
            echo '<tr>
             <th><a href="formulario_sala.html">Agregar  <i class="fa-solid fa-circle-plus"></i></a> </th></i>
                </tr>
                <tr>
                <th>Id sala</th><th>Tipo de sala</th><th>Horario</th><th colspan="2">Operaciones</th>
                </tr>';
            while($sala=mysqli_fetch_array($registros)){
                echo '<tr><td>'.$sala['id_sala'].'</td>';
                echo '<td>'.$sala['tipo_sala'].'</td>';
                echo '<td>'.$sala['horario'].'</td>';
                echo '<td><a href="eliminarSala.php?id_sala='.$sala['id_sala'].'"><i class="fa-solid fa-trash-can"></a></td>
                <td><a href="ctrlmodificarSala.php?&id_sala='.$sala['id_sala'].'"><i class="fa-solid fa-pen-to-square"></i></td>';
            }
            echo '</table>';
        }

        public function eliminarSala($id_sala){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM sala WHERE id_sala = '$id_sala'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));
			if($sala=mysqli_fetch_array($registro)){
				mysqli_query($this->conectarBD(),"DELETE FROM sala WHERE id_sala = '$id_sala'") or die("Problemas para eliminar sala".mysqli_error($this->conectarBD()));    
				echo '<div class="confirmacion"> 
                <h6>Se ha eliminado la sala correctamente.</h6>
                <div class="regresar"><a href="mantenerSala.php">Regresar</a></div>
                <div>';	  
			}      
			else{
				echo 'No existe una sala con ese id';
			}	
		}
                

       public function modificarSala($id_sala){
            $registro=mysqli_query($this->conectarBD(),"SELECT * FROM sala WHERE id_sala = '$id_sala'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));
			if($sala=mysqli_fetch_array($registro)){
                echo '<section id="registro">
                <span class="colorAzul">
                    <h2>Modificar Sala</h2>
                </span>
                <div class="contenedores">
                    <div id="Fregistro">
        
                        <form action="ctrlmodificarSala2.php" method="post" enctype="multipart/form-data">
        
                            <br><label for="" class="form__label">Id Sala</label><br>
                            <input type="text" name="id_sala" value='.$sala['id_sala'].'><br>
        
                            <br><label for="" class="form__label">Tipo sala</label><br>
                            <input type="text" name="tipo_sala" value='.$sala['tipo_sala'].'><br>
        
        
                            <br><label for="" class="form__label">Horario</label><br>
                            <input type="time" name="horario" value='.$sala['horario'].'><br>
        
                           
                            <button type="submit" id="boton" name="opcion" value="cargarImagenP">Modificar</button><button><a href="mantenerSala.php">Volver</a></button>
                        </form>
                    </div>
                </div>
            </section>';
                
            } 
            else {
                echo "No existe sala con dicho id";
            }
        }

        public function modificarSala2($id_sala,$tipo_sala,$horario){
            $genero=mysqli_query($this->conectarBD(),"UPDATE sala SET id_sala= '$id_sala', tipo_sala='$tipo_sala', horario='$horario' WHERE id_sala = '$id_sala'") or die("Error en la actualización ".mysqli_error($this->conectarBD()));
  	
	        echo '<div class="confirmacion"> 
            <h6>Los datos se modificaron correctamente</h6>
            <div class="regresar"><a href="mantenerSala.php">Regresar</a></div>
            <div>';	
        }


        public function cerrarBD(){
            mysqli_close($this->conectarBD());
        }
        }

?>