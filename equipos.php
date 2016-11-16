<?php 

	session_start();
   
	if (empty($_SESSION['user'])) {
	     header("location: ./login.php");
	}

?>
<!DOCTYPE html>
<html ng-app="Apequipos">
<head>
	<title>Equipos</title>

<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.min.js"></script>

</head>
<body>
<div class="container">
<!-- menu -->
<?php  include("menu.php") ?>


<!-- end menu -->
	<div class="row" ng-controller="recuperarUsuaruios">
		<div class="col-md-12">
			<h3>Asignación de Equipos</h3>
			<form name="promoForm">
			    <div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="id_cliente">Nombre del cliente</label>
				      	<select class="form-control" ng-model="id_cliente" id="id_cliente" name="id_cliente" required>
				      		<option ng-repeat="domi in cboClientes" value="{{domi.id_cliente}}">{{domi.nombre}}</option>	      		
				      	</select>
				      	<span ng-show="!promoForm.$pristine && promoForm.id_cliente.$error.required">Dato requerido.</span>
				      </div>      
				    </div>
			    </div>
			    <div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="id_propietario">Propietario del equipo</label>
				      	<select class="form-control" ng-model="id_propietario" id="id_propietario" name="id_propietario" required>
				      		<option ng-repeat="domi in cboPropietarios" value="{{domi.id_propietario}}">{{domi.nombre}}</option>	      		
				      	</select>
				      	<span ng-show="!promoForm.$pristine && promoForm.id_propietario.$error.required">Dato requerido.</span>
				      </div>      
				    </div>
				</div>

			    <div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="id_domicilio">Lugar de instalacion</label>
				      	<select class="form-control" ng-model="id_domicilio" id="id_domicilio" name="id_domicilio" required>
				      		<option ng-repeat="domi in cboDomicilios" value="{{domi.id_domicilio}}">{{domi.nombre}}</option>	      		
				      	</select>
				      	<span ng-show="!promoForm.$pristine && promoForm.id_domicilio.$error.required">Dato requerido.</span>
				      </div>      
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      <label for="equipo">Equipo</label>
				        <input type="text" class="form-control" placeholder="EQUIPO" ng-model="equipo" name="equipo" required>
				        <span ng-show="!promoForm.$pristine && promoForm.equipo.$error.required">Dato requerido.</span>
				      </div>      
				    </div>
			    </div>
				
				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="ip1">Dirección IP 1</label>
				        <input type="text" class="form-control" placeholder="IP 1" ng-model="ip1" name="ip1">
				      </div>      
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="ip2">Dirección IP 2</label>
				        <input type="text" class="form-control" placeholder="IP 2" ng-model="ip2" name="ip2">
				      </div>      
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="mac">Dirección MAC</label>
				        <input type="text" class="form-control" placeholder="MAC" ng-model="mac" name="mac">
				      </div>      
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="marca">Marca</label>
				        <input type="text" class="form-control" placeholder="MARCA" ng-model="marca" name="marca">
				      </div>      
				    </div>
				</div>
				
				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="ssid">SSID</label>
				        <input type="text" class="form-control" placeholder="SSID" ng-model="ssid" name="ssid">
				      </div>      
				    </div>
				</div>
				
				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="keyy">KEY</label>
				        <input type="text" class="form-control" placeholder="KEY" ng-model="keyy" name="keyy">
				      </div>      
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="remot">Puerto Remoto</label>
				        <input type="text" class="form-control" placeholder="Puerto" ng-model="remot" name="remot">
				      </div>      
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				      <div class="input-group">
				      	<label for="remot">IP Remota</label>
				        <input type="text" class="form-control" placeholder="IP Remota" ng-model="iprem" name="iprem">
				      </div>      
				    </div>
				</div>

		        <div class="col-md-3">
				    <div class="form-group">
				    	<div class="input-group">			    		
				    		<input type="button" class="btn btn-info" ng-click="addEquipo()"  value="Guardar" ng-disabled="!promoForm.$valid">
				    	</div>				    	
				    </div>
			    </div>
			    <label id="sms" class="label label-primary"></label>
			</form>
		</div>
		<div class="col-md-12">
			<hr>
			
			<form>
			    <div class="form-group">
			      <div class="input-group">
			        <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
			        <input type="text" class="form-control" placeholder="Buscar Promoción" ng-model="buscar">
			      </div>      
			    </div>
			</form>


			<table class="table table-striped">
			<thead>
				<td>
				    Cliente 
				</td>
				<td>
	          		Propietario 
		        </td>
		        <td>
		        	Domicilio
		        </td>
		        <td>
		        	Equipo
		        </td>
		        <td>
		        	IP1, IP Internet 
		        </td>
		        <td>
		        	MAC 
		        </td>
		        <td>
		        	MARCA 
		        </td>
		        <td>
		        	SSID
		        </td>
		        <td>
		        	KEY 
		        </td>
		        <td>
		        	PUERTO E IP REMOTA
		        </td>
			</thead>
				<tbody>
					<tr ng-repeat="us in arrEquipos  | filter:buscar">
				  		<td>{{ us.cliente }}</td>
						<td>{{ us.propietario }}</td>
						<td>{{ us.domicilio}}</td>
				  		<td>{{ us.equipo }}</td>
						<td>{{ us.ip1 }} , {{ us.ip2}}</td>
				  		<td>{{ us.mac }}</td>
						<td>{{ us.marca }}</td>
						<td>{{ us.ssid}}</td>
				  		<td>{{ us.key }}</td>
						<td>{{ us.remot }} , {{ us.iprem}}</td>
<!-- 						<td>
							<button type="button" class="btn btn-primary btn-xs" ng-click="edit($index)">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>

							<button type="button" class="btn btn-danger btn-xs" ng-click="elim(us.id_cliente)">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
						</td> -->
				  	</tr>
				</tbody>
			</table>
		</div>
	</div>	
	
</div>
</body>
<script type="text/javascript" src="js/appEquipos.js"></script>

</html>