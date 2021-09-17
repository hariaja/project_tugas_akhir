<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
          <i class="fas fa-tint"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Pdam TBW</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  @if (Auth::user()->level === 'admin')

      <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ ($title === 'Halaman Dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item {{ ($title === 'Data Depot') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/depot') }}">
      <i class="fas fa-fw fa-store"></i>
      <span>Kelola Depot</span>
    </a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item {{ ($title === 'Data Pengemudi') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/pengemudi') }}">
      <i class="fas fa-fw fa-car"></i>
      <span>Data Pengemudi</span>
    </a>
  </li>

  <li class="nav-item {{ ($title === 'Data Pengajuan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/pengajuan') }}">
      <i class="fas fa-fw fa-file"></i>
      <span>Kelola Pengajuan</span>
    </a>
  </li>

  @else
  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ ($title === 'Halaman Dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item {{ ($title === 'Data Pengajuan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/pengajuan') }}">
      <i class="fas fa-fw fa-file"></i>
      <span>Kelola Pengajuan</span>
    </a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>