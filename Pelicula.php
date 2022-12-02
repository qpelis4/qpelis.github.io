<?php
    class Pelicula{
        private $id_peli;
        private $imagen;
        private $titulo;
        private $clasificacion;
        private $duracion;
        private $genero;
        private $sinopsis;
        private $reparto;
        private $directores;
        private $estatus;

        public function inicializar($id_peli, $imagen,$titulo,$clasificacion,$duracion,$genero,$sinopsis,$reparto, $directores,$estatus){
            $this->id_peli=$id_peli;
            $this->imagen=$imagen;
            $this->titulo=$titulo;
            $this->clasificacion=$clasificacion;
            $this->duracion=$duracion;
            $this->genero=$genero;
            $this->sinopsis=$sinopsis;
            $this->reparto=$reparto;
            $this->directores=$directores;
            $this->estatus=$estatus;
        }

        public function conectarBD(){
            $con=mysqli_connect("localhost","root","","quepeliz") or die("Problemas con la conexión a la base de datos");
            return $con;
        }

        public function ingresarPelicula(){
            $id=mysqli_query($this->conectarBD(),"SELECT * from pelicula where id_peli='$this->id_peli'")or die(mysqli_error($this->conectarBD()));
            if ($pelicula=mysqli_fetch_array($id)){
                    echo "El id de pelicula ingresado ya existe";
            }
            else{
            mysqli_query($this->conectarBD(),"INSERT INTO pelicula (id_peli,imagen,titulo,clasificacion,duracion,genero,sinopis,reparto,directores,estatus)
            VALUES('$this->id_peli','$this->imagen','$this->titulo','$this->clasificacion','$this->duracion','$this->genero','$this->sinopsis','$this->reparto','$this->directores','$this->estatus')")
            or die("Problemas en el insert".mysqli_error($this->conectarBD()));
            echo '<div class="confirmacion"> 
            <h6>La nueva pelicula se almaceno.</h6>
            <div class="regresar"><a href="mantenerPelicula.php">Regresar</a></div>
            <div>';
            }
        }     
        public function listarPelicula(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM pelicula") or die ("Problemas para listar peliculas".mysqli_error($this->conectarBD()));
            echo '<div class="estrenos"><h1>Pel<span class="main-color">i</span>culas!</h1>
            <table class="table_pelicula">';
            echo '<tr>
                <th><a href="formulario_pelicula.html">Agregar  <i class="fa-solid fa-circle-plus"></i></a> </th></i>
                </tr>
                <tr>
                <th>Id pelicula</th><th>Imagen</th><th>Titulo</th><th>Clasificacion</th><th>Duracion</th><th>Genero</th>
                <th>Sinopsis</th><th>Reparto</th><th>Directores</th><th>Status</th><th colspan="2">Operaciones</th>
                </tr>';
            while($pelicula=mysqli_fetch_array($registros)){
                echo '<tr><td>'.$pelicula['id_peli'].'</td>';
                echo '<td><img class="imgcol" src="'.$pelicula['imagen'].'" alt=""></td>';
                echo '<td>'.$pelicula['titulo'].'</td>';
                echo '<td>'.$pelicula['clasificacion'].'</td>';
                echo '<td>'.$pelicula['duracion'].'</td>';
                echo '<td>'.$pelicula['genero'].'</td>';
                echo '<td>'.$pelicula['sinopis'].'</td>';
                echo '<td>'.$pelicula['reparto'].'</td>';
                echo '<td>'.$pelicula['directores'].'</td>';
                echo '<td>'.$pelicula['estatus'].'</td>';
                echo '<td><a href="eliminarPelicula.php?id_peli='.$pelicula['id_peli'].'"><i class="fa-solid fa-trash-can"></a></td>
                <td><a href="ctrlmodificarPelicula.php?&id_peli='.$pelicula['id_peli'].'"><i class="fa-solid fa-pen-to-square"></i></td>';
            }
            echo '</div></table>';
        }

        public function eliminarPelicula($id_peli){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM pelicula WHERE id_peli = '$id_peli'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));
			if($pelicula=mysqli_fetch_array($registro)){
                // echo 'id peli: '.$pelicula['id_peli'].'<br>';
                // echo 'Imagen: '.$pelicula['imagen'].'<br>';
                // echo 'Titulo: '.$pelicula['titulo'].'<br>';
                // echo 'Clasificacion: '.$pelicula['clasificacion'].'<br>';
                // echo 'Duracion: '.$pelicula['duracion'].'<br>';
                // echo 'Genero: '.$pelicula['genero'].'<br>';
                // echo 'Sinopsis: '.$pelicula['sinopis'].'<br>';
                // echo 'Reparto: '.$pelicula['reparto'].'<br>';
                // echo 'Directores: '.$pelicula['directores'].'<br>';
                // echo 'Estatus: '.$pelicula['estatus'].'<br>';
        
				mysqli_query($this->conectarBD(),"DELETE FROM pelicula WHERE id_peli = '$id_peli'") or die("Problemas para eliminar pelicula".mysqli_error($this->conectarBD()));    
				echo '<div class="confirmacion"> 
                <h6>Se ha eliminado la pelicula correctamente.</h6>
                <div class="regresar"><a href="mantenerPelicula.php">Regresar</a></div>
                <div>';	  
			}      
			else{
				echo 'No existe una pelicula con ese id';
			}	
		}
                

        public function modificarPelicula($id_peli){
            $registro=mysqli_query($this->conectarBD(),"SELECT * FROM pelicula WHERE id_peli = '$id_peli'") or die ("Problemas con la consulta".mysqli_error($this->conectarBD()));
			if($pelicula=mysqli_fetch_array($registro)){
                echo '
                <section id="registro">
        <span class="colorAzul">
            <h2>Agregar Pélicula</h2>
        </span>
        <div class="contenedores">
            <div id="Fregistro">

                <form action="ctrlmodificarPelicula2.php" method="post" enctype="multipart/form-data">

                    <br><label for="" class="form__label">Id de la pélicula</label><br>
                    <input type="text" name="id_peli" value='.$pelicula['id_peli'].'required><br>
                    
                    <div class="form-col">
                        <label for="" class="form__label">Imagen de la pelicula</label>
                        <input id="imagen" class="input" type="file" name="imagen" value='.$pelicula['imagen'].'>
                    </div>
                    
                    <label for="" class="form__label">Título</label><br>
                    <input type="text" name="titulo" value='.$pelicula['titulo'].'><br>

                    <label for="" class="form__label">Clasificacion</label><br>
                    <select name="clasificacion" id="tam" value='.$pelicula['clasificacion'].'><br>
                        <option value="chica">A</option>
                        <option value="mediana">B</option>
                        <option value="Grande">C</option>
                    </select>

                    <label for="" class="form__label">Duracion</label><br>
                    <input type="text" name="duracion" value='.$pelicula['duracion'].'><br>

                    <label for="" class="form__label">Genero</label><br>
                    <select name="genero" id="tam" value='.$pelicula['genero'].'><br>
                        <option value="terror">terror</option>
                        <option value="comedia">comedia</option>
                        <option value="niños">infantil</option>
                        <option value="terror">superhéroes</option>
                        <option value="comedia">romance</option>
                        <option value="niños">drama</option>
                    </select>

                    <label for="" class="form__label">Sonopsis</label><br>
                    <textarea for="" name="sinopsis" class="form__label" value='.$pelicula['sinopis'].'></textarea><br>

                    <label for="" class="form__label">Reparto</label><br>
                    <textarea for="" name="reparto" class="form__label" value='.$pelicula['reparto'].'></textarea><br>

                    <label for="" class="form__label">Directores</label><br>
                    <textarea for="" name="directores" class="form__label" value='.$pelicula['directores'].'></textarea><br>
                    <label for="" class="form__label">Status</label><br>
                    <textarea for="" name="estatus" class="form__label" value='.$pelicula['estatus'].'></textarea><br>
                    
                    <button type="submit" id="boton"">Modificar</button>
                    <button><a href="mantenerPelicula.php">Volver</a></button>
                        </form>
            </div>
        </div>
    </section>';
                
            } 
            else {
                echo "No existe producto con dicho codigo";
            }
        }

        public function modificarPelicula2($id_peli, $imagen,$titulo,$clasificacion,$duracion,$genero,$sinopsis,$reparto, $directores,$estatus){
            $pelicula=mysqli_query($this->conectarBD(),"UPDATE genero SET id_peli= '$id_peli', imagen='$imagen', titulo='$titulo' ,clasificacion= '$clasificacion', duracion='$duracion', 
            genero='$genero',sinopis= '$sinopsis', reparto='$reparto', directores='$directores', estatus='$estatus' WHERE id_peli = '$id_peli'") or die("Error en la actualización ".mysqli_error($this->conectarBD()));
  	
	        echo '<div class="confirmacion"> 
            <h6>Los datos se modificaron correctamente</h6>
            <div class="regresar"><a href="mantenerPelicula.php">Regresar</a></div>
            <div>';	
        }


        public function cerrarBD(){
            mysqli_close($this->conectarBD());
        }
        }

?>