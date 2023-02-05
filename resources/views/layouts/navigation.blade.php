<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color:#ddead1; border-bottom: solid 2px #3a8e50; margin-bottom:5px;" >
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="{{ asset('img/logo.jpg') }}"
          height="15"
          alt="{{ __('Dashboard') }}"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/parroquias') }}">Parroquias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/miembros') }}">Miembros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin') }}">Tablas</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reportes</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->


    <div class="d-flex align-items-center">
         <!-- Notifications -->
    <!--     
      <div class="dropdown">
        <a
          class="text-reset me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>

        -->

      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-toggle="dropdown" aria-haspopup="true"
          data-mdb-toggle="dropdown"
          aria-expanded="false" v-pre >{{ Auth::user()->name }}</a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="{{ url('/admin') }}">Panel Admin</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>

          </li>
        </ul>
      </div>
      (<a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>)
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->



                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                    @csrf
                </form>