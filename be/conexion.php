<?php
  try{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    //Objeto PDO, Controlador de BD, IP del servidor o localhost, nombre de la BD, usuario y contraseña
    $conexionDB = new PDO('mysql:host=localhost;dbname=invite','root','',$opciones);

  } catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
  }
?>