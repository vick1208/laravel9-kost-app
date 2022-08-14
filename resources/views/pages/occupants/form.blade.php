@extends('layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Penghuni</h1>
</div>

<form>
  <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="name" name="name">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-3">
      <select class="form-select" name="gender">
        <option value="" selected>Pilih jenis kelamin</option>
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="birth_place" class="col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="birth_place" name="birth_place">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="date" id="birth_date" name="birth_date">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="origin_place" class="col-sm-2 col-form-label">Daerah Asal</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="origin_place" name="origin_place">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="education" class="col-sm-2 col-form-label">Pendidikan</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="education" name="education">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="occupation" class="col-sm-2 col-form-label">Pekerjaan</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="occupation" name="occupation">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="phone_number" class="col-sm-2 col-form-label">Nomor Handphone</label>
    <div class="col-sm-3">
      <input class="form-control form-control-sm" type="text" id="phone_number" name="phone_number">
    </div>
  </div>
  <div class="mb-3 row gap-2">
    <div class="col-form-label">
      <button class="btn btn-sm btn-primary col-sm-1" type="submit">Simpan</button>
      <a href="/occupants" class="btn btn-sm btn-danger col-sm-1">Batal</a>
    </div>
  </div>
</form>
@endsection