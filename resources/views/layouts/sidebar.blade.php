<!-- Sidebar -->
<style>
    .logo-sidebar {
    width: 60px !important;
    height: auto;
}
.sidebar .sidebar-brand {
    padding-left: 2rem !important;  /* atau 0.75rem */
}
.sidebar-brand-icon {
    background: #ffffff; /* ganti sesuai warna */
    border-radius: 50%;
    padding: 0px;
    display: flex;
    justify-content: center;
    align-items: center;

    /* opsional (bayangan biar bagus) */
    box-shadow: 0 0 8px rgba(0,0,0,0.15);
}
/* Sidebar full scroll */
.sidebar {
    width: 280px !important;
    height: 100vh !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
}



.sidebar.toggled {
    width: 100px !important;
}


</style>

<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="/mosque/img/logoyayasan.png" class="logo-sidebar"
     alt="Logo Yayasan">

        </div>
        <div class="sidebar-brand-text mx-3">Cita Amanat Martadiredja</div>
    </a>
  <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> --}}
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

        <!-- Nav Item - Data User -->
        <li class="nav-item {{ $menuAdminDonatur ?? '' }}">
            <a class="nav-link" href="{{ route('donatur.index') }}">
                <i class="fas fa-user"></i>
                <span>Data Donatur</span>
            </a>
        </li>

           <!-- Nav Item - Data Pengeluaran-->
 <li class="nav-item {{ $menuAdminPengeluaran ?? '' }}">
    <a class="nav-link" href="{{ route('pengeluaran.index') }}">

        <i class="fas fa-money-bill-wave"></i>
        <span>Data Pengeluaran</span>
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

@if(Auth::check() && Auth::user()->jabatan !== 'Karyawan')
    <li class="nav-item {{ $menuAdminMasjid ?? '' }}">
        <a class="nav-link" href="{{ route('masjid') }}">
            <i class="fas fa-university"></i>
            <span>
                @if (Auth::user()->jabatan == 'User')
                    Pengajuan Token
                @else
                    Data Masjid/Mushola
                @endif
            </span>
        </a>
    </li>
@endif



     <!-- Nav Item - Data Masjid/Mushola (SEMUA BISA AKSES) -->
@if(Auth::check() && Auth::user()->jabatan !== 'Karyawan')
<li class="nav-item {{ $menuAdminTestimonial ?? '' }}">
    <a class="nav-link" href="{{ route('testimonial.index') }}">
        <i class="fas fa-university"></i>
        <span>Testimonial</span>
    </a>
</li>
@endif

     <!-- Nav Item - Data User -->

     


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

 @if(Auth::check() && Auth::user()->jabatan === 'Admin')
        <li class="nav-item {{ $menuDapurDashboard ?? '' }}">
            <a class="nav-link" href="{{ route('dapurdashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dapur Dashboard</span>
            </a>
        </li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDapur"
        aria-expanded="false" aria-controls="collapseDapur">
        <i class="fas fa-tools"></i>
        <span>Master Dapur</span>
    </a>

    <div id="collapseDapur" class="collapse" data-parent="#accordionSidebar">
        <div class=" py-2 rounded">
            
            <a class="nav-link pl-5 {{ $menuJenisBarang ?? '' }}" href="{{ route('jenis_barang.index') }}">
                <i class="fas fa-dot-circle"></i>
                <span>Jenis Barang</span>
            </a>

            <a class="nav-link pl-5 {{ $menuDataBarang ?? '' }}" href="{{ route('barang.index') }}">
                <i class="fas fa-dot-circle"></i>
                <span>Data Barang</span>
            </a>

        </div>
    </div>
</li>

    
@endif


@php
    use App\Models\Cabang;

    $allCabang = Cabang::orderBy('nama_cabang')->get();
    $user = Auth::user();
@endphp

{{-- ADMIN: bisa lihat semua cabang --}}
@if($user->jabatan === 'Admin')
    @foreach($allCabang as $c)
        <li class="nav-item {{ $menuCabang ?? '' }}">
            <a class="nav-link" href="{{ route('barang.index', ['cabang_id' => $c->id]) }}">
                <i class="fas fa-fw fa-store"></i>
                <span>{{ $c->nama_cabang }}</span>
            </a>
        </li>
    @endforeach
@endif

{{-- KARYAWAN: hanya cabangnya sendiri --}}
@if($user->jabatan === 'Karyawan')

<li class="nav-item {{ $menuDapurDashboard ?? '' }}">
    <a class="nav-link" href="{{ route('dapurdashboard', ['cabang_id' => $user->cabang_id]) }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dapur Dashboard</span>
    </a>
</li>

<li class="nav-item {{ $menu['menuCabang'] ?? '' }}">
    <a class="nav-link" href="{{ route('barang.index', ['cabang_id' => $user->cabang_id]) }}">
        <i class="fas fa-fw fa-store"></i>
        <span>{{ $user->cabang->nama_cabang }}</span>
    </a>
</li>


<li class="nav-item {{ $menu['menuPengadaan'] ?? '' }}">
    <a class="nav-link" href="{{ route('pengadaan.index', ['cabang_id' => $user->cabang_id]) }}">
        <i class="fas fa-box"></i>
        <span>Pengadaan Barang</span>
    </a>
</li>

@endif

@if($user->jabatan === 'Admin')

<li class="nav-item {{ $menuPengadaan ?? '' }}">
    <a class="nav-link" href="{{ route('pengadaan.index') }}">
        <i class="fas fa-box"></i>
        <span>Pengadaan Barang </span>
    </a>
</li>

@endif



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


<!-- End of Sidebar -->
