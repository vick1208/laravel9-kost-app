<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'rooms') ? 'active' : '' }}" href="/rooms">
          <span data-feather="grid" class="align-text-bottom"></span>
          Kamar
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'occupants') ? 'active' : '' }}" href="/occupants">
          <span data-feather="users" class="align-text-bottom"></span>
          Penghuni
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'placements') ? 'active' : '' }}" href="/placements">
          <span data-feather="inbox" class="align-text-bottom"></span>
          Penempatan
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(1) == 'locations') ? 'active' : '' }}" href="/locations">
          <span data-feather="map-pin" class="align-text-bottom"></span>
          Lokasi
        </a>
      </li>
    </ul>

  </div>
</nav>