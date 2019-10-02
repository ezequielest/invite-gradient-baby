<?php

include 'conexion.php';

$response = [];
if ( !isset($_POST['gift']) || $_POST['gift'] == "" ) {
    die();
    $response['thereIsError'] = true;
} else {

    if ($_POST['action'] == 'update') {
        $query = "UPDATE lista_regalos set gifted = 1, gifted_by = '" . $_POST['name'] . "' WHERE gift = '" . $_POST['gift'] . "'";
        $conexionDB->exec($query);
    }

    $response['thereIsError'] = false;
} 

echo json_encode($response);

?>