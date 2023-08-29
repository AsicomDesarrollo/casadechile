
<style>

@media (max-width: 600px){
  .navbar-header .dropdown .dropdown-menu {
	left: 60px !important;
	right: 10px !important; 
  transform: translate3d(-23.4px, 91px, 0px) !important;
}
}

</style>

<div class="d-flex">
          <div class="dropdown d-inline-block d-block d-lg-none">
              <button type="button" class="btn header-item noti-icon"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search  icon-sm"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end ">
                  <form class="p-2">
                      <div class="search-box">
                          <div class="position-relative">
                              <input type="text" class="form-control rounded bg-light border-0" placeholder="Buscar...">
                              
                          </div>
                      </div>
                  </form>
              </div>
          </div>


          <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-bell icon-sm"></i>
                  <span class="noti-dot bg-danger rounded-pill">3</span>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                  aria-labelledby="page-header-notifications-dropdown">
                  <div class="p-3">
                      <div class="row align-items-center">
                          <div class="col">
                              <h5 class="m-0 font-size-15"> Notificaciones </h5>
                          </div>
                      </div>
                  </div>
                  <div data-simplebar style="max-height: 250px;">
                      <h6 class="dropdown-header bg-light">Nuevas</h6>

                      <a href="" class="text-reset notification-item">
                          <div class="d-flex border-bottom align-items-start">
                              <div class="flex-shrink-0">
                                  <div class="avatar-sm me-3">
                                      <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-dollar-sign"></i>
                                      </span>
                                  </div>
                              </div>
                              <div class="flex-grow-1">
                                  <h6 class="mb-1">Nuevo gasto</h6>
                                  <div class="text-muted">
                                      <p class="mb-1 font-size-13">Gasto agregado <strong>comida</strong> con $1,500.</p>
                                      <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i>hace 5 horas</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                      <a href="" class="text-reset notification-item">
                          <div class="d-flex border-bottom align-items-start">
                              <div class="flex-shrink-0">
                                  <div class="avatar-sm me-3">
                                      <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-user-edit"></i>
                                      </span>
                                  </div>
                              </div>
                              <div class="flex-grow-1">
                                  <h6 class="mb-1">Actualizacion de cliente</h6>
                                  <div class="text-muted">
                                      <p class="mb-1 font-size-13">Se actualizo la informacion de Sandra Perez.</p>
                                      <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i>hace 1 dias</p>
                                  </div>
                              </div>
                          </div>
                      </a>

                      <h6 class="dropdown-header bg-light">Ventas</h6>
                      <a href="" class="text-reset notification-item">
                          <div class="d-flex border-bottom align-items-start">
                              <div class="flex-shrink-0">
                                  <div class="avatar-sm me-3">
                                      <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-money-check"></i>
                                      </span>
                                  </div>
                              </div>
                              <div class="flex-grow-1">
                                  <h6 class="mb-1">Venta</h6>
                                  <div class="text-muted">
                                      <p class="mb-1 font-size-13">Compra de $1,300 en transferencia <span class="badge badge-soft-success">Revisar</span></p>
                                      <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i>hace 1 hora</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                      <a href="" class="text-reset notification-item">
                          <div class="d-flex border-bottom align-items-start">
                              <div class="flex-shrink-0">
                                  <div class="avatar-sm me-3">
                                      <span class="avatar-title bg-primary  rounded-circle font-size-16">
                                        <i class="fas fa-receipt"></i>
                                      </span>
                                  </div>
                              </div>
                              <div class="flex-grow-1">
                                  <h6 class="mb-1">Liquidacion de compra</h6>
                                  <div class="text-muted">
                                      <p class="mb-1 font-size-13">Rogelio Aguilar pago $1,500 de $1,500</p>
                                      <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i>hace 3 dias</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                  <div class="p-2 border-top d-grid">
                      <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                          <i class="uil-arrow-circle-right me-1"></i> <span>Ver mas...</span>
                      </a>
                  </div>
              </div>
          </div>


          <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img class="rounded-circle header-profile-user" src="vistas/dist/assets/images/logo/logo-graphics.jpg "
                  alt="Elena Sandoval">
                  <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                      <span class="user-name">Elena Sandoval<i class="mdi mdi-chevron-down"></i></span>
                  </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                  <h6 class="dropdown-header"> <strong class="text-primary">Administrador</strong></h6>
                  <a class="dropdown-item" href="miPerfl"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Mi perfil</span></a>
              
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-wallet text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Cierre : <b>$6951.02</b></span></a>
<!--                   <a class="dropdown-item d-flex align-items-center" href="contacts-settings.html"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Configuraciones</span></a> -->
                  <a class="dropdown-item" href="auth-signout-cover.html"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Salir</span></a>
              </div>
          </div>
      </div>
  
  
    </div>

