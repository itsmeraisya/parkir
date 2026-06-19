@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection
@section('main')
<div class="container-fluid py-4">

    <div class="card mb-4 border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <div class="d-flex align-items-center flex-wrap gap-3 mb-3">

                <div class="me-auto">
                    <p class="text-uppercase text-secondary text-xxs mb-1">
                        Pages / Transaction
                    </p>
                    <h5 class="mb-0">Transaction</h5>
                </div>

                @foreach ($vehicleTypes as $type)
                    <button type="button"
                        class="vehicle-type-filter btn btn-sm rounded-pill btn-dark text-uppercase"
                        data-type-id="{{ $type->id }}"
                        style="padding:10px 32px; font-weight:700; min-width:140px;">
                        {{ strtoupper($type->jenis) }}
                    </button>
                @endforeach

                <button type="button"
                    id="enterVehicleTop"
                    class="btn btn-sm text-white rounded-pill"
                    style="background: linear-gradient(135deg, #ff00bf 0%, #e6007e 100%); border:none; padding:12px 28px;">
                    + ENTER VEHICLE
                </button>

                <a href="javascript:;" class="text-body font-weight-bold text-decoration-none">
                    <i class="fa fa-user me-1"></i>Sign Out
                </a>

            </div>

        </div>
    </div>
</div>

      <div class="row gx-4 mb-4">
        <div class="col-xl-8 col-lg-7 mb-3">
          <div class="row gx-3">
            <div class="col-md-4 mb-3">
              <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4" style="background: linear-gradient(145deg, #1f2d5a 0%, #2f4faa 100%); color: #fff;">
                  <div class="d-flex justify-content-between align-items-start mb-4">
                    <div class="bg-white rounded-4 d-flex align-items-center justify-content-center" style="width:72px;height:72px;">
                      <i class="fas fa-calendar-day text-primary fa-2x"></i>
                    </div>
                    <div class="text-end">
                      <p class="text-uppercase text-xs text-white opacity-8 mb-1">Monday</p>
                      <h5 class="font-weight-bolder mb-1">8 December 2025</h5>
                    </div>
                  </div>
                  <div class="h2 mb-0" id="clockToday">00:00:00</div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="row gx-3">
                @foreach ($locations as $location)
                  <div class="col-md-4 col-6 mb-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-3 location-card" data-location-id="{{ $location->id }}">
                      <div class="text-center mb-3">
                        <div class="rounded-4 mx-auto d-flex align-items-center justify-content-center" style="width:56px;height:56px; background: linear-gradient(135deg, #ff00bf 0%, #e6007e 100%);">
                          <i class="fas fa-building text-white"></i>
                        </div>
                      </div>
                      <div class="text-center mb-3">
                        <h6 class="mb-1 text-capitalize">{{ $location->location_name }}</h6>
                        <p class="text-xs text-secondary mb-0">Gedung {{ strtoupper(substr($location->location_name, -1)) }}</p>
                      </div>
                      <div class="d-flex justify-content-between gap-2 mt-3">
                        <div class="d-flex flex-column align-items-center p-2 rounded-3 bg-light w-100">
                          <i class="fas fa-motorcycle text-success mb-1"></i>
                          <span class="fw-bold text-success">{{ max(0, $location->max_motorcycle - $location->occupied_motorcycle) }}</span>
                        </div>
                        <div class="d-flex flex-column align-items-center p-2 rounded-3 bg-light w-100">
                          <i class="fas fa-car text-danger mb-1"></i>
                          <span class="fw-bold text-danger">{{ max(0, $location->max_car - $location->occupied_car) }}</span>
                        </div>
                        <div class="d-flex flex-column align-items-center p-2 rounded-3 bg-light w-100">
                          <i class="fas fa-bus text-warning mb-1"></i>
                          <span class="fw-bold text-warning">{{ max(0, $location->max_other - $location->occupied_other) }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-5 mb-3">
          <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <p class="text-uppercase text-secondary text-xxs font-weight-bold mb-1">Tickets</p>
                <h6 class="mb-0">{{ $transactions->count() }} Active Tickets</h6>
              </div>
              <a href="{{ route('transactions.index') }}" class="btn btn-sm text-primary" style="border:1px solid #ff00bf; background: rgba(255,0,191,.08);">VIEW ALL</a>
            </div>
            <div class="d-flex flex-column gap-3">
              @forelse ($transactions->take(4) as $ticket)
                <div class="border rounded-3 p-3 d-flex justify-content-between align-items-center ticket-item">
                  <div>
                    <p class="text-xs text-secondary mb-1">{{ \Carbon\Carbon::parse($ticket->masuk)->format('Y-m-d H:i:s') }}</p>
                    <p class="text-sm font-weight-bold mb-0">#{{ $ticket->no_tiket }}</p>
                  </div>
                  <a href="{{ route('transactions.edit', $ticket->id) }}" class="text-secondary" title="Klik disini untuk lihat Tiket" target="_blank">
                    <i class="fas fa-file-pdf pdf-icon"></i>
                  </a>
                </div>
              @empty
                <p class="text-sm text-secondary">No tickets yet. Add a new transaction.</p>
              @endforelse
            </div>
          </div>
        </div>
      </div>

      <div class="row gx-4">
        <div class="col-xl-7 col-lg-8 mb-4">
          <div class="card h-100 border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h5 class="mb-1" style="color:#ff00bf;">Transaction</h5>
                  <p class="text-sm text-secondary mb-0">Input Form</p>
                </div>
                <button type="button" class="btn btn-sm text-white" style="background: linear-gradient(135deg, #343aeb 0%, #0f2b6b 100%); border:none;">+ EXIT VEHICLE</button>
              </div>
              @include('transactions.frmInsert')
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const enterVehicleTop = document.getElementById('enterVehicleTop');
        const locationCards = document.querySelectorAll('.location-card');
        const vehicleButtons = document.querySelectorAll('.vehicle-type-filter');
        const locationInput = document.getElementById('id_lokasi');
        const vehicleInput = document.getElementById('id_jenis');

        function selectLocation(card) {
          locationCards.forEach(c => c.classList.remove('border', 'border-primary'));
          card.classList.add('border', 'border-primary');
          if (locationInput) {
            locationInput.value = card.dataset.locationId;
          }
        }

        function selectVehicle(button) {
          vehicleButtons.forEach(b => b.classList.remove('btn-primary'));
          vehicleButtons.forEach(b => b.classList.add('btn-dark'));
          button.classList.remove('btn-dark');
          button.classList.add('btn-primary');
          if (vehicleInput) {
            vehicleInput.value = button.dataset.typeId;
          }
        }

        locationCards.forEach(card => {
          card.addEventListener('click', () => selectLocation(card));
        });

        vehicleButtons.forEach(button => {
          button.addEventListener('click', () => selectVehicle(button));
        });

        if (enterVehicleTop) {
          enterVehicleTop.addEventListener('click', () => {
            const formSection = document.getElementById('transaction-form');
            if (formSection) {
              formSection.scrollIntoView({ behavior: 'smooth' });
            }
          });
        }

        if (locationInput && locationInput.value) {
          const activeCard = Array.from(locationCards).find(card => card.dataset.locationId === locationInput.value);
          if (activeCard) {
            activeCard.classList.add('border', 'border-primary');
          }
        }

        if (vehicleInput && vehicleInput.value) {
          const activeButton = Array.from(vehicleButtons).find(btn => btn.dataset.typeId === vehicleInput.value);
          if (activeButton) {
            activeButton.classList.remove('btn-dark');
            activeButton.classList.add('btn-primary');
          }
        }

        const clockToday = document.getElementById('clockToday');
        if (clockToday) {
          function updateClock() {
            const now = new Date();
            const time = now.toLocaleTimeString('en-GB', { hour12: false });
            clockToday.textContent = time;
          }
          updateClock();
          setInterval(updateClock, 1000);
        }
      });
    </script>
@endsection
