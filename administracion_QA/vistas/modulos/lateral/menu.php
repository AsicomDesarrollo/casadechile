<!--=====================================
MENU
======================================-->	

<!-- <ul class="sidebar-menu">

	<li class="active"><a href="inicio"><i class="fas fa-home"></i> <span>Inicio</span></a></li>
	<li><a href="ventas"><i class="fas fa-shopping-cart"></i> <span>Ventas</span></a></li>
	<li><a href="gastos"><i class="fas fa-shopping-bag"></i> <span>Gastos</span></a></li>
	<li><a href="entradas"><i class="fas fa-book"></i> <span>Entradas de producto</span></a></li>
	<li><a href="presupuesto"><i class="fas fa-calendar"></i> <span>Presupuesto mensual</span></a></li>
	<li><a href="proveedores"><i class="fas fa-truck"></i> <span>Proveedores</span></a></li>
	<li><a href="clientes"><i class="fas fa-users"></i> <span>Clientes</span></a></li>
	<li><a href="productos"><i class="fas fa-cubes"></i> <span>Productos</span></a></li>
	<li><a href="categorias"><i class="fas fa-folder"></i> <span>Categorias</span></a></li>
	<li><a href="empleados"><i class="fas fa-id-card"></i> <span>Empleados</span></a></li>
	<li><a href="administradores"><i class="fas fa-users-cog"></i><span>Administradores</span></a></li>
	<li><a href="cortes"><i class="fas fa-hand-scissors"></i> <span>Cierres de Caja</span></a></li>
	<li><a href="salir"><i class="fas fa-arrow-circle-left"></i> <span>Salir</span></a></li>

</ul>	 -->

<style>
    body[data-sidebar-size="sm"] .navbar-brand-box{

        padding-left: 8px;


    }

    .vertical-menu {
      transition: transform 0.3s ease;
    }

    .hidden {
      transform: translateX(-100%);
    }


    .navbar-brand-box{
    padding-left: 3.3rem;

    }
    #sidebar-menu .metismenu .menu-item{
        margin-left: 13px;
    }
</style>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
             <!-- LOGO -->
             <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="vistas/dist/assets/images/logo/logo.png" alt="" height="45">
                    </span>
                    <span class="logo-lg">
                        <img src="vistas/dist/assets/images/logo/logo.png" alt="" height="100"> 
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="vistas/dist/assets/images/logo/logo.png" alt="" height="45">
                    </span>
                    <span class="logo-lg">
                        <img src="vistas/dist/assets/images/logo/logo.png" alt="" height="100">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div data-simplebar class="sidebar-menu-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Menu</li>

                        <li  class="active">
                            <a href="inicio" style="padding-left: 5px;" >
                                <img src="vistas/dist/assets/images/icons/Iconos_Inicio.svg" width="30">
                                <span class="menu-item" data-key="t-dashboard">Inicio</span>
                            </a>
                        </li>

                        <li>
                            <a href="ventas"  style="padding-left: 5px;">
                                <img src="vistas/dist/assets/images/icons/Iconos_Ventas.svg" width="30">
                                <span class="menu-item" data-key="t-calendar">Ventas</span>
                            </a>
                        </li>

                        <li>
                            <a href="gastos"  style="padding-left: 5px;">
                                <img src="vistas/dist/assets/images/icons/Iconos_Gastos.svg" width="30">
                                <span class="menu-item" data-key="t-chat">Gastos</span>
                                <span class="badge rounded-pill badge-soft-danger" data-key="t-hot">Hot</span>
                            </a>
                        </li>

                        <li>
                            <a href="entradas"  style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Entrada de producto.svg" width="30">
                                <span class="menu-item" data-key="t-kanban">Entradas de producto</span>
                            </a>
                        </li>

                        <li>
                            <a href="presupuesto"  style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Presupuesto mensual.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Presupuesto mensual</span>
                            </a>
                        </li>


                        <li>
                            <a href="proveedores"  style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Proveedores.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Proveedores</span>
                            </a>
                        </li>

						
                        <li>
                            <a href="clientes" style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Clientes.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Clientes</span>
                            </a>
                        </li>

						
                        <li>
                            <a href="productos"  style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Productos.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Productos</span>
                            </a>
                        </li>

						
                        <li>
                            <a href="categorias" style="padding-left: 5px;">
                                <img src="vistas/dist/assets/images/icons/Iconos_Categorias.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Categorias</span>
                            </a>
                        </li>

						<li>
                            <a href="empleados" style="padding-left: 5px;">
                                <img src="vistas/dist/assets/images/icons/Iconos_Empleados.svg" width="30">

                                <span class="menu-item" data-key="t-filemanager">Empleados</span>
                            </a>
                        </li>

						<li>
                            <a href="administradores" style="padding-left: 5px;">
                                <img src="vistas/dist/assets/images/icons/Iconos_Administradores.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Administradores</span>
                            </a>
                        </li>

						<li>
                            <a href="cortes" style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Cieres de caja.svg" width="30">

                                <span class="menu-item" data-key="t-filemanager">Cierres de Caja</span>
                            </a>
                        </li>

						<li>
                            <a href="salir" style="padding-left: 5px;">
                            <img src="vistas/dist/assets/images/icons/Iconos_Salir.svg" width="30">
                                <span class="menu-item" data-key="t-filemanager">Salir</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <script type="">




        window.addEventListener('scroll', function() {
          var scrollPosition = window.scrollY;
          var windowWidth = window.innerWidth;
          var sideMenus = document.querySelectorAll('.vertical-menu');
          
          if (windowWidth <= 991) {
            sideMenus.forEach(function(sideMenu) {
              if (scrollPosition > 100) {
                sideMenu.classList.add('hidden');
              } else {
                sideMenu.classList.remove('hidden');
              }
            });
          } else {
            // Si el ancho de la ventana es mayor que 991 píxeles, asegurarse de que los menús no estén ocultos.
            sideMenus.forEach(function(sideMenu) {
              sideMenu.classList.remove('hidden');
            });
          }
        });



    

        </script>


