@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Penempatan</h1>
</div>

<form action="/placements/{{ $placement->id }}" method="post">
  @csrf
  @method('put')
  <div class="mb-3 row">
    <label for="occupant_id" class="col-sm-2 col-form-label">Penghuni</label>
    <div class="col-sm-3">
      <select class="form-select form-select-sm" name="occupant_id">
        <option value="" @selected(!old('occupant_id', $placement->occupant_id))>Pilih Penghuni</option>
        @foreach ($occupants as $occupant)
          <option value="{{ $occupant->id }}" @selected($occupant->id == old('occupant_id', $placement->occupant_id))>{{ $occupant->name }}</option>
        @endforeach
      </select>
      @error('occupant_id')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="room_id" class="col-sm-2 col-form-label">Kamar</label>
    <div class="col-sm-3">
      <select class="form-select form-select-sm" name="room_id">
        <option value="" @selected(!old('room_id', $placement->room_id))>Pilih Kamar</option>
        @foreach ($rooms as $room)
          <option value="{{ $room->id }}" @selected($room->id == old('room_id', $placement->room_id))>{{ $room->code }}</option>
        @endforeach
      </select>
      @error('room_id')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="check_in_date" class="col-sm-2 col-form-label">Tanggal Masuk</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="check_in_date" name="check_in_date" value="{{ old('check_in_date', $placement->check_in_date) }}">
      @error('check_in_date')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
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