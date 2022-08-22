@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Kamar</h1>
</div>

<div class="row">
  <label for="code" class="col-sm-2 col-form-label">Kode Kamar</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext" readonly type="text" id="code" value="{{ $room->code }}">
  </div>
</div>
<div class="row">
  <label for="location_id" class="col-sm-2 col-form-label">Lokasi</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext" readonly type="text" id="location" value="{{ $room->location ? $room->location->name : '' }}">
  </div>
</div>
<div class="row">
  <label for="capacity" class="col-sm-2 col-form-label">Kapasitas</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext" readonly type="text" id="location" value="{{ $room->capacity }}">
  </div>
</div>
@endsection