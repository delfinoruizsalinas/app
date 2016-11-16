<?php 
//error_reporting(0);
require_once('./db.class.php');
// Hacemos la conexión
$db = DataBase::connect();

$db->setQuery('SELECT clientes.nombre as cliente, equipos.* FROM equipos INNER JOIN clientes ON
equipos.id_cliente = clientes.id_cliente;');
$rows = $db->loadObjectList();

foreach($rows as $cl){
	$jsondata[] = array('id_equipo'=>$cl->id_equipo, 'cliente' => $cl->cliente, 'propietario' => $cl->id_propietario, 'domicilio' => $cl->id_domicilio,'equipo' => $cl->equipo,'ip1' => $cl->ip1,'ip2' => $cl->ip2,'mac' => $cl->mac,'marca' => $cl->marca,'ssid' => $cl->ssid,'key' => $cl->key,'remot' => $cl->remot,'iprem' => $cl->iprem,'estatus' => $cl->estatus);
 
}
    echo json_encode($jsondata);


	

	// $cl = $db->loadObject();
 // 	echo json_encode();

?>