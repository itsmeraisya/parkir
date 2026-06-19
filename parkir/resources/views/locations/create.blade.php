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
              <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('locations.index') }}">Back to Location</a>
            </div>
          </div>
        </div>
      </div>

      <div class="card p-4">
        @include('locations.frmInsert')
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
@endsection