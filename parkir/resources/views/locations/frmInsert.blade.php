@php
    $formAction = $formAction ?? route('locations.store');
    $formMethod = $formMethod ?? 'POST';
    $location = $location ?? null;
@endphp
<div class="card-body p-4">
  <form action="{{ $formAction }}" method="post" id="frm">
    @csrf
    @if ($formMethod !== 'POST')
      @method($formMethod)
    @endif

    <h5 class="text-primary mb-4">Location Input Form</h5>

    <div class="row gx-4 gy-3">
      <div class="col-12">
        <div class="mb-3">
          <label for="location_name" class="form-label">Location Name</label>
          <input type="text" class="form-control border border-2 border-primary" id="location_name" name="location_name" placeholder="Gedung A" value="{{ old('location_name', $location->location_name ?? '') }}" required>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="mb-3">
          <label for="max_motorcycle" class="form-label">Max Motorcycle</label>
          <input type="number" class="form-control border border-2 border-primary" id="max_motorcycle" name="max_motorcycle" placeholder="0" min="0" value="{{ old('max_motorcycle', $location->max_motorcycle ?? '') }}" required>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="mb-3">
          <label for="max_car" class="form-label">Max Car</label>
          <input type="number" class="form-control border border-2 border-primary" id="max_car" name="max_car" placeholder="0" min="0" value="{{ old('max_car', $location->max_car ?? '') }}" required>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="mb-3">
          <label for="max_other" class="form-label">Max Truck/Bus/Other</label>
          <input type="number" class="form-control border border-2 border-primary" id="max_other" name="max_other" placeholder="0" min="0" value="{{ old('max_other', $location->max_other ?? '') }}" required>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-sm-6 mb-2">
        <a href="{{ route('locations.index') }}" class="btn btn-dark w-100 py-3">Cancel</a>
      </div>
      <div class="col-sm-6">
        <button type="submit" class="btn btn-gradient-primary w-100 py-3">Save Location</button>
      </div>
    </div>
  </form>
</div>