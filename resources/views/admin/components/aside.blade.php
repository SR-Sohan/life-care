 <!-- Menu -->
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
      <a href="{{url("/admin")}}" class="app-brand-link">
        <img  src="{{asset("assets/client/img/aa.png")}}" alt="">
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
        <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>

      

      <li class="menu-item">
        <a href="{{url("dashboard/branch")}}" class="menu-link">
          <i class="fa-solid fa-house-laptop menu-icon"></i>
          <div data-i18n="Branches">Branches</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/user")}}" class="menu-link">
          <i class="fa-solid fa-user menu-icon"></i>
          <div data-i18n="Users">Users</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/department")}}" class="menu-link">
          <i class="fa-solid fa-building-circle-arrow-right menu-icon"></i>
          <div data-i18n="Departments">Departments</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url("dashboard/doctor")}}" class="menu-link">
          <i class="fa-solid fa-stethoscope menu-icon"></i>
          <div data-i18n="Doctors">Doctors</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url("dashboard/test")}}" class="menu-link">
          <i class="fa-solid fa-microscope menu-icon"></i>
          <div data-i18n="Tests">Tests</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{url("dashboard/ward")}}" class="menu-link">
          <i class="fa-solid fa-bed menu-icon"></i>
          <div data-i18n="Ward">Ward</div>
        </a>
      </li>
     


      <!-- Menu Item -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Manage">Manage</div>
        </a>

        <ul class="menu-sub">
         
          
          <li class="menu-item">
            <a href="layouts-collapsed-menu.html" class="menu-link">
              <div data-i18n="Doctors">Doctors</div>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </aside>
  <!-- / Menu -->