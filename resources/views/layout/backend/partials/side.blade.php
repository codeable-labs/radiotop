<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link main-sidebar__brand">
        <img src="/images/radiotop.svg" class="img-fluid claro__logo">

    </div>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="user-panel__radio">
            {{@$caracter}}
        </div>
        <div class="info user-panel__info">
            <span class="user-panel__nombre">{{@$usuario->name}}</span>

            <a href="/admin" class="d-block user-panel__rol"> Administrador</a>

        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-item has-treeview ">
            <a href="/admin/" class="nav-link {{{ (Request::is('admin/') ? 'active' : '') }}}">

              <p>Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="/admin/artistas" class="nav-link {{{ (Request::is('admin/artistas*') ? 'active' : '') }}}">

              <p>Artistas </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="/admin/regiones" class="nav-link {{{ (Request::is('admin/regiones*') ? 'active' : '') }}}">

              <p>Regiones </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="/admin/generos" class="nav-link {{{ (Request::is('admin/generos*') ? 'active' : '') }}}">

              <p>Géneros </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="/admin/banners" class="nav-link {{{ (Request::is('admin/banners*') ? 'active' : '') }}}">

              <p>Banner </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="/admin/ranking" class="nav-link {{{ (Request::is('admin/ranking*') ? 'active' : '') }}}">

              <p>Ranking </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="/admin/publicidad" class="nav-link {{{ (Request::is('admin/publicidad*') ? 'active' : '') }}}">

              <p>Publicidad </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="/admin/notas" class="nav-link {{{ (Request::is('admin/notas*') ? 'active' : '') }}}">

              <p>Notas de prensa </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="/admin/contactos" class="nav-link {{{ (Request::is('admin/contactos*') ? 'active' : '') }}}">

              <p>Anunciantes </p>
            </a>
          </li>
         
        </ul>

      </nav>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="mt-3 pb-3 mb-3 d-flex align-items-end sidebar__close">
        <ul class="nav  nav-sidebar sidebar__lista">
            <li class="nav-item sidebar__elemento">

            <a class="nav-link sidebar__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="icono__salir"><img src="/backend/img/exit.svg" class="img-fluid" >  Cerrar sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            </li>
        </ul>
      </div>
  </aside>
