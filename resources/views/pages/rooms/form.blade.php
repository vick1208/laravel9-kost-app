@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Kamar</h1>
</div>

<form>
  <div class="mb-3 row">
    <label for="code" class="col-sm-2 col-form-label">Kode Kamar</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="code" name="code">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="location_id" class="col-sm-2 col-form-label">Lokasi</label>
    <div class="col-sm-3">
      <select class="form-select" name="location_id">
        <option selected>Open this select menu</option>
        @foreach ($locations as $location)
          <option value="{{ $location->id }}">{{ $location->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="capacity" class="col-sm-2 col-form-label">Kapasitas</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="capacity" name="capacity">
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