<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-tasks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Panel Administrasi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if(Auth::check() && Auth::user()->jabatan === 'Admin')
        <li class="nav-item {{ $menuDashboard ?? '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            MENU ADMIN
        </div>

        <!-- Nav Item - Data User -->
        <li class="nav-item {{ $menuAdminUser ?? '' }}">
            <a class="nav-link" href="{{ route('user') }}">
                <i class="fas fa-user"></i>
                <span>Data User</span>
            </a>
        </li>

          <!-- Nav Item - Data pengajuan Token Listrik -->
    <li class="nav-item {{ $menuAdminPengajuan ?? '' }}">
        <a class="nav-link" href="{{ route('pengajuantoken.index') }}">

            <i class="fas fa-university"></i>
            <span> List Pengajuan</span>
        </a>
    </li>
        
    @endif

    <!-- Nav Item - Data Masjid/Mushola (SEMUA BISA AKSES) -->
    <li class="nav-item {{ $menuAdminMasjid ?? '' }}">
        <a class="nav-link" href="{{ route('masjid') }}">
            <i class="fas fa-university"></i>
            <span>Data Masjid/Mushola</span>
        </a>
    </li>

     <!-- Nav Item - Data Masjid/Mushola (SEMUA BISA AKSES) -->
    <li class="nav-item {{ $menuAdminTestimonial ?? '' }}">
        <a class="nav-link" href="{{ route('testimonial.index') }}">

            <i class="fas fa-university"></i>
            <span>Testimonial</span>
        </a>
    </li>
  
     


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
