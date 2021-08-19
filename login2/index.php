<!--Ejemplo sencillo de logue con dos archivos de php -->
<!--Este mismo ejemplo incluye algo de css para nuestro archivo principal o index-->
<?php
//Importamos los datos de usuario con el nombre y la contraseña.
require_once 'datos_usuarios.php';
//Verifica si la petición viene por POST, osea si el usuario envió el formulario.
$por_post = ($_SERVER['REQUEST_METHOD'] == 'POST');
if ($por_post) {
    //Recupera los valores de los datos enviados por el usuario.
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    //Verica si los datos ingresados corresponden al nombre de usuario y la contraseña.
    if ($usuario == USER and $password == PASSWORD) {
        $login_correcto = true;
    } else {
        $login_correcto = false;
    }
}
?>
<!DOCTYPE>
<html><!-- Etiqueta para crear comentarios en html-->
    <head>
        <title> Sistema de Logueo </title><!--Ubicamos titulo a la etiqueta para el navegador-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
  body {
    font-family: Georgia, "Times New Roman",
          Times, serif;
    color: purple;
    background-color: lightblue }
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
h2{
    color:darkblue;
}
  </style>
    </head>

    <body>
        <?php if ($por_post and $login_correcto): //Verifica si el usuario envió el formulario y el login es correcto. ?>
            <div> <h2>Acceso exitoso!  <?php echo $usuario;// para  imprimir variable php en html incrustamos en la etiqueta ?> </h2></div> 
            <!--<?php echo $usuario;// imprime variable php en html?>-->
            
            <?php else: ?>
            <form method="post" action="index.php">
                 <div style="font-size: 16px; color:darkred"> Sistema de LOGIN - BETA ONE </div>
                 <br>

                <label ><h1> Usuario : </h2></label><!--podemos etiquetar el texto del label-->
                <br ><!-- etiqueta que imprime un salto de linea o enter -->
                <input type="text" name="usuario" required="required" />
                <br />
                <label> Contraseña : </label>
                <br />
                <input type="password" name="password" required="required" />
                <br />
                <input type="submit" value="Ingresar" />
                <?php if ($por_post and !$login_correcto): //Revisamos o verificamos si el usuario envió el formulario y el login es incorrecto. ?>
                    <div> El usuario o la contraseña son incorrectos. </div>
                <?php endif; ?>
            </form>
        <?php endif; ?>
    </body>
</html>
