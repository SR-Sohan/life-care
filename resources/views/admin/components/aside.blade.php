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
      @if(auth()->user()?->role === 'super_admin')
      <li class="menu-item">
        <a href="{{url("dashboard/medicine")}}" class="menu-link">
          <i class="fa-solid fa-capsules menu-icon"></i>
          <div data-i18n="Medicine">Medicine</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/test")}}" class="menu-link">
          <i class="fa-solid fa-microscope menu-icon"></i>
          <div data-i18n="Tests">Tests</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/department")}}" class="menu-link">
          <i class="fa-solid fa-building-circle-arrow-right menu-icon"></i>
          <div data-i18n="Departments">Departments</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/branch")}}" class="menu-link">
          <i class="fa-solid fa-house-laptop menu-icon"></i>
          <div data-i18n="Branches">Branches</div>
        </a>
      </li>
      @endif

      {{-- <li class="menu-item">
        <a href="{{url("dashboard/user")}}" class="menu-link">
          <i class="fa-solid fa-user menu-icon"></i>
          <div data-i18n="Users">Users</div>
        </a>
      </li> --}}
    
      @if(auth()->user()?->role === 'branch_admin')
      <li class="menu-item">
        <a href="{{url("dashboard/employee")}}" class="menu-link">
          <i class="fa-solid fa-users menu-icon"></i>
          <div data-i18n="Employee">Employee</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/doctor")}}" class="menu-link">
          <i class="fa-solid fa-stethoscope menu-icon"></i>
          <div data-i18n="Doctors">Doctors</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/ward")}}" class="menu-link">
          <i class="fa-solid fa-warehouse menu-icon"></i>
          <div data-i18n="Ward">Ward</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/bed")}}" class="menu-link">
          <i class="fa-solid fa-bed menu-icon"></i>
          <div data-i18n="Bed">Bed</div>
        </a>
      </li>
      @endif

      @if(auth()->user()?->role == "receiption")
      <li class="menu-item">
        <a href="{{url("dashboard/appointments")}}" class="menu-link">
          <i class="fa-regular fa-handshake menu-icon"></i>
          <div data-i18n="Appointments">Appointments</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/printappointments")}}" class="menu-link">
          <i class="fa-solid fa-print menu-icon"></i>
          <div data-i18n="Print Appointments">Print Appointments</div>
        </a>
      </li>
      @endif

   

      
     


      <!-- Menu Item -->
      @if(auth()->user()?->role === 'cashier')
      <li class="menu-item">
        <a href="{{url("dashboard/test-form")}}" class="menu-link">
          <i class="fa-regular fa-rectangle-list menu-icon"></i>
          <div data-i18n="Test Form">Test Form</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{url("dashboard/admit-patient")}}" class="menu-link">
          <i class="fa-solid fa-bed menu-icon"></i>
          <div data-i18n="Admit Patient">Admit Patient</div>
        </a>
      </li>
      @endif


      <!-- Menu Item -->
      @if(auth()->user()?->role === 'doctor')
      <li class="menu-item">
        <a href="{{url("dashboard/prescription")}}" class="menu-link">
          <i class="fa-solid fa-file-medical menu-icon"></i>
          <div data-i18n="Prescription">Prescription</div>
        </a>
      </li>
      @endif

    </ul>
  </aside>
  <!-- / Menu -->