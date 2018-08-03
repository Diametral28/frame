<?php
//session_start();
include_once 'login.php';

secSessionStart(); // Nuestra manera personalizada segura de iniciar sesión PHP.
 //session_start();
 
 $_POST['email'];
 $_POST['p'];
if (isset($_POST['email'], $_POST['p'])) {

    $usuario = $_POST['email'];
    $password = $_POST['p']; // La contraseña con hash

    // echo $usuario;
    // echo $password;

    if (login($usuario, $password) == true) {
        //echo "-----------".$_SESSION['username'];
        // Inicio de sesión exitosa
        //header('Location: ../home.php');
        header('Location: ../web/semaforo3.php');
    } else {
        // Inicio de sesión exitosa
        //header('Location: ../index.php?error=1');
    }
} else {
    // Las variables POST correctas no se enviaron a esta página.
    echo 'Solicitud no válida';
}
//$db->dbClose();
