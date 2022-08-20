@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detail Lokasi</h1>
</div>

<div class="row">
  <label for="name" class="col-sm-2 col-form-label">Nama Lokasi</label>
  <div class="col-sm-3">
    <input class="form-control-plaintext form-control-sm" readonly type="text" id="name" value="{{ old('name', $location->name) }}">
  </div>
</div>
@endsection