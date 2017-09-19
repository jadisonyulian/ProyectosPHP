
<?php
session_start();
if (!$_SESSION["validar"]) {

    header("location:index.php?action=ingresar");

    exit();

}

?>



<form method="post" action="">
	<?php

$editarUsuarios = new MvcController();
$editarUsuarios->editarUsuarioController();
$editarUsuarios->actualizarUsuarioController();

?>

</form>


