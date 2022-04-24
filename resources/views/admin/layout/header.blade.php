<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <div class="navbar-header" data-logobg="skin5">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <a class="navbar-brand" href="{{route('admin.home')}}">
          <!-- Logo icon -->
          <b class="logo-icon ps-2">
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img
              src="{{asset('design/icon.png')}}"
              alt="homepage"
              class="light-logo"
              width="50"
            />
          </b>
          <!--End Logo icon -->
          <!-- Logo text -->
          <span class="logo-text ms-2">
            <!-- dark Logo text -->
            <img
              src="{{asset('design/text.png')}}"
              alt="homepage"
              class="light-logo"
              style="margin-left: -12px"
            />
          </span>
          <!-- Logo icon -->
          <!-- <b class="logo-icon"> -->
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->
          <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

          <!-- </b> -->
          <!--End Logo icon -->
        </a>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Toggle which is visible on mobile only -->
        <!-- ============================================================== -->
        <a
          class="nav-toggler waves-effect waves-light d-block d-md-none"
          href="javascript:void(0)"
          ><i class="ti-menu ti-close"></i
        ></a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div
        class="navbar-collapse collapse"
        id="navbarSupportedContent"
        data-navbarbg="skin5"
      >
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-start me-auto">
          <!-- ============================================================== -->
          <!-- Search -->
          <!-- ============================================================== -->
          <?php $route = Route::current(); ?>
          @if($route->getName() == 'workers.index' || url()->current() == 'http://127.0.0.1:8000/admin/workers/search')
          <li class="nav-item search-box">
            <a
              class="nav-link waves-effect waves-dark"
              href="javascript:void(0)"
              ><i class="mdi mdi-magnify fs-4"></i
            ></a>
            <form class="app-search position-absolute" method="GET" action="{{route('workers.search')}}">
              <input
                type="text"
                name="input"
                class="form-control"
                placeholder="Search &amp; enter"
              />
              <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
            </form>
          </li>
          @endif
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-end">
          <!-- ============================================================== -->
          <!-- Logout -->
          <!-- ============================================================== -->
          <li class="nav-item dropdown">
            <a
            title="logout"
            class="
            nav-link
            dropdown-toggle
            text-muted
            waves-effect waves-dark
            pro-pic
          "
          href="{{route('admin.logout')}}"
          role="button"
            >
              <i class="fa fa-2xl fa-power-off font-24" style="margin-top:21px; color:white"></i>
            </a>
          </li>
          <!-- ============================================================== -->
          <!-- End Logout -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <li class="nav-item dropdown">
            <a
              title="profile"
              class="
                nav-link
                dropdown-toggle
                text-muted
                waves-effect waves-dark
                pro-pic
              "
              href="{{route('admin.profile')}}"
              aria-expanded="false"
            >
              <img
                src="{{asset('template/assets/images/users/1.jpg')}}"
                alt="user"
                class="rounded-circle"
                width="31"
              />
            </a>
          </li>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
        </ul>
      </div>
    </nav>
  </header>