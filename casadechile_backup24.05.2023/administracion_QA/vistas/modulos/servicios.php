<?php

$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Ordenes de trabajo
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Tus ordenes de trabajo</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">

        <!--=====================================
        CAJA SUPERIOR PENDIENTES
        ======================================-->

        <div class="col-lg-12">

          <div class="small-box bg-aqua">
            
            <div class="inner">
            
              <h3>$<?php echo number_format($ventas["total"]); ?></h3>

              <p>Ordenes pendientes</p>
              
            </div>
            
            <div class="icon">
            
              <i class="ion ion-bag"></i>
            
            </div>
            
          </div>
          
        </div>

<br>

        <!--=====================================
        CAJA SUPERIOR EN PROCESO
        ======================================-->

        <div class="col-lg-12">

          <div class="small-box bg-teal">
            
            <div class="inner">
            
              <h3>$<?php echo number_format($ventas["total"]); ?></h3>

              <p>Ordenes en proceso</p>
              
            </div>
            
            <div class="icon">
            
              <i class="ion ion-bag"></i>
            
            </div>
            
          </div>
          
        </div>

<br>

        <!--=====================================
        CAJA SUPERIOR TERMINADAS
        ======================================-->

        <div class="col-lg-12">

          <div class="small-box bg-blue">
            
            <div class="inner">
            
              <h3>$<?php echo number_format($ventas["total"]); ?></h3>

              <p>Ordenes terminadas</p>
              
            </div>
            
            <div class="icon">
            
              <i class="ion ion-bag"></i>
            
            </div>
            
          </div>
          
        </div>


        
        <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:10px"># Venta</th>
              <th>Sucursal</th>
              <th>Cliente</th>
              <th>Teléfono</th>
              <th>E-mail</th>
              <th>Ing. Asignado</th>
              <th>Equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th># de serie</th>
              <th>Falla</th>
              <th>Condiciones</th>
              <th>Costo</th>
              <th>Anticipo</th>
              <th>Recibe</th>
              <th>Estado del servicio</th>
              <th>Estado del pago</th>
              <th>Fecha de ingreso</th>
              <th>Fecha de entrega</th>
              <th>Acciones</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>