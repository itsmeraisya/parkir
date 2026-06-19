<div class="card-body p-4">
  <form action="{{ route('vehicle-types.store') }}" method="post" id="frm">
    @csrf

    <div class="row gx-4 gy-3">
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="jenis" class="form-label">Vehicle Type</label>
          <select class="form-control" id="jenis" name="jenis" required>
            <option value="">Select vehicle type</option>
            <option value="motorcycle">Motorcycle</option>
            <option value="car">Car</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="perjam_pertama" class="form-label">First Hour Charge</label>
          <input type="number" class="form-control" id="perjam_pertama" name="perjam_pertama" placeholder="0" min="0" required>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="mb-3">
          <label for="perjam_berikutnya" class="form-label">Next Hour Charge</label>
          <input type="number" class="form-control" id="perjam_berikutnya" name="perjam_berikutnya" placeholder="0" min="0" required>
        </div>

        <div class="mb-3">
          <label for="max_perhari" class="form-label">Max Cost Per Day</label>
          <input type="number" class="form-control" id="max_perhari" name="max_perhari" placeholder="0" min="0" required>
        </div>
      </div>
    </div>

    <div class="text-end mt-4">
      <a href="{{ route('vehicle-types.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
      <button type="submit" class="btn btn-primary">Save Vehicle Type</button>
    </div>
  </form>
</div>