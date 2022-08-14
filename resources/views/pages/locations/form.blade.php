@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Lokasi</h1>
</div>

<form>
  <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nama Lokasi</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="name" name="name">
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/locations" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection