@extends('layout')
@include('wizards.placement_checkout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Penempatan</h1>
</div>

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show my-4 col-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="row">
  <label for="occupant_id" class="col-sm-2 col-form-label">Penghuni</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $placement->occupant ? $placement->occupant->name : '' }}" readonly id="occupant_id">
  </div>
</div>
<div class="row">
  <label for="room_id" class="col-sm-2 col-form-label">Kamar</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" type="text" value="{{ $placement->room ? $placement->room->code : '' }}" readonly id="room_id">
  </div>
</div>
<div class="row">
  <label for="check_in_date" class="col-sm-2 col-form-label">Tanggal Masuk</label>
  <div class="col-sm-3">
    @if (!empty($placement->check_in_date))
      <input class="form-control-plaintext form-control-sm" type="text" value="{{ date('d/m/Y', strtotime($placement->check_in_date)) }}" readonly id="check_in_date">
    @endif
  </div>
</div>
<div class="row">
  <label for="check_out_date" class="col-sm-2 col-form-label">Tanggal Keluar</label>
  <div class="col-sm-3">
    @if (!empty($placement->check_out_date))
      <input class="form-control-plaintext form-control-sm" type="text" value="{{ date('d/m/Y', strtotime($placement->check_out_date)) }}" readonly id="check_out_date">
    @endif
  </div>
</div>
<div class="mb-3 row gap-2">
  <div class="col-form-label">
    @if (empty($placement->check_out_date))
      <button type="button" class="btn btn-sm btn-success col-sm-2" data-bs-toggle="modal" data-bs-target="#placement_checkout_wizard">
        Keluar dari Penempatan
      </button>
    @endif
  </div>
</div>
@endsection