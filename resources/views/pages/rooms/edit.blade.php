@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Kamar</h1>
</div>

<form action="/rooms/{{ $room->id }}" method="post">
  @csrf
  @method('patch')
  <div class="mb-3 row">
    <label for="code" class="col-sm-2 col-form-label">Kode Kamar</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="code" name="code" value="{{ old('code', $room->code) }}">
      @error('code')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="location_id" class="col-sm-2 col-form-label">Lokasi</label>
    <div class="col-sm-3">
      <select class="form-select form-select-sm" name="location_id">
        <option @selected(!old('location_id', $room->location_id)) value="">Open this select menu</option>
        @foreach ($locations as $location)
          <option value="{{ $location->id }}" @selected($location->id == old('location_id', $room->location_id))>{{ $location->name }}</option>
        @endforeach
      </select>
      @error('location_id')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="capacity" class="col-sm-2 col-form-label">Kapasitas</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="number" id="capacity" name="capacity" value="{{ old('capacity', $room->capacity) }}">
      @error('capacity')  
        <div class="form-text text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/rooms" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection