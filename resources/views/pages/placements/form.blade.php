@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Penempatan</h1>
</div>

<form>
  <div class="mb-3 row">
    <label for="occupant_id" class="col-sm-2 col-form-label">Penghuni</label>
    <div class="col-sm-3">
      <select class="form-select" name="occupant_id">
        <option value="" selected>Pilih Penghuni</option>
        @foreach ($occupants as $occupant)
          <option value="{{ $occupant->id }}">{{ $occupant->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="room_id" class="col-sm-2 col-form-label">Kamar</label>
    <div class="col-sm-3">
      <select class="form-select" name="room_id">
        <option value="" selected>Pilih Kamar</option>
        @foreach ($rooms as $room)
          <option value="{{ $room->id }}">{{ $room->code }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="check_in_date" class="col-sm-2 col-form-label">Tanggal Masuk</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="check_in_date" name="check_in_date">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="check_out_date" class="col-sm-2 col-form-label">Tanggal Keluar</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="check_out_date" name="check_out_date">
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/placements" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection