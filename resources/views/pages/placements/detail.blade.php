@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Penempatan</h1>
</div>


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
    {{-- <a href="/placements/{{ $placement->id }}/edit" class="btn btn-sm btn-warning col-sm-1">Ubah</a> --}}
    <form action="/placements/{{ $placement->id }}" class="d-inline" method="post">
      @csrf
      @method('delete')
      <button class="btn btn-sm btn-danger col-sm-1 text-decoration-none" onclick="return confirm('Apakah Anda yakin ingin melanjutkan ?');">Hapus</button>
    </form>
  </div>
</div>
@endsection