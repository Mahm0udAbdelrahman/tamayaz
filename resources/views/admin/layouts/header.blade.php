 <!--start header-->
 <header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
      <div class="btn-toggle" id="toggle-button">
        <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
      </div>
      <div class="card-body search-content">
      </div>
      <ul class="navbar-nav gap-1 nav-right-links align-items-center">


        <li class="nav-item dropdown">


            <div class="notify-list">



            </div>
        </li>
        <li class="nav-item dropdown">
          <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
            <img src="{{ asset('dashboard/images/تميز copy 2.svg')}}" class="rounded-circle p-1 border" width="45" height="45" alt="">
          </a>
          <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
              <div class="text-center">
                <img src="{{ asset('dashboard/images/تميز copy 2.svg')}}" class="rounded-circle p-1 shadow mb-3" width="90" height="90" alt="">
                <h5 class="user-name mb-0 fw-bold">Tamayz | Dashboard</h5>
              </div>
            </a>

            <hr class="dropdown-divider">
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('admin.logout') }}"><i
                class="material-icons-outlined">power_settings_new</i>Logout</a>
          </div>
        </li>
      </ul>

    </nav>
  </header>
  <!--end top header-->
