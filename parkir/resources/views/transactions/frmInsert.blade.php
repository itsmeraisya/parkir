@php
    $formAction = $formAction ?? route('transactions.store');
    $formMethod = $formMethod ?? 'POST';
    $transaction = $transaction ?? null;
    $defaultLocation = $locations->first()->id ?? '';
    $defaultVehicle = $vehicleTypes->first()->id ?? '';
    $defaultEntry = old('masuk', optional($transaction)->masuk ? date('Y-m-d\TH:i', strtotime($transaction->masuk)) : date('Y-m-d\TH:i'));
    $defaultExit = old('keluar', optional($transaction)->keluar ? date('Y-m-d\TH:i', strtotime($transaction->keluar)) : date('Y-m-d\TH:i', strtotime('+1 hour')));
@endphp
<div id="transaction-form">
  <div class="card border border-2 rounded-4" style="border-color:#ff00bf;">
    <div class="card-body p-4">
      <form action="{{ $formAction }}" method="post" id="frm">
        @csrf
        @if ($formMethod !== 'POST')
          @method($formMethod)
        @endif

        <input type="hidden" id="id_lokasi" name="id_lokasi" value="{{ old('id_lokasi', $transaction->id_lokasi ?? $defaultLocation) }}">
        <input type="hidden" id="id_jenis" name="id_jenis" value="{{ old('id_jenis', $transaction->id_jenis ?? $defaultVehicle) }}">
        <input type="hidden" id="masuk" name="masuk" value="{{ $defaultEntry }}">
        <input type="hidden" id="keluar" name="keluar" value="{{ $defaultExit }}">

    <div class="row gx-3 gy-3">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="no_tiket" class="form-label text-secondary">Ticket Number</label>
          <input type="text" class="form-control border border-2 rounded-4" id="no_tiket" name="no_tiket" placeholder="Ticket Number" value="{{ old('no_tiket', $transaction->no_tiket ?? '') }}" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="no_polisi" class="form-label text-secondary">Police Number</label>
          <input type="text" class="form-control border border-2 rounded-4" id="no_polisi" name="no_polisi" placeholder="Police Number" value="{{ old('no_polisi', $transaction->no_polisi ?? '') }}" required>
        </div>
      </div>
    </div>

    </div>
  </form>
    </div>
  </div>
</div>
