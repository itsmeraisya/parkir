@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection
@section('main')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Vehicle Type</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Vehicle Type</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="pe-md-3 d-flex align-items-end">
            <a class="btn btn-primary btn-md mb-0 me-3" href="{{ route('vehicle-types.create') }}">Add New Vehicle Type</a>
          </div>
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group" style="width: 250px;">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="container-fluid py-4">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6 class="mb-0">Vehicle Type Data Table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vehicle Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Hour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Next Hour</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Per Day</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($vehicleTypes as $index => $type)
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 ms-3">{{ $index + 1 }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ ucfirst($type->jenis) }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ number_format($type->perjam_pertama, 0, ',', '.') }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ number_format($type->perjam_berikutnya, 0, ',', '.') }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ number_format($type->max_perhari, 0, ',', '.') }}</p>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('vehicle-types.edit', $type->id) }}" class="btn btn-icon-only btn-sm btn-rounded bg-gradient-warning text-white me-2" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('vehicle-types.destroy', $type->id) }}" method="post" class="d-inline-block" onsubmit="return confirm('Delete this vehicle type?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-icon-only btn-sm btn-rounded bg-gradient-danger text-white" title="Delete">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center py-4">No vehicle types available.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection