<?php 
//error_reporting(0);
require_once('./db.class.php');
// Hacemos la conexión
$db = DataBase::connect();

$db->setQuery('SELECT * FROM propietarios order by nombre;');
$rows = $db->loadObjectList();

foreach($rows as $cl){
	$jsondata[] = array('id_propietario' => $cl->id_propietario, 'nombre' => $cl->nombre);
 
}
    echo json_encode($jsondata);

?>