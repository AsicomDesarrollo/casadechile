<?php

$ventas = ControladorVentas::ctrMostrarTotalVentas();

$usuarios = ControladorUsuarios::ctrMostrarTotalUsuariosA("id");
$totalUsuarios = count($usuarios);

//$proveedores = ControladorUsuarios::ctrMostrarTotalUsuarios("id");
//$totalProveedores = count($proveedores);

?>

<!--===================================Ventas========================================-->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3>$<?php //echo number_format($ventas["total"]); ?></h3>

      <p>Comprado</p>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-shopping-cart"></i>
    
    </div>
  
  </div>

</div>

<!--===================================Clientes========================================-->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  <div class="small-box bg-red">
    
    <div class="inner">
      
      <h3>$<?php //echo number_format($totalUsuarios); ?></h3>

      <p>Vendido</p>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-user"></i>
    
    </div>

  </div>

</div>

<!--===================================Sucursales========================================-->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  <div class="small-box bg-yellow">
    
    <div class="inner">
      
      <h3>2</h3>

      <p>Sucursales</p>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-shopping-bag"></i>
    
    </div>

  </div>

</div>

<!--===================================Clientes========================================-->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

  <div class="small-box bg-orange">
    
    <div class="inner">
      
      <h3>16</h3>

      <p>Trabajos en proceso</p>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-wrench"></i>
    
    </div>

  </div>

</div>
