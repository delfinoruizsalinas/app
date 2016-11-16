<!DOCTYPE html>
<html ng-app="MyFirstApp">
<head>
	<title>Promoción</title>


<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.min.js"></script>

<style>

body {
  background: url(images/el.jpg);
}

h1
{
       font-size: 5.9vw;
       background-color: #ffd102;
}
h3
{
       font-size: 4.0vh;
       color: #470a40;
}

@media (min-width: 1380)
{
       h1
       {
           font-size: 17px; 
       }
       h3
       {
           font-size:24px;
       }
}

</style>
</head>
<body ng-controller="FirstController">
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      
      <div ng-repeat="sl in slides" class="item {{sl.esta}}">
              
     <!--prod = $scope.slides[0].nombre_producto;
     a = $scope.slides[0].clasificacion;
     d = $scope.slides[0].descripcion;
     id = $scope.slides[0].id_promo;
     ima = $scope.slides[0].imagen;
     prom = $scope.slides[0].nombre_promocion;
     pre = $scope.slides[0].precio_venta;
     est = $scope.slides[0].estatus;
      -->
        <!-- <h3>{{ sl.nombre_producto }}</h3> -->
        <div class="col-md-6">
          <img src="<?php echo "http://localhost/promocion/php/imagenes/?uid={{sl.id_promo}}&tkn={{sl.estatus}}&sz=600" ?>" /> 
        </div>
        <div class="col-md-6">
          <span style="font-size: 3.9vw; color:#3c8dbc">{{ sl.clasificacion }}</span>
        </div>
        <div class="col-md-6">
          <span style="font-size: 3vw;">{{ sl.nombre_producto }}</span>
        </div>
        <div class="col-md-6">
          <span style="font-size: 3vw;">{{ sl.descripcion }}</span>
        </div>
        <div class="col-md-6">
          <span style="font-size: 3vw; color:#aed642">{{ sl.nombre_promocion }}</span>
        </div>
        <div class="col-md-6">
          <span style="font-size: 6vw; color:red">{{ sl.precio_venta | currency:"$":2}}</span>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!--   <pre data-title="markup" class=" language-markup" style="position: absolute; margin-bottom: 650px">
    <code class=" language-markup">

    </code>
  </pre> -->
<div id="footer">
  <div class="container">
    <div class="row">
    <div class="col-xs-5 col-sm-9">
       <h1>MI TIENDITA</h1>
       <h3>PREGUNTA POR NUESTRAS PROMOCIONES EN CAJA</h3>
    </div>
    <div class="col-xs-3 col-sm-3 pull-right">
        <div class="metric metric--dimmed metric--textright">
            <div class="metric__value"><h3>Productos al</h3></div>
            <div class="metric__label"><h2>mejor precio</h2></div>
        </div>
    </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="js/publicados.js"></script>

</html>