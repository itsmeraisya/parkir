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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Publication Year</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Writer</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Publisher</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Stock</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $nmr => $data)
                  <tr class="cursor-pointer">
                    <td>
                      <p class="text-sm font-weight-bold mb-0 ms-3">{{ $nmr + 1 }} </p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->location_name }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->max_motorcycle }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->max_car }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $data->max_other }}</p>
                    <td class="text-end">
                      <a href="{{ route('locations.edit', $data->id) }}" class="btn btn-sm btn-info me-2" title="Edit"><i class="fas fa-edit me-1"></i>Edit</a>
                      <a href="{{ route('locations.destroy', $data->id) }}" class="btn btn-sm btn-danger" onclick="hapus(event, this)" data-id="{{ $data->id }}" title="Delete"><i class="fas fa-trash me-1"></i>Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>