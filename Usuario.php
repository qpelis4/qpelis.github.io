<?php
class Usuario{
    private $nombre;
    private $apellidoMat;
    private $apellidoPat;
    private $puesto;
    private $email;
    private $contrasena;

    public function inicializar($email,$contrasena){
        $this->email=$email;
        $this->contrasena=$contrasena;
    }
    public function conectarBD(){
        $con=mysqli_connect("localhost","root","","quepeliz") or die ("Problemas de conexion con la base de datos");
        return $con;
    }
    public function validarDatos($email,$contrasena){
        $admin=mysqli_query($this->conectarBD(),"SELECT * FROM usuarios where email='$email' and contrasena='$contrasena'")or die(mysqli_error($this->conectarBD()));
        if($usuario=mysqli_fetch_array($admin)){
            header('location:empleado.html');
        }else{
            echo'<script type="text/javascript">
            alert("Correo o Contraseña incorrectos");
            window.location.href="iniciarSesion.html";
            </script>';
            }
        }
   
    /*
    public function validarDatos(){
        $registro=mysqli_query($this->conectarBD(),"select * from usuarios where usuario='$this->usuario' and contra='$this->contra'")or die(mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
            header("location:perfilCliente");
        }
        else{
            include("login.html");
            echo'<script type="text/javascript">
            alert("Correo o Contraseña incorrectos");
            window.location.href="login.html";
            </script>';
        }
    }
    */
    
    public function registrarCuenta($nombre,$apellidoMat,$apellidoPat,$puesto,$email,$contrasena){
        $this->nombre=$nombre;
        $this->apellidoMat=$apellidoMat;
        $this->apellidoPat=$apellidoPat;
        $this->puesto=$puesto;
        $this->email=$email;
        $this->contrasena=$contrasena;
    }
    // ALERTA DE CORREO REPETIDO //
    public function iniciarRegistro(){
        $usuario=mysqli_query($this->conectarBD(),"SELECT* from usuarios where email='$this->email'")or die(mysqli_error($this->conectarBD()));
        echo '<div id="ingresos">';
        if ($reg=mysqli_fetch_array($usuario)){
            echo'<script type="text/javascript">
            alert("Correo repetido");
            window.location.href="iniciarSesion.html";
            </script>';  
        }
     // REGISTRO DE CORREO & DATOS DE USUARIOS //
        else{
            mysqli_query($this->conectarBD(),"INSERT INTO usuarios(email,contrasena) VALUES ('$this->email','$this->contrasena')") or die ("Problemas con el INSERT".mysqli_error($this->conectarBD()));
            mysqli_query($this->conectarBD(),"INSERT INTO datosuser VALUES (null, '$this->nombres','$this->aPaterno','$this->aMaterno','$this->sexo','$this->fecha')") or die ("Problemas con el INSERT".mysqli_error($this->conectarBD()));
            header("location:iniciarSesion.html");
            }
    }

    public function cerrarBD(){
        mysqli_close($this->conectarBD());
    }
}
?>