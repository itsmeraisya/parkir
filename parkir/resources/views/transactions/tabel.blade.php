<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{ $title }} Data</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Photo</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Borrower Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Gender</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Phone Number</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">NIP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">NUPTK</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">NISN</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Class</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $nmr => $data)
                  <tr class="cursor-pointer">
                    <td>
                      <p class="text-sm font-weight-bold mb-0 ms-3">{{ $nmr + 1 }} </p>
                    </td>
                    <td class="text-end">
                      <a href="{{ route('transactions.edit', $data->id) }}" class="btn btn-icon-only btn-sm btn-rounded bg-gradient-warning text-white me-2" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="javascript:void(0)" class="btn btn-icon-only btn-sm btn-rounded bg-gradient-danger text-white" title="Delete" id="btnHapus" onclick="hapus(event, this)" data-url="{{ route('transactions.destroy', $data->id) }}" data-id="{{ $data->id }}">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    <td class="text-xs font-weight-bold mb-0">
                      <img src="{{ asset('storage/' . $data->foto) }}"
                     class="img-thumbanil cursor-pointer" alt="img Product" width="50"
                     data-bs-toggle="modal" data-bs-target="staticBackdrop{{ $data->id }}">
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->nama_peminjam }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->jk }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->alamat }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->no_telpon }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->email }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->nip }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->nuptk }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->nisn }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->schoolClass->kelas ?? '' }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->schoolClass->tahun_ajaran ?? '' }}</p>
                    </td>
                  </tr>
<!-- Modal -->

<div class="modal fade" id="staticBackdrop{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
          {{ $data->nama_peminjam }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
           aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <img src="{{ asset('storage/' . $data->foto) }}"
             class="img-thumbnail cursor-pointer" alt="img Product"
             width="75%">
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
               data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>