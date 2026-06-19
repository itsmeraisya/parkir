@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection
@section('main')
    <div class="container-fluid py-4">
      <div class="card mb-4">
        <div class="card-body px-3 py-3">
          <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0">
                  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Location</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Location</h6>
              </nav>
            </div>
            <div class="col-md-6 text-end">
              <div class="d-flex justify-content-end align-items-center gap-2">
                <div class="input-group" style="max-width: 280px;">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" placeholder="Type here...">
                </div>
                <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('locations.create') }}">Add New Location</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            swal({
              title: "Good Job",
              text: "{{ session('success') }}",
              icon: "success",
              button: "OK",
              timer: 4000,
            });
          });
        </script>
      @endif

      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6 class="mb-0">Location Data Table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Motorcycle</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Car</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Truck/Bus/Other</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($locations as $index => $location)
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 ms-3">{{ $index + 1 }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $location->location_name }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $location->max_motorcycle }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $location->max_car }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $location->max_other }}</p>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-sm btn-info me-2">Edit</a>
                      <form action="{{ route('locations.destroy', $location->id) }}" method="post" class="d-inline-block" onsubmit="return confirm('Delete this location?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center py-4">No locations available.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection