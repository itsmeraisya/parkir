<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('locations.index') }}">
        <img src="{{ asset('be/assets/img/parkir.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">SIJA PARKING</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('locations*') ? 'active' : '' }}" href="{{route('locations.index')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-location-dot"></i>
            </div>
            <span class="nav-link-text ms-1">Location</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('transactions*') ? 'active' : '' }}" href="{{route('transactions.index')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-receipt"></i>
            </div>
            <span class="nav-link-text ms-1">Transaction</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('vehicle-types*') ? 'active' : '' }}" href="{{route('vehicle-types.index')}}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-car-side"></i>
            </div>
            <span class="nav-link-text ms-1">Vehicle Type</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>