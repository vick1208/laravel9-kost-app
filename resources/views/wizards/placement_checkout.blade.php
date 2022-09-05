<div class="modal fade" id="placement_checkout_wizard_{{ $placement->id }}" tabindex="-1" aria-labelledby="placementCheckoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="placementCheckoutModalLabel">Keluarkan dari Penempatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/placements/{{ $placement->id }}/checkout" method="post">
            @csrf
            @method('put')
            <div class="row">
              <label for="occupant_id" class="col-sm-3 col-form-label">Penghuni</label>
              <div class="col-sm-6">
                <input type="text" class="form-control-plaintext form-control-sm" readonly value="{{ $placement->occupant->name }}">
              </div>
            </div>
            <div class="row">
              <label for="room_id" class="col-sm-3 col-form-label">Kamar</label>
              <div class="col-sm-6">
                <input type="text" class="form-control-plaintext form-control-sm" readonly value="{{ $placement->room->code }}">
              </div>
            </div>
            <div class="row">
                <label for="check_in_date" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-6">
                  <input type="text" id="check_in_date" name="check_in_date" class="form-control-plaintext form-control-sm" readonly value="{{ date('d/m/Y', strtotime($placement->check_in_date)) }}">
                </div>
              </div>
            <div class="row">
              <label for="check_out_date" class="col-sm-3 col-form-label">Tanggal Keluar</label>
              <div class="col-sm-6">
                <input class="form-control form-control-sm" type="date" id="check_out_date" name="check_out_date" value="{{ old('check_out_date', date('Y-m-d')) }}">
                @error('check_out_date')  
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mt-3 row gap-2">
              <div class="col-form-label">
                <button class="btn btn-sm btn-primary col-sm-3" type="submit">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>