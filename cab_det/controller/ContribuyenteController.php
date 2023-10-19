<?php
require_once '../db/Conection.php';
require_once '../model/ContribuyenteModel.php';
require_once '../model/ReciboModel.php';

//instancio conexion
$con = new Conection();
$cnn = $con->connect();

//instancio Contribuyente
$contribuyente = new ContribuyenteModel();

//recibo parametro del form, variable tipo hidde con propiedad save o de lo que se envie desde el form, DEL por defecto
@$_REQUEST['action'];

if (isset($_REQUEST['action'])) {

    switch ($_REQUEST['action']) {


        case 'getAll':
            # code...
            
            $rsContribuyente = $contribuyente->getAllContribuyente($cnn);
            
            break;
        default:
            # code...
            break;
    }
}
