<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav" class="pt-4">
          <li class="sidebar-item">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href="{{route('admin.home')}}"
              aria-expanded="false"
              ><i class="fa fa-home"></i
              ><span class="hide-menu">Home</span></a
            >
          </li>

          <li class="sidebar-item">
            <a
              class="sidebar-link has-arrow waves-effect waves-dark"
              href="javascript:void(0)"
              aria-expanded="false"
              ><i class="mdi mdi-worker"></i
              ><span class="hide-menu">Workers </span></a
            >
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a href="{{route('workers.index')}}" class="sidebar-link"
                  ><i class="mdi mdi-note-outline"></i
                  ><span class="hide-menu"> all workers </span></a
                >
              </li>
              <li class="sidebar-item">
                <a href="{{route('workers.create')}}" class="sidebar-link"
                  ><i class="mdi mdi-plus"></i
                  ><span class="hide-menu"> create worker </span></a
                >
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a
              class="sidebar-link has-arrow waves-effect waves-dark"
              href="javascript:void(0)"
              aria-expanded="false"
              ><i class="mdi mdi-worker"></i
              ><span class="hide-menu">Jobs </span></a
            >
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a href="{{route('jobs.index')}}" class="sidebar-link"
                  ><i class="mdi mdi-note-outline"></i
                  ><span class="hide-menu"> all jobs </span></a
                >
              </li>
              <li class="sidebar-item">
                <a href="{{route('jobs.in_progress')}}" class="sidebar-link"
                  ><i class="fa fa-hourglass-half"></i
                  ><span class="hide-menu"> in progress </span></a
                >
              </li>
              <li class="sidebar-item">
                <a href="{{route('jobs.completed')}}" class="sidebar-link"
                  ><i class="fa fa-check-circle"></i
                  ><span class="hide-menu"> completed </span></a
                >
              </li>
              <li class="sidebar-item">
                <a href="{{route('jobs.create')}}" class="sidebar-link"
                  ><i class="mdi mdi-plus"></i
                  ><span class="hide-menu"> create job </span></a
                >
              </li>
            </ul>
          </li>

          <li class="sidebar-item">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href="{{route('occupations.index')}}"
              aria-expanded="false"
              ><i class="fa fa-id-card-alt" style="font-size: 18px"></i
              ><span class="hide-menu">Occupations</span></a
            >
          </li>
          

          <li class="sidebar-item">
            <a
              class="sidebar-link waves-effect waves-dark sidebar-link"
              href="{{route('workers.generateur')}}"
              aria-expanded="false"
              ><i class="fa fa-id-card-alt" style="font-size: 18px"></i
              ><span class="hide-menu">ID Generateur</span></a
            >
          </li>

        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
