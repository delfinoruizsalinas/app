<?php 

	session_start();
   
	if (empty($_SESSION['user'])) {
	     header("location: ./login.php");
	}

?>
<!DOCTYPE html>
<html ng-app="Apclientes">
<head>
	<title>Clientes</title>

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
		<div class="col-md-9">
			<form>
			    <div class="form-group">
			      <div class="input-group">
			        <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
			        <input type="text" class="form-control" placeholder="Buscar Promoción" ng-model="buscar">
			      </div>      
			    </div>
			</form>

			<h3>Clientes</h3>
			<table class="table table-striped">
			<thead>
				<td>
				    Nombre 
				</td>
				<td>
	          		Telefono 
		        </td>
		        <td>
		        	Domicilio
		        </td>
		        <td>
		        	Acción
		        </td>
			</thead>
				<tbody>
					<tr ng-repeat="us in arrClientes | filter:buscar">
				  		<td>{{ us.nombre }}</td>
						<td>{{ us.telefono }}</td>
						<td>{{ us.domicilio}}</td>
						<td>
							<button type="button" class="btn btn-primary btn-xs" ng-click="edit($index)">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>

							<button type="button" class="btn btn-danger btn-xs" ng-click="elim(us.id_cliente)">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
						</td>
				  	</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<form name="promoForm">
			    <div class="form-group">
			      <div class="input-group">
			        <input type="text" class="form-control" placeholder="Nombre" ng-model="nombre" name="nombre" required>
			        <span ng-show="!promoForm.$pristine && promoForm.nombre.$error.required">Dato requerido.</span>
			      </div>      
			    </div>
			    <div class="form-group">
			      <div class="input-group">
			        <input type="text" class="form-control" placeholder="Telefono" ng-model="telefono" name="telefono" required>
			        <span ng-show="!promoForm.$pristine && promoForm.telefono.$error.required">Dato requerido.</span>
			      </div>      
			    </div>
			    <div class="form-group">
			      <div class="input-group">
			      	<select class="form-control" ng-model="id_domicilio" id="id_domicilio" name="id_domicilio" required>
			      		<option ng-repeat="domi in cboDomicilios" value="{{domi.id_domicilio}}">{{domi.nombre}}</option>	      		
			      	</select>
			      	<span ng-show="!promoForm.$pristine && promoForm.id_domicilio.$error.required">Dato requerido.</span>
			      </div>      
			    </div>
		        
		        <label id="sms" class="label label-primary"></label>
		        <hr />

			    <div class="form-group">
			    	<div class="input-group">			    		
			    		<input type="button" class="btn btn-info" ng-click="addClient()"  value="Guardar" ng-disabled="!promoForm.$valid">
			    	</div>				    	
			    </div>
			</form>
			

		</div>
	</div>	
	
</div>
</body>
<script type="text/javascript" src="js/app.js"></script>

</html>