<div class="card-body p-4">
  <form action="{{ route('locations.update', $location->id ?? $data->id) }}" method="post" id="frm">
    @csrf
    @method('PUT')

    <div class="row gx-4 gy-3">
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="location_name" class="form-label">Location Name</label>
          <input type="text" class="form-control" id="location_name" name="location_name" placeholder="Enter Location Name" value="{{ old('location_name', $location->location_name ?? $data->location_name ?? '') }}" required>
        </div>

        <div class="mb-3">
          <label for="max_motorcycle" class="form-label">Max Motorcycle</label>
          <input type="number" class="form-control" id="max_motorcycle" name="max_motorcycle" placeholder="0" min="0" value="{{ old('max_motorcycle', $location->max_motorcycle ?? $data->max_motorcycle ?? '') }}" required>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="mb-3">
          <label for="max_car" class="form-label">Max Car</label>
          <input type="number" class="form-control" id="max_car" name="max_car" placeholder="0" min="0" value="{{ old('max_car', $location->max_car ?? $data->max_car ?? '') }}" required>
        </div>

        <div class="mb-3">
          <label for="max_other" class="form-label">Max Truck/Bus/Other</label>
          <input type="number" class="form-control" id="max_other" name="max_other" placeholder="0" min="0" value="{{ old('max_other', $location->max_other ?? $data->max_other ?? '') }}" required>
        </div>
      </div>
    </div>

    <div class="text-end mt-4">
      <a href="{{ route('locations.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
      <button type="submit" class="btn btn-primary">Update Location</button>
    </div>
  </form>
</div>