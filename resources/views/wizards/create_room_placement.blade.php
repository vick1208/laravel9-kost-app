<div class="modal fade" id="create_room_placement_wizard" tabindex="-1" aria-labelledby="createRoomPlacementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRoomPlacementModalLabel">Tempatkan Penghuni</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if ($room->placements->whereNull('check_out_date')->count() >= $room->capacity)
          <p class="text-danger">Kamar telah terisi penuh</p>
        @else
          <form action="/placements" method="post">
            @csrf
            <input type="hidden" name="room_id" value="{{ old('room_id', $room->id) }}">
            <div class="mb-3 row">
              <label for="occupant_id" class="col-sm-3 col-form-label">Penghuni</label>
              <div class="col-sm-6">
                <select class="form-select form-select-sm" name="occupant_id">
                  <option value="" @selected(!old('occupant_id'))>Pilih Penghuni</option>
                  @foreach ($occupants as $occupant)
                    <option value="{{ $occupant->id }}" @selected($occupant->id == old('occupant_id'))>{{ $occupant->name }}</option>
                  @endforeach
                </select>
                @error('occupant_id')  
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
              <label for="check_in_date" class="col-sm-3 col-form-label">Tanggal Masuk</label>
              <div class="col-sm-6">
                <input class="form-control form-control-sm" type="date" id="check_in_date" name="check_in_date" value="{{ old('check_in_date', date('Y-m-d')) }}">
                @error('check_in_date')  
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            {{-- <div class="mb-3 row">
              <label for="check_out_date" class="col-sm-3 col-form-label">Tanggal Keluar</label>
              <div class="col-sm-6">
                <input class="form-control form-control-sm" type="date" id="check_out_date" name="check_out_date" value="{{ old('check_out_date') }}">
                @error('check_out_date')  
                  <div class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div> --}}
            <div class="mb-3 row gap-2">
              <div class="col-form-label">
                <button class="btn btn-sm btn-primary col-sm-3" type="submit">Simpan</button>
              </div>
            </div>
          </form>
        @endif
      </div>
    </div>
  </div>
</div>