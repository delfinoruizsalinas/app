<?php 
//error_reporting(0);
require_once('./db.class.php');
// Hacemos la conexión
$db = DataBase::connect();

$data = json_decode(file_get_contents("php://input"));


$id_reg = $data->idEliminar;

// echo $id_reg; 

$db->setQuery('delete from clientes where id_cliente = '.$id_reg.';');

if($db->alter()){

	$db->setQuery('SELECT clientes.*, domicilios.nombre as domicilio FROM clientes INNER JOIN domicilios
on clientes.id_domicilio = domicilios.id_domicilio order by domicilio');

	$rows = $db->loadObjectList(); 

	foreach($rows as $cl){
		$jsondata[] = array('id_cliente' => $cl->id_cliente, 'nombre' => $cl->nombre, 'telefono' => $cl->telefono,'domicilio' => $cl->domicilio,'estatus' => $cl->estatus);
	}
    echo json_encode($jsondata);
}
else{
    echo 'Error: '.$db->getError();
}

?>