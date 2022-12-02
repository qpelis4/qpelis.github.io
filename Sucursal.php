<?php
    class Sucursal{
        private $id_sucursal;
        private $nombre_sucu;
        private $calle;
        private $colonia;
        private $municipio;
        private $cod_postal;

        public function inicializar($id_sucursal,$nombre_sucu,$calle,$colonia,$municipio,$cod_postal){
            $this->id_sucursal=$id_sucursal;
            $this->nombre_sucu=$nombre_sucu;
            $this->calle=$calle;
            $this->colonia=$colonia;
            $this->municipio=$municipio;
            $this->cod_postal=$cod_postal;
        }

        public function conectarBD(){
            $con=mysqli_connect("localhost","root","","quepeliz") or die("Problemas con la conexión a la base de datos");
            return $con;
        }
        public function ingresarSucursal(){
            $id=mysqli_query($this->conectarBD(),"SELECT * from sucursal where id_sucursal='$this->id_sucursal'")or die(mysqli_error($this->conectarBD()));
            if ($reg=mysqli_fetch_array($id)){
                    echo "El id de sucursal ingresado ya existe";
            }
            else{
            mysqli_query($this->conectarBD(),"INSERT INTO sucursal(id_sucursal,nombre_sucu,calle,colonia,municipio,cod_postal)
            VALUES('$this->id_sucursal','$this->nombre_sucu','$this->calle','$this->colonia','$this->municipio',$this->cod_postal)")
            or die("Problemas en el insert".mysqli_error($this->conectarBD()));
            echo '<div class="confirmacion"> 
            <h6>La nueva sucursal se almaceno.</h6>
            <div class="regresar"><a href="mantenerSucursal.php">Regresar</a></div>
            <div>';
            }
        }          
        public function listarSucursal(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM sucursal") or die ("Problemas para listar sucursales".mysqli_error($this->conectarBD()));
            echo '<div class="fotoperfil">
            <div class="estrenos"><h1>¡Sucu<span class="main-color">r</span>sales!</h1>
            </div>
            <table class="table_pelicula">';
            echo '<tr>
             <th><a href="formulario_sucursal.html">Agregar  <i class="fa-solid fa-circle-plus"></i></a> </th></i>
                </tr>
                <tr>
                <th>Id sucursal</th><th>Nombre</th><th>Calle</th><th>Colonia</th><th>Municipio</th><th>Codigo postal</th><th colspan="2">Operaciones</th>
                </tr>';
            while($sucursal=mysqli_fetch_array($registros)){
                echo '<tr><td>'.$sucursal['id_sucursal'].'</td>';
                echo '<td>'.$sucursal['nombre_sucu'].'</td>';
                echo '<td>'.$sucursal['calle'].'</td>';
                echo '<td>'.$sucursal['colonia'].'</td>';
                echo '<td>'.$sucursal['municipio'].'</td>';
                echo '<td>'.$sucursal['cod_postal'].'</td>';
                echo '<td><a href="eliminarSucursal.php?id_sucursal='.$sucursal['id_sucursal'].'"><i class="fa-solid fa-trash-can"></a></td>
                <td><a href="ctrlmodificarSucursal.php?&id_sucursal='.$sucursal['id_sucursal'].'"><i class="fa-solid fa-pen-to-square"></i></td>';
            }
            echo '</table>';
        }

        public function eliminarSucursal($id_sucursal){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM sucursal WHERE id_sucursal = '$id_sucursal'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));
			if($sucursal=mysqli_fetch_array($registro)){
				mysqli_query($this->conectarBD(),"DELETE FROM sucursal WHERE id_sucursal = '$id_sucursal'") or die("Problemas para eliminar sucursal".mysqli_error($this->conectarBD()));    
				echo '<div class="confirmacion"> 
                <h6>Se ha eliminado la sucursal.</h6>
                <div class="regresar"><a href="mantenerSucursal.php">Regresar</a></div>
                <div>';	  
			}      
			else{
				echo 'No existe una sucursal con ese id';
			}	
		}
                

       public function modificarSucursal($id_sucursal){
            $registro=mysqli_query($this->conectarBD(),"SELECT * FROM sucursal WHERE id_sucursal = '$id_sucursal'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));
			if($sucursal=mysqli_fetch_array($registro)){
                echo '<section id="registro">
                <span class="colorAzul">
                    <h2>Modificar Sucursal</h2>
                </span>
                <div class="contenedores">
                    <div id="Fregistro">
        
                        <form action="ctrlmodificarSucursal2.php" method="post" enctype="multipart/form-data">
        
                            <br><label for="" class="form__label">Id Cine</label><br>
                            <input type="text" name="id_sucursal" value='.$sucursal['id_sucursal'].'><br>
        
                            <br><label for="" class="form__label">Nombre</label><br>
                            <input type="text" name="nombre_sucu" value='.$sucursal['nombre_sucu'].'><br>
        
        
                            <br><label for="" class="form__label">Calle</label><br>
                            <input type="text" name="calle" value='.$sucursal['calle'].'><br>
        
                            <br><label for="" class="form__label">Colonia</label><br>
                            <input type="text" name="colonia" value='.$sucursal['colonia'].'><br>
        
                            <br><label for="" class="form__label">Municipio</label><br>
                            <input type="text" name="municipio" value='.$sucursal['municipio'].'><br>
        
                            <br><label for="" class="form__label">Código Postal</label><br>
                            <input type="number" name="cod_postal" value='.$sucursal['cod_postal'].'><br>
                            
                            <button type="submit" id="boton" name="opcion" value="cargarImagenP">Modificar</button><button><a href="mantenerSucursal.php">Volver</a></button>
                        </form>
                    </div>
                </div>
            </section>';
                
            } 
            else {
                echo "No existe sucursal con dicho id";
            }
        }

        public function modificarSucursal2($id_sucursal,$nombre_sucu,$calle,$colonia,$municipio,$cod_postal){
            $genero=mysqli_query($this->conectarBD(),"UPDATE sucursal SET id_sucursal= '$id_sucursal', nombre_sucu='$nombre_sucu', calle='$calle', colonia='$colonia', municipio='$municipio', cod_postal=$cod_postal WHERE id_sucursal = '$id_sucursal'") or die("Error en la actualización ".mysqli_error($this->conectarBD()));
  	
	        echo '<div class="confirmacion"> 
            <h6>Los datos se modificaron correctamente</h6>
            <div class="regresar"><a href="mantenerSucursal.php">Regresar</a></div>
            <div>';	
        }


        public function cerrarBD(){
            mysqli_close($this->conectarBD());
        }
        }

?>