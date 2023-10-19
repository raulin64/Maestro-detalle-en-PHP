<?php
require_once '../db/Conection.php';
require_once '../model/ReciboModel.php';

//instancio conexion
$con = new Conection();
$cnn = $con->connect();

//instancio Recibo
$Recibo = new ReciboModel();

//recibo parametro del form, variable tipo hidde con propiedad save o de lo que se envie desde el form, DEL por defecto
@   $id = $_REQUEST['id'];
@$_REQUEST['action'];

if (isset($_REQUEST['action'])) {

    switch ($_REQUEST['action']) {
        case 'add':
            # code...
            
            break;

        case 'del':
            # code...


            break;

        case 'update':
            # code...
   

            break;

        case 'getAll':
            # code...
            $rsContribuyente = $Recibo->getAllRecibo($cnn);

            break;

        case 'getById':
            # code...

            $data = $Recibo->getReciboByID($id,$cnn);
                echo json_encode($data);

            break;
        default:
            # code...
            break;
    }
}
