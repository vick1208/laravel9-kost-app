@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Penempatan</h1>
</div>


<div class="row">
  <label for="occupant_id" class="col-sm-2 col-form-label">Penghuni</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $placement->occupant->name }}" readonly id="occupant_id">
  </div>
</div>
<div class="row">
  <label for="room_id" class="col-sm-2 col-form-label">Kamar</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $placement->room->code }}" readonly id="room_id">
  </div>
</div>
<div class="row">
  <label for="check_in_date" class="col-sm-2 col-form-label">Tanggal Masuk</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $placement->check_in_date }}" readonly id="check_in_date">
  </div>
</div>
<div class="row">
  <label for="check_out_date" class="col-sm-2 col-form-label">Tanggal Keluar</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $placement->check_out_date }}" readonly id="check_out_date">
  </div>
</div>
@endsection