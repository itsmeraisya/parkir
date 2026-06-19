<div class="card-body p-4">
  <form action="{{ route('transactions.update', $transaction->id) }}" method="post" id="frm">
    @csrf
    @method('PUT')

    <div class="row gx-4 gy-3">
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="id_lokasi" class="form-label">Location ID</label>
          <input type="number" class="form-control" id="id_lokasi" name="id_lokasi" placeholder="Enter location ID" min="1" value="{{ old('id_lokasi', $transaction->id_lokasi) }}" required>
        </div>

        <div class="mb-3">
          <label for="no_tiket" class="form-label">Ticket Number</label>
          <input type="text" class="form-control" id="no_tiket" name="no_tiket" placeholder="Enter ticket number" value="{{ old('no_tiket', $transaction->no_tiket) }}" required>
        </div>

        <div class="mb-3">
          <label for="no_polisi" class="form-label">License Plate</label>
          <input type="text" class="form-control" id="no_polisi" name="no_polisi" placeholder="Enter license plate" value="{{ old('no_polisi', $transaction->no_polisi) }}" required>
        </div>



        <div class="mb-3">
          <label for="total_jam" class="form-label">Total Hours</label>
          <input type="number" class="form-control" id="total_jam" name="total_jam" placeholder="0" min="0" value="{{ old('total_jam', $transaction->total_jam) }}">
        </div>

        <div class="mb-3">
          <label for="total_bayar" class="form-label">Total Paid</label>
          <input type="number" class="form-control" id="total_bayar" name="total_bayar" placeholder="0" min="0" value="{{ old('total_bayar', $transaction->total_bayar) }}">
        </div>
      </div>
    </div>

    <div class="text-end mt-4">
      <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
      <button type="submit" class="btn btn-primary">Update Transaction</button>
    </div>
  </form>
</div>
