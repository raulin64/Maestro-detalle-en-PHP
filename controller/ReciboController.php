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
              echo 'Borrando Recibo y detalle';
            $idx = $_REQUEST['idx'];
             if ($Recibo->deleteDetalle($idx, $cnn) == 0)
                echo 'Registro borrado exitosamente';
            break;

        case 'update':
            # code...
             
            echo 'Actualizando Detalle <br>';
            $dataup = $_REQUEST['dataup'];
			$fieldup = $_REQUEST['fieldup'];
			$idx = $_REQUEST['idx'];
			if ($Recibo->updateReciboByID($idx, $cnn, $dataup,$fieldup)== 0)
                echo 'Registro actualizado exitosamente';
			
			
            break;
			
        case 'insert':
            # code...
             foreach($_POST as $nombre_campo => $valor){
   $asignacion[] = "\$" . $nombre_campo . "='" . $valor . "'";
   //eval($asignacion);
} 
$values = implode(",", $asignacion);
echo $values;
            echo 'Insertando Detalle <br>';
			$idx = $_REQUEST['idx'];
			$Ejerciciox = $_REQUEST['Ejerciciox'];
			$Tipox = $_REQUEST['Tipox'];
			$Tipox = "'".$Tipox."'";
			$Numerox = "'".$_REQUEST['Numerox']."'";;
			$ImportePrincipalx = $_REQUEST['ImportePrincipalx'];
			if ($Recibo->insertReciboByID($idx, $cnn, $Ejerciciox,$Tipox,$Numerox,$ImportePrincipalx)== 0)
                echo 'Registro insertado exitosamente';
			
			
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
